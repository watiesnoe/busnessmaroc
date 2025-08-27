<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CandidatureController extends Controller
{
    // Affiche le formulaire de candidature pour une offre donnée
    public function create($offreId)
    {
        $offre = Offre::findOrFail($offreId);

        // Vérifie si le mode candidature est interne
        if ($offre->mode_candidature !== 'interne') {
            return redirect()->route('details_offre.show', $offreId)
                ->with('error', 'La candidature interne n\'est pas disponible pour cette offre.');
        }

        return view('postuler', compact('offre'));
    }

    // Enregistre la candidature
    public function store(Request $request)
    {
        $request->validate([
            'offre_id' => 'required|exists:offres,id',
            'cv' => 'required|file|mimes:pdf|max:8048',
            'lettre_motivation' => 'nullable|file|mimes:pdf,doc,docx|max:8048',
            'message' => 'nullable|string',
        ]);

        $offre = Offre::findOrFail($request->offre_id);

        $nombreCandidats = $offre->candidatures()->count();

        if ($nombreCandidats >= $offre->nombre_limite_candidats) {
            // Si c'est une requête AJAX, retourne JSON
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Le nombre maximal de candidatures est déjà atteint pour cette offre.'
                ], 403);
            }

            // Sinon redirige normalement
            return redirect()->back()->with('error', 'Le nombre maximal de candidatures est déjà atteint pour cette offre.');
        }

        $cvPath = $request->file('cv')->store('cvs', 'public');
        $lettrePath = $request->file('lettre_motivation')
            ? $request->file('lettre_motivation')->store('lettres', 'public')
            : null;

        Candidature::create([
            'user_id' => Auth::id(),
            'offre_id' => $request->offre_id,
            'cv' => $cvPath,
            'lettre_motivation' => $lettrePath,
            'message' => $request->message,
        ]);

        // Réponse AJAX ou redirect classique
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre candidature a été envoyée avec succès.'
            ]);
        }

        return redirect()->route('details_offre.show', $request->offre_id)
            ->with('success', 'Votre candidature a été envoyée avec succès.');
    }


    public function envoyerAlerte(Request $request, $id)
    {
        $candidature = Candidature::findOrFail($id);
        $type = $request->type;

        if ($type === 'entretien') {
            // mise à jour du statut
            $candidature->statut = 'entretien';
            $candidature->save();

            // envoi du mail
            Mail::to($candidature->user->email)
                ->send(new \App\Mail\ConvocationEntretienMail($candidature));

            $message = "Email d’entretien envoyé avec succès.";
        } elseif ($type === 'definitif') {
            // mise à jour du statut
            $candidature->statut = 'retenue';
            $candidature->save();

            // envoi du mail
            Mail::to($candidature->user->email)
                ->send(new \App\Mail\SelectionDefinitiveMail($candidature));

            $message = "Email de sélection définitive envoyé avec succès.";
        } else {
            return response()->json(['message' => 'Type invalide.'], 400);
        }

        return response()->json(['message' => $message]);
    }


}
