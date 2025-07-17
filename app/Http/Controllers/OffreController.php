<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre; // Assure-toi que le modèle existe

class OffreController extends Controller
{
    // Méthode pour afficher les offres côté site vitrine
    public function afficher()
    {
        $offres = Offre::latest()->get(); // Récupère toutes les offres
        return view('offres', compact('offres'));
    }

    // Tu pourras aussi ajouter ici une méthode pour l'administration
    public function index()
    {
        // Afficher les offres côté admin
        $offres = Offre::latest()->get(); // Récupère toutes les offres
        // return view('admin.offre.index', compact('offre'));
        return view('admin.offre.index');
    }

    public function create()
    {
        return view('admin.offre.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'type_offre' => 'required|string|in:emploi,stage',
            'entreprise' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'description' => 'required|string',
            'date_limite' => 'nullable|date',
            'contrat_type' => 'nullable|string|max:255',
            'competences_requises' => 'nullable|string',
            'contact_email' => 'nullable|email',
        ]);

        Offre::create($validated);

        return redirect()->route('admin.offre.create')->with('success', 'Offre publiée avec succès !');
    }
}
