<?php

namespace App\Http\Controllers;

use App\Models\CommandePoulet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandePouletController extends Controller
{
    /**
     * Afficher la page vitrine Poulets de Chair
     */
    public function index()
    {
        return view('poulets.index');
    }

    /**
     * Enregistrer une commande de poulet
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_client'               => 'required|string|max:100',
            'telephone_client'         => 'required|string|max:20',
            'email_client'             => 'nullable|email|max:100',
            'adresse_livraison'        => 'required|string|max:255',
            'ville_livraison'          => 'required|string|max:80',
            'poulet_chair_qty'         => 'required|integer|min:0',
            'poulet_cuit_qty'          => 'required|integer|min:0',
            'date_livraison_souhaitee' => 'nullable|date|after_or_equal:today',
            'creneau_livraison'        => 'nullable|in:matin,midi,soir',
            'notes'                    => 'nullable|string|max:500',
        ], [
            'nom_client.required'          => 'Votre nom est obligatoire.',
            'telephone_client.required'    => 'Votre numéro de téléphone est obligatoire.',
            'adresse_livraison.required'   => "L'adresse de livraison est obligatoire.",
            'ville_livraison.required'     => 'La ville est obligatoire.',
        ]);

        // Au moins un produit doit être commandé
        if ((int)$validated['poulet_chair_qty'] === 0 && (int)$validated['poulet_cuit_qty'] === 0) {
            return response()->json([
                'success' => false,
                'message' => 'Veuillez sélectionner au moins un produit (quantité > 0).',
            ], 422);
        }

        $prixChair = 3000.00;
        $prixCuit  = 4000.00;
        $total = CommandePoulet::calculerTotal(
            (int)$validated['poulet_chair_qty'],
            (int)$validated['poulet_cuit_qty'],
            $prixChair,
            $prixCuit
        );

        $commande = CommandePoulet::create([
            'user_id'                  => Auth::id(),
            'nom_client'               => $validated['nom_client'],
            'telephone_client'         => $validated['telephone_client'],
            'email_client'             => $validated['email_client'] ?? null,
            'adresse_livraison'        => $validated['adresse_livraison'],
            'ville_livraison'          => $validated['ville_livraison'],
            'poulet_chair_qty'         => (int)$validated['poulet_chair_qty'],
            'poulet_cuit_qty'          => (int)$validated['poulet_cuit_qty'],
            'prix_unitaire_chair'      => $prixChair,
            'prix_unitaire_cuit'       => $prixCuit,
            'montant_total'            => $total,
            'date_livraison_souhaitee' => $validated['date_livraison_souhaitee'] ?? null,
            'creneau_livraison'        => $validated['creneau_livraison'] ?? null,
            'notes'                    => $validated['notes'] ?? null,
            'statut'                   => 'en_attente',
        ]);

        return response()->json([
            'success'    => true,
            'message'    => "✅ Votre commande #{$commande->uuid} a été enregistrée avec succès ! Notre équipe vous contactera bientôt au {$commande->telephone_client} pour confirmer la livraison.",
            'commande'   => [
                'uuid'         => $commande->uuid,
                'montant_total' => number_format($total, 0, ',', ' ') . ' FCFA',
            ],
        ]);
    }
}
