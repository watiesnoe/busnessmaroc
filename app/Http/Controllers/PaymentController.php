<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;
use App\Models\ContratLocation;
use App\Models\Paiements;
use App\Services\AuthorizeNetGateway;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    protected $gatewayService;

    public function __construct(AuthorizeNetGateway $gatewayService)
    {
//        $serv=
        $this->gatewayService = $gatewayService;
//        dd($serv);
    }

    /**
     * Traiter le paiement et enregistrer le contrat
     */


    public function charge(Request $request)
    {
        // 🔹 Validation
        $validated = $request->validate([
            'type_contrat' => 'required|in:jour,mois,annee',
            'date_debut' => 'required|date|before:date_fin',
            'date_fin' => 'required|date|after:date_debut',
            'amount' => 'required|numeric|min:1',
            'card_number' => 'required|digits_between:13,19',
            'expiry_month' => 'required|digits:2',
            'expiry_year' => 'required|digits:4',
            'cvv' => 'required|digits_between:3,4',
            'immobilier_id' => 'required|exists:immobiliers,id',
            'chambre_id' => 'required|exists:chambres,id',
            'poulet_chair_qty' => 'nullable|integer|min:0',
            'poulet_cuit_qty' => 'nullable|integer|min:0',
        ]);

        // 🔹 1. Vérifier la disponibilité de la chambre avant de facturer
        $chambreModel = Chambre::findOrFail($validated['chambre_id']);
        if ($chambreModel->statut !== 'disponible') {
            return response()->json([
                'message' => 'Désolé, cette chambre n\'est plus disponible pour la réservation.'
            ], 422);
        }

        $paymentData = [
            'amount' => $validated['amount'],
            'currency' => 'USD', // Authorize.Net sandbox
            'card_number' => $validated['card_number'],
            'expiry_month' => $validated['expiry_month'],
            'expiry_year' => $validated['expiry_year'],
            'cvv' => $validated['cvv'],
        ];

        try {
            // 🔹 2. Paiement via Authorize.Net (appel réseau externe, fait HORS de la transaction DB)
            $response = $this->gatewayService->charge($paymentData);

            if ($response->isSuccessful()) {
                $responseData = $response->getData();
                $testRequest = (string) $responseData->transactionResponse->testRequest;

                // 🔹 3. Enregistrement en base de données ( transaction DB très rapide )
                DB::beginTransaction();
                try {
                    // Double-check de sécurité avec lock
                    $chambreModel = Chambre::lockForUpdate()->findOrFail($validated['chambre_id']);
                    if ($chambreModel->statut !== 'disponible') {
                        throw new \Exception('La chambre a été réservée par un autre utilisateur pendant le paiement.');
                    }

                    // ✅ Mettre la chambre en statut "réservée"
                    $chambreModel->update(['statut' => 'reservee']);

                    // 🔹 Créer le contrat de location
                    $contrat = ContratLocation::create([
                        'user_id' => auth()->id(),
                        'chambre_id' => $validated['chambre_id'],
                        'immobilier_id' => $validated['immobilier_id'],
                        'type_contrat' => $validated['type_contrat'],
                        'date_debut' => $validated['date_debut'],
                        'date_fin' => $validated['date_fin'],
                        'prix_total' => $validated['amount'],
                        'poulet_chair_qty' => (int) $request->input('poulet_chair_qty', 0),
                        'poulet_cuit_qty' => (int) $request->input('poulet_cuit_qty', 0),
                        'conditions_particulieres' => $request->conditions_particulieres,
                        'statut' => 'confirmé',
                        'transaction_id' => $testRequest,
                    ]);

                    // 🔹 Enregistrer le paiement
                    Paiements::create([
                        'contratlocation_id' => $contrat->id,
                        'montant' => $validated['amount'],
                        'date_paiement' => now(),
                        'mode_paiement' => 'card',
                        'statut' => 'completed',
                    ]);

                    DB::commit();

                    return response()->json([
                        'message' => 'Paiement effectué avec succès. Transaction ID: ' . $response->getTransactionReference()
                    ]);
                } catch (\Exception $dbEx) {
                    DB::rollBack();
                    // Note: Le client a été facturé mais la base de données a échoué à s'enregistrer.
                    // On log l'erreur pour intervention manuelle.
                    logger()->critical('Erreur base de données après paiement réussi. Transaction ID: ' . $testRequest . '. Erreur: ' . $dbEx->getMessage());
                    
                    return response()->json([
                        'message' => 'Paiement autorisé mais une erreur interne est survenue. Veuillez contacter le support technique avec le numéro de transaction: ' . $testRequest
                    ], 500);
                }
            } else {
                return response()->json([
                    'message' => 'Erreur paiement: ' . $response->getMessage()
                ], 422);
            }

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Exception: ' . $e->getMessage()
            ], 500);
        }
    }

//    public function charge(Request $request)
//    {
//        // 🔹 Validation
//        $request->validate([
//            'type_contrat' => 'required|in:jour,mois,annee',
//            'date_debut' => 'required|date|before:date_fin',
//            'date_fin' => 'required|date|after:date_debut',
//            'amount' => 'required|numeric|min:1',
//            'card_number' => 'required|digits_between:13,19',
//            'expiry_month' => 'required|digits:2',
//            'expiry_year' => 'required|digits:4',
//            'cvv' => 'required|digits_between:3,4',
//            'immobilier_id' => 'required|exists:immobiliers,id',
//            'chambre_id' => 'required|exists:chambres,id',
//        ]);
//
//        $paymentData = [
//            'amount' => $request->amount,
//            'currency' => 'USD', // Authorize.Net sandbox
//            'card_number' => $request->card_number,
//            'expiry_month' => $request->expiry_month,
//            'expiry_year' => $request->expiry_year,
//            'cvv' => $request->cvv,
//        ];
//
//        try {
//            // 🔹 Paiement via Authorize.Net
//            $response = $this->gatewayService->charge($paymentData);
//                //dd($response);
//            if ($response->isSuccessful()) {
//                $responseData = $response->getData();
//                $testRequest = (string) $responseData->transactionResponse->testRequest;
//                // 🔹 Créer le contrat de location
//                $contrat = ContratLocation::create([
//                    'user_id' => auth()->id(),
//                    'chambre_id' => $request->chambre_id,
//                    'immobilier_id' => $request->immobilier_id,
//                    'type_contrat' => $request->type_contrat,
//                    'date_debut' => $request->date_debut,
//                    'date_fin' => $request->date_fin,
//                    'prix_total' => $request->amount,
//                    'conditions_particulieres' => $request->conditions_particulieres,
//                    'statut' => 'confirmé',
//                    'transaction_id' => $testRequest,
//                ]);
//
//                // 🔹 Enregistrer le paiement
//                Paiements::create([
//                    'contratlocation_id' => $contrat->id,
//                    'montant' => $request->amount,
//                    'date_paiement' => now(),
//                    'mode_paiement' => 'card',
//                    'statut' => 'completed',
//                ]);
//                $chambreModel = Chambre::findOrFail($request['chambre_id']);
//                $chambreModel->update(['statut' => 'reservee']);
//                return response()->json([
//                    'message' => 'Paiement effectué avec succès. Transaction ID: ' . $response->getTransactionReference()
//                ]);
//
//            } else {
//                return response()->json([
//                    'message' => 'Erreur paiement: ' . $response->getMessage()
//                ], 422);
//            }
//
//        } catch (\Exception $e) {
//            return response()->json([
//                'message' => 'Exception: ' . $e->getMessage()
//            ], 500);
//        }
//    }
}
