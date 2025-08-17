<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'quantite' => 'required|integer|min:1',
        ]);

        // Vérifier si l'utilisateur est connecté
        if(Auth::check()){
            $user = Auth::user();
        } else {
            // Récupérer ou créer l'utilisateur
            $user = User::firstOrCreate(
                ['email' => $request->email],
                ['name' => $request->nom, 'password' => Hash::make('passwordpardefault')]
            );
        }

        $evenement = Evenement::findOrFail($request->evenement_id);
        $montant_total = $evenement->prix_ticket * $request->quantite;

        Ticket::create([
            'evenement_id' => $evenement->id,
            'user_id' => $user->id,
            'quantite' => $request->quantite,
            'montant_total' => $montant_total,
            'statut' => 'réservé',
        ]);

        return response()->json(['success' => true, 'message' => 'Ticket réservé avec succès !']);
    }
}

