<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Ticket;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class TicketController extends Controller
{
    public function confirmer(Ticket $ticket)
    {
        if($ticket->statut === 'paye') {
            return response()->json([
                'success' => false,
                'message' => 'Ce ticket est déjà confirmé.'
            ]);
        }

        $ticket->statut = 'paye';
        $ticket->save();

        return response()->json([
            'success' => true,
            'message' => 'Réservation confirmée avec succès !'
        ]);
    }

    /**
     * Générer le ticket à imprimer
     */
    public function print(Ticket $ticket)
    {
        // Récupère l'événement lié au ticket
        $evenement = $ticket->evenement;

        // Charge la vue du ticket avec le ticket et l'événement
        $pdf = PDF::loadView('admin.evenements.print', compact('ticket', 'evenement'));

        // Affiche le PDF dans le navigateur
        return $pdf->stream('ticket-'.$ticket->id.'.pdf');
    }

    public function store(Request $request)
    {
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'quantite' => 'required|integer|min:1',
        ]);

        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            // Récupérer ou créer l'utilisateur
            $user = User::firstOrCreate(
                ['email' => $request->email],
                ['name' => $request->nom, 'password' => Hash::make('passwordpardefault')]
            );
        }

        $evenement = Evenement::findOrFail($request->evenement_id);

        // 🔹 Vérifier le nombre de places restantes
        $placesReservees = $evenement->tickets()->sum('quantite'); // somme des tickets déjà pris
        $placesRestantes = $evenement->nombre_limite_places - $placesReservees;

        if ($placesRestantes < $request->quantite) {
            return response()->json([
                'success' => false,
                'message' => "Il ne reste plus de place(s) disponible(s) pour cet événement."
            ], 400);
        }

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

