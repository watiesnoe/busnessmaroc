<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\ContratLocation;
use App\Models\Paiements;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaiementsController extends Controller
{
    //
    Public function index()
    {
        // Logic to display the list of payments
        return view('paiements.index');
    }
    Public function create()
    {
        // Logic to show the form for creating a new payment
        return view('paiements.create');
    }
    Public function store(Request $request)
    {
        // Logic to store a new payment
        // Validate and save the payment data
        // Redirect or return a response


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
//        DB::beginTransaction();
//
//        try {
//            $contrat_id = DB::table('contrat_locations')->insertGetId([
//                'user_id' => Auth::check() ? Auth::id() : null,
//                'immobilier_id' => $validated['immobilier_id'],
//                'chambre_id' => $validated['chambre_id'],
//                'type_contrat' => $validated['type_contrat'],
//                'date_debut' => $validated['date_debut'],
//                'date_fin' => $validated['date_fin'],
//                'prix_total' => $validated['prix_total'],
//                'conditions_particulieres' => $validated['conditions_particulieres'] ?? null,
//                'statut' => 'payee',
//            ]);
//
//            // Insertion du paiement
//            DB::table('paiements')->insert([
//                'contratlocation_id' => $contrat_id,
//                'montant' => $validated['prix_total'],
//                'mode_paiement' => 'orange money',
//                'date_paiement' => Carbon::now()->toDateString(),
//            ]);
//
//            // Exemple d'une autre opération à inclure dans la transaction
//            // ContratLocation::where('id', $request->contratlocation_id)->update([...]);
//
//            DB::commit();
//            $chambreModel = Chambre::findOrFail($validated['chambre_id']);
//            $chambreModel->update(['statut' => 'reservee']);
//
//            return response()->json(['success' => true, 'message' => 'Paiement effectué.']);
////            return redirect()->back()->with('success', 'Paiement enregistré avec succès.');
//
//        } catch (\Exception $e) {
//            DB::rollBack();
//            return redirect()->back()->with('error', 'Erreur lors de l’enregistrement du paiement : ' . $e->getMessage());
//        }
    }
    Public function show($id)
    {
        // Logic to display a specific payment
        return view('paiements.show', compact('id'));
    }
    Public function edit($id)
    {
        // Logic to show the form for editing a specific payment
        return view('paiements.edit', compact('id'));
    }
    Public function update(Request $request, $id)
    {
        // Logic to update a specific payment
        // Validate and update the payment data
        // Redirect or return a response
    }
    Public function destroy($id)
    {
        // Logic to delete a specific payment
        // Delete the payment and redirect or return a response
    }
}
