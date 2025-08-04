<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('details_offre.show', $request->offre_id)
            ->with('success', 'Votre candidature a été envoyée avec succès.');
    }
}
