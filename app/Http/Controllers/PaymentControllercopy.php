<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratLocation;
use App\Models\Paiements;
use App\Services\AuthorizeNetGateway;

class PaymentControllercopy extends Controller
{
    protected $gatewayService;

    public function __construct(AuthorizeNetGateway $gatewayService)
    {
        $this->gatewayService = $gatewayService;
    }

    /**
     * Traiter le paiement et enregistrer le contrat
     */
    public function charge(Request $request)
    {
        // 🔹 Validation
        $request->validate([
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
        ]);

        $paymentData = [
            'amount' => $request->amount,
            'currency' => 'USD', // Authorize.Net sandbox
            'card_number' => $request->card_number,
            'expiry_month' => $request->expiry_month,
            'expiry_year' => $request->expiry_year,
            'cvv' => $request->cvv,
        ];

        try {
            // 🔹 Paiement via Authorize.Net
            $response = $this->gatewayService->charge($paymentData);

            if ($response->isSuccessful()) {

                // 🔹 Créer le contrat de location
                $contrat = ContratLocation::create([
                    'user_id' => auth()->id(),
                    'chambre_id' => $request->chambre_id,
                    'immobilier_id' => $request->immobilier_id,
                    'type_contrat' => $request->type_contrat,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'prix_total' => $request->amount,
                    'conditions_particulieres' => $request->conditions_particulieres,
                    'statut' => 'confirmé',
                    'transaction_id' => $response->getTransactionReference(),
                ]);

                // 🔹 Enregistrer le paiement
                Paiements::create([
                    'contratlocation_id' => $contrat->id,
                    'montant' => $request->amount,
                    'date_paiement' => now(),
                    'mode_paiement' => 'card',
                    'statut' => 'completed',
                ]);

                return response()->json([
                    'message' => 'Paiement effectué avec succès. Transaction ID: ' . $response->getTransactionReference()
                ]);

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
}
