<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\ContratLocation;
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'type_contrat' => 'required|in:jour,mois,annee',
            'prix_total' => 'required|numeric',
        ]);

        // Création du client
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'role' => 'client',
        ]);

        // Création du contrat
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

        // Envoi email confirmation
//        Mail::to($user->email)->send(new ReservationConfirmee($contrat));

        return response()->json(['message' => 'Réservation enregistrée avec succès.']);
    }
}
