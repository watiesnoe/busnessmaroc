<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\ContratLocation;
use App\Models\Immobilier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    //
    public function reserver($id)
    {

        $chambre = Chambre::with('immobilier')->findOrFail($id);
        $immobilierId = $chambre->immobilier_id; // ou $chambre->immobilier->id

        return view('formulaire', compact('chambre', 'immobilierId'));
    }
    public function store($immobilier, $chambre, Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'type_contrat' => 'required|in:jour,mois,annee',
            'prix_total' => 'required|numeric',
            'conditions_particulieres' => 'nullable|string',
        ]);

        // Vérifie que l'utilisateur est connecté
        if (!auth()->check()) {
            return response()->json(['error' => 'Vous devez être connecté pour réserver.'], 401);
        }

        $user = auth()->user();

        $contrat = ContratLocation::create([
            'user_id' => $user->id,
            'immobilier_id' => $immobilier,
            'chambre_id' => $chambre,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_contrat' => $request->type_contrat,
            'prix_total' => $request->prix_total,
            'statut' => 'en_attente',
            'conditions_particulieres' => $request->conditions_particulieres,
        ]);

        // Mettre à jour le statut de la chambre à 'reservee'
        $chambreModel = Chambre::findOrFail($chambre);
        $chambreModel->update(['statut' => 'reservee']);

        return response()->json(['success' => true, 'message' => 'Réservation enregistrée avec succès.']);
    }

    public function step1($chambreId)
    {

        $chambre = Chambre::with('immobilier')->findOrFail($chambreId);
        $immobilierId = $chambre->immobilier_id; // ou $chambre->immobilier->id

        return view('etape1', compact('chambre', 'immobilierId'));
    }

    public function step2(Request $request)
    {
        $validated = $request->validate([
            'immobilier_id' => 'required|exists:immobiliers,id',
            'chambre_id' => 'required|exists:chambres,id',
            'type_contrat' => 'required|in:jour,mois,annee',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        $chambre = Chambre::findOrFail($validated['chambre_id']);
        $prix = match ($validated['type_contrat']) {
            'jour' => $chambre->prix_jour,
            'mois' => $chambre->prix_mois,
            'annee' => $chambre->prix_annee,
        };

        $nbJours = (new \DateTime($validated['date_debut']))->diff(new \DateTime($validated['date_fin']))->days + 1;

        $validated['prix_total'] = $prix * ($validated['type_contrat'] == 'jour' ? $nbJours : 1);

        return view('etape2', ['data' => $validated]);
    }

    public function step3(Request $request)
    {
        $validated = $request->validate([
            'immobilier_id' => 'required',
            'chambre_id' => 'required',
            'type_contrat' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'prix_total' => 'required|numeric',
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
        ]);

        return view('etape3', ['data' => $validated]);
    }


}
