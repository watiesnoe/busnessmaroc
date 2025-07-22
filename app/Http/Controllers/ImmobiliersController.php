<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Category;
use App\Models\Chambre;
use App\Models\Immobilier;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ImmobiliersController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $immobiliers = Immobilier::with('category')->latest()->get();

            return datatables()->of($immobiliers)
                ->addColumn('categorie', function ($row) {
                    return $row->category->nom ?? '-';
                })
                ->addColumn('action', function ($row) {
                    $showUrl = route('immobiliers.show', $row->id);
                    $editUrl = route('immobiliers.edit', $row->id);
                    $deleteUrl = route('immobiliers.destroy', $row->id);

                    return '
            <a href="' . $showUrl . '" class="btn btn-sm btn-info me-1" title="Voir">
                <i class="fa fa-eye"></i>
            </a>
            <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Modifier">
                <i class="fa fa-edit"></i>
            </a>
            <button type="button" data-url="' . $deleteUrl . '" class="btn btn-sm btn-danger btn-delete" title="Supprimer">
                <i class="fa fa-trash"></i>
            </button>
        ';
                })
                ->rawColumns(['action']) // permet l'affichage HTML
                ->make(true);

        }

        $categories = Category::all();

        return view('admin.immobiliers.index',compact('categories'));
    }
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.immobiliers.creation', compact('categories'));
    }


    public function store(Request $request)
{
    // 1. Validation
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'ville' => 'required|string',
        'quartier' => 'nullable|string',
        'surface' => 'nullable|numeric',
        'prix' => 'nullable|numeric',
        'etage' => 'nullable|integer',
        'statut' => 'required|in:disponible,reserve,loue',
        'photos.*' => 'nullable|image|max:2048',

        // Chambres
        'chambres' => 'nullable|array',
        'chambres.*.type' => 'nullable|string',
        'chambres.*.prix_jour' => 'nullable|numeric',
        'chambres.*.prix_mois' => 'nullable|numeric',
        'chambres.*.prix_annee' => 'nullable|numeric',
        'chambres.*.capacite' => 'nullable|integer',
        'chambres.*.statut' => 'nullable|string|in:disponible,reservee,occupee',
        'chambres.*.description' => 'nullable|string',
        'chambres.*.image' => 'nullable|image|max:2048',
    ]);

    // 2. Créer l'immobilier
    $immobilier = Immobilier::create([
        'user_id' => Auth::id(),
        'category_id' => $request->category_id,
        'titre' => $request->titre,
        'description' => $request->description,
        'ville' => $request->ville,
        'quartier' => $request->quartier,
        'surface' => $request->surface,
        'prix' => $request->prix,
        'etage' => $request->etage,
        'statut' => $request->statut,
        'en_vedette' => $request->has('en_vedette'),
    ]);

    // 3. Ajouter les chambres
    if ($request->filled('chambres')) {
        foreach ($request->chambres as $index => $chambre) {
            $imagePath = null;
            if ($request->hasFile("chambres.$index.image")) {
                $imagePath = $request->file("chambres.$index.image")->store('chambres', 'public');
            }

            $immobilier->chambres()->create([
                'type' => $chambre['type'],
                'prix_jour' => $chambre['prix_jour'],
                'prix_mois' => $chambre['prix_mois'],
                'prix_annee' => $chambre['prix_annee'],
                'capacite' => $chambre['capacite'],
                'statut' => $chambre['statut'],
                'description' => $chambre['description'] ?? null,
                'image' => $imagePath,
            ]);
        }
    }

    // 4. Ajouter les photos globales
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('photos', 'public');
            Photo::create([
                'immobilier_id' => $immobilier->id,
                'url' => $path,
            ]);
        }
    }

     return response()->json(['message' => 'Annonce enregistrée avec succès']);
}

    public function show($id)
    {
        $immobilier = Immobilier::with(['category', 'chambres', 'photos'])->findOrFail($id);
        return view('admin.immobiliers.show', compact('immobilier'));
    }
    public function edit($id)
    {
        $immobilier = Immobilier::with(['category', 'chambres', 'photos'])->findOrFail($id);
        $categories = Categorie::all();
        return view('admin.immobiliers.edit', compact('immobilier', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'ville' => 'required|string',
            'quartier' => 'nullable|string',
            'surface' => 'required|numeric',
            'prix' => 'required|numeric',
            'etage' => 'nullable|integer',
            'photos.*' => 'nullable|image|max:2048',

            // Champs des chambres
            'chambres.*.type' => 'required|string',
            'chambres.*.prix_jour' => 'required|numeric',
            'chambres.*.prix_mois' => 'required|numeric',
            'chambres.*.prix_annee' => 'required|numeric',
            'chambres.*.capacite' => 'required|integer',
            'chambres.*.statut' => 'required|string|in:disponible,reservee,occupee',
            'chambres.*.description' => 'nullable|string',
        ]);

        $immobilier = Immobilier::findOrFail($id);

        // Mise à jour des données de l'immobilier
        $immobilier->update([
            'category_id' => $request->category_id,
            'titre' => $request->titre,
            'description' => $request->description,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'surface' => $request->surface,
            'prix' => $request->prix,
            'etage' => $request->etage,
            'statut' => $request->statut ?? 'disponible',
            'en_vedette' => $request->boolean('en_vedette'),
        ]);

        // Suppression des chambres existantes
        $immobilier->chambres()->delete();

        // Recréation des chambres
        foreach ($request->chambres as $chambre) {
            Chambre::create([
                'immobilier_id' => $immobilier->id,
                'type' => $chambre['type'],
                'prix_jour' => $chambre['prix_jour'],
                'prix_mois' => $chambre['prix_mois'],
                'prix_annee' => $chambre['prix_annee'],
                'capacite' => $chambre['capacite'],
                'statut' => $chambre['statut'],
                'description' => $chambre['description'] ?? null,
            ]);
        }

        // Gestion des nouvelles photos (ajout)
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public');
                Photo::create([
                    'immobilier_id' => $immobilier->id,
                    'url' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Annonce mise à jour avec succès']);
    }
    Public function destroy($id)
    {
        $immobilier = Immobilier::findOrFail($id);
        $immobilier->delete();

        return response()->json(['message' => 'Annonce supprimée avec succès']);
    }

}
