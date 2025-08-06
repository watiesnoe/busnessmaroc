<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Offre;
use Yajra\DataTables\Facades\DataTables;

// Assure-toi que le modèle existe

class OffreController extends Controller
{
    // Méthode pour afficher les offres côté site vitrine
    public function afficher(Request $request)
    {
        // ✅ Récupérer les offres dont la date limite n'est pas passée
        $offres = Offre::where('date_limite', '>=', Carbon::today())
            ->latest()
            ->paginate(6);

        if ($request->ajax()) {
            return view('layoutsite.partials.liste', compact('offres'))->render();
        }

        return view('offres', compact('offres'));
    }

    public function filtrer(Request $request)
    {
        $secteurs = $request->input('secteurs', []);

        $offres = Offre::where('date_limite', '>=', Carbon::today());
        if (!empty($secteurs)) {
            $offres->whereIn('secteur', $secteurs);
        }

        $offres = $offres->latest()->paginate(6);

        if ($request->ajax()) {
            return view('layoutsite.partials.liste', compact('offres'))->render();
        }

        return view('offres', compact('offres'));
    }




    // Tu pourras aussi ajouter ici une méthode pour l'administration
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $offres = Offre::withCount('candidatures');

            return DataTables::of($offres)
                ->addIndexColumn()
                ->addColumn('nb_postulants', function ($offre) {
                    return $offre->candidatures_count;
                })
                ->addColumn('actions', function ($offre) {
                    $voirUrl = route('offre.show', $offre->id);
                    $editUrl = route('offre.edit', $offre->id);
                    $candidatsUrl = route('admin.offres.candidats', ['offre' => $offre->id]);

                    return '
                <div class="dropdown">
                  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Actions
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="' . $voirUrl . '">🔍 Voir</a></li>
                    <li><a class="dropdown-item" href="' . $editUrl . '">✏️ Modifier</a></li>
                    <li><a class="dropdown-item" href="' . $candidatsUrl . '">👥 Candidats</a></li>
                  </ul>
                </div>';
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

}
