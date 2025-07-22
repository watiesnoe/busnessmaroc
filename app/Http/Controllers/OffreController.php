<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use Yajra\DataTables\Facades\DataTables;

// Assure-toi que le modèle existe

class OffreController extends Controller
{
    // Méthode pour afficher les offres côté site vitrine
    public function afficher()
    {
    $offres = Offre::latest()->paginate(6); // 6 offres par page
        return view('offres', compact('offres'));
    }

    // Tu pourras aussi ajouter ici une méthode pour l'administration
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $offres = Offre::query();

            return DataTables::of($offres)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    return '<a href="#" class="btn btn-sm btn-info">Voir</a>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
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
            'type_offre' => 'required|in:emploi,stage',
            'date_publication' => 'required|date',
            'entreprise' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'secteur' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'date_limite' => 'required|date|after_or_equal:date_publication',
            'salaire' => 'nullable|numeric|min:0',
            'profil_recherche' => 'required|string',
            'description' => 'required|string',
        ]);
//dd($validated);
        Offre::create($validated);

        return response()->json(['success' => true, 'message' => 'Offre enregistrée avec succès.']);
    }

    public function edit($id)
    {
        $offre = Offre::findOrFail($id);
        return view('admin.offre.edit', compact('offre'));
    }
    public function filtrer(Request $request)
    {
        $secteurs = $request->secteurs ?? [];

        $offres = Offre::when(count($secteurs), function ($query) use ($secteurs) {
            $query->whereIn('secteur', $secteurs);
        })->latest()->get();

        return view('layoutsite.partials.liste', compact('offres'))->render();
    }
}
