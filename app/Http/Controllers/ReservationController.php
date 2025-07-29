<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\ContratLocation;
<<<<<<< Updated upstream
=======
use App\Models\Immobilier;
use App\Models\Paiements;
>>>>>>> Stashed changes
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Nullable;

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
<<<<<<< Updated upstream
=======

//    public function step1($chambreId)
//    {
//
//        $chambre = Chambre::with('immobilier')->findOrFail($chambreId);
//        $immobilierId = $chambre->immobilier_id; // ou $chambre->immobilier->id
//
//        return view('etape1', compact('chambre', 'immobilierId'));
//    }

//    public function step2(Request $request)
//    {
//        $validated = $request->validate([
//            'immobilier_id' => 'required|exists:immobiliers,id',
//            'chambre_id' => 'required|exists:chambres,id',
//            'type_contrat' => 'required|in:jour,mois,annee',
//            'date_debut' => 'required|date',
//            'date_fin' => 'required|date|after:date_debut',
//        ]);
//
//        $chambre = Chambre::findOrFail($validated['chambre_id']);
//        $prix = match ($validated['type_contrat']) {
//            'jour' => $chambre->prix_jour,
//            'mois' => $chambre->prix_mois,
//            'annee' => $chambre->prix_annee,
//        };
//
//        $nbJours = (new \DateTime($validated['date_debut']))->diff(new \DateTime($validated['date_fin']))->days + 1;
//
//        $validated['prix_total'] = $prix * ($validated['type_contrat'] == 'jour' ? $nbJours : 1);
//
//        return view('etape2', ['data' => $validated]);
//    }

    public function paiement(Request $request)
    {


        $validated = $request->validate([
            'immobilier_id' => 'required',
            'chambre_id' => 'required',
            'type_contrat' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'prix_total' => 'required|numeric',
            'conditions_particulieres'=>'nullable|string',
        ]);


//        'user_id' => $user->id,
//            'immobilier_id' => $immobilier,
//            'chambre_id' => $chambre,
//            'date_debut' => $request->date_debut,
//            'date_fin' => $request->date_fin,
//            'type_contrat' => $request->type_contrat,
//            'prix_total' => $request->prix_total,
//
//            'conditions_particulieres' => $request->conditions_particulieres,
//        dd($validated);

        return view('paiement', ['data' => $validated]);
//
//        return 'dgfdgf';

    }

    public function confirmer(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'immobilier_id' => 'required|exists:immobiliers,id',
            'chambre_id' => 'required|exists:chambres,id',
            'type_contrat' => 'required|in:jour,mois,annee',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'prix_total' => 'required|numeric',
            'conditions_particulieres' => 'nullable|string',
        ]);

//dd($validated);
        DB::beginTransaction();

        try {
            $contrat_id = ContratLocation::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'immobilier_id' => $validated['immobilier_id'],
                'chambre_id' => $validated['chambre_id'],
                'type_contrat' => $validated['type_contrat'],
                'date_debut' => $validated['date_debut'],
                'date_fin' => $validated['date_fin'],
                'prix_total' => $validated['prix_total'],
                'conditions_particulieres' => $validated['conditions_particulieres'] ?? null,
                'statut' => 'payee',
            ])->id;

            // Création du paiement
            Paiements::create([
                'contratlocation_id' => $contrat_id,
                'montant' => $request->montant,
                'mode_paiement' => $request->mode_paiement,
                'date_paiement' => Carbon::now()->toDateString(),
            ]);

            // Exemple d'une autre opération à inclure dans la transaction
            // ContratLocation::where('id', $request->contratlocation_id)->update([...]);

            DB::commit();

//            return redirect()->back()->with('success', 'Paiement enregistré avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erreur lors de l’enregistrement du paiement : ' . $e->getMessage());
        }

//        return redirect()->route('step1', $validated['chambre_id'])->with('success', 'Contrat enregistré après paiement PayPal.');
    }


>>>>>>> Stashed changes
}
