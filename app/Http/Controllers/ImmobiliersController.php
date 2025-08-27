<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Category;
use App\Models\Chambre;
use App\Models\Entreprise;
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
                ->addColumn('statut', function ($row) {
                    $class = match ($row->statut) {
                        'disponible' => 'bg-success',
                        'reserve'    => 'bg-warning',
                        'loue'       => 'bg-danger',
                        default      => 'bg-secondary',
                    };

                    return '<span class="badge ' . $class . '">' . ucfirst($row->statut) . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $showUrl = route('immobiliers.show', $row->id);
                    $editUrl = route('immobiliers.edit', $row->id);
                    $deleteUrl = route('immobiliers.destroy', $row->id);

                    return '
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="' . $showUrl . '" title="Voir">
                                    <i class="fa fa-eye me-1"></i> Voir
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="' . $editUrl . '" title="Modifier">
                                    <i class="fa fa-edit me-1"></i> Modifier
                                </a>
                            </li>
                            <li>
                                <button type="button" data-url="' . $deleteUrl . '" class="dropdown-item text-danger btn-delete" title="Supprimer">
                                    <i class="fa fa-trash me-1"></i> Supprimer
                                </button>
                            </li>
                        </ul>
                    </div>
                ';
                })
                ->rawColumns(['statut', 'action']) // important pour rendre le HTML dans ces colonnes
                ->make(true);
        }

        $categories = Category::all();

        return view('admin.immobiliers.index', compact('categories'));
    }

    public function create()
    {
        $categories  = Categorie::orderBy('nom')->get();
        $entreprises = Entreprise::orderBy('nom')->get();

        return view('admin.immobiliers.creation', compact('categories', 'entreprises'));
    }

    public function edit(Immobilier $immobilier)
    {
        $categories  = Categorie::orderBy('nom')->get();
        $entreprises = Entreprise::orderBy('nom')->get();

        return view('admin.immobiliers.edit', compact('immobilier', 'categories', 'entreprises'));
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

            // Entreprise
            'entreprise_id' => 'nullable|exists:entreprises,id',
            'new_entreprise.nom' => 'nullable|string|max:255',
            'new_entreprise.email' => 'nullable|email',
            'new_entreprise.telephone' => 'nullable|string|max:50',
            'new_entreprise.adresse' => 'nullable|string|max:255',
            'new_entreprise.site_web' => 'nullable|string|max:255',
            'new_entreprise.secteur' => 'nullable|string|max:255',
            'new_entreprise.description' => 'nullable|string',

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

        // 2. Déterminer l'entreprise
        $entrepriseId = $request->entreprise_id;
        if (!$entrepriseId && $request->filled('new_entreprise.nom')) {
            $entreprise = Entreprise::create($request->input('new_entreprise'));
            $entrepriseId = $entreprise->id;
        }

        // 3. Créer l'immobilier
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
            'entreprise_id' => $entrepriseId,
        ]);

        // 4. Ajouter les chambres
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

        // 5. Ajouter les photos globales
        if ($request->hasFile('photos')) {
            $isFirst = true;

            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public');

                Photo::create([
                    'immobilier_id' => $immobilier->id,
                    'url' => $path,
                    'principale' => $isFirst, // la première est "principale"
                ]);

                $isFirst = false;
            }
        }

        return response()->json(['message' => 'Annonce enregistrée avec succès']);
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

            // Entreprise
            'entreprise_id' => 'nullable|exists:entreprises,id',
            'new_entreprise.nom' => 'nullable|string|max:255',
            'new_entreprise.email' => 'nullable|email',
            'new_entreprise.telephone' => 'nullable|string|max:50',
            'new_entreprise.adresse' => 'nullable|string|max:255',
            'new_entreprise.site_web' => 'nullable|string|max:255',
            'new_entreprise.secteur' => 'nullable|string|max:255',
            'new_entreprise.description' => 'nullable|string',

            // Chambres
            'chambres.*.type' => 'required|string',
            'chambres.*.prix_jour' => 'required|numeric',
            'chambres.*.prix_mois' => 'required|numeric',
            'chambres.*.prix_annee' => 'required|numeric',
            'chambres.*.capacite' => 'required|integer',
            'chambres.*.statut' => 'required|string|in:disponible,reservee,occupee',
            'chambres.*.description' => 'nullable|string',

            'photo_principale' => 'nullable|exists:photos,id',
        ]);

        $immobilier = Immobilier::findOrFail($id);

        // Déterminer l'entreprise
        $entrepriseId = $request->entreprise_id;
        if (!$entrepriseId && $request->filled('new_entreprise.nom')) {
            $entreprise = Entreprise::create($request->input('new_entreprise'));
            $entrepriseId = $entreprise->id;
        }

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
            'entreprise_id' => $entrepriseId,
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

        // Mise à jour de la photo principale
        if ($request->filled('photo_principale')) {
            // Réinitialiser toutes les photos de cet immobilier
            Photo::where('immobilier_id', $immobilier->id)->update(['principale' => false]);

            // Définir la nouvelle photo principale
            Photo::where('id', $request->photo_principale)->update(['principale' => true]);
        }

        return response()->json(['message' => 'Annonce mise à jour avec succès']);
    }

    public function show($id)
    {
        $immobilier = Immobilier::with([
        'category',
        'chambres' => function ($query) {
            $query->where('statut', 'disponible');
        },
            'contratLocations.user'  // Charge contrats et utilisateurs liés
        ])->findOrFail($id);

        return view('admin.immobiliers.detailimmobiler', compact('immobilier'));
    }

//    public function edit($id)
//    {
//        $immobilier = Immobilier::with(['category', 'chambres', 'photos'])->findOrFail($id);
//        $categories = Categorie::all();
//        return view('admin.immobiliers.edit', compact('immobilier', 'categories'));
//    }

    Public function destroy($id)
    {
        $immobilier = Immobilier::findOrFail($id);
        $immobilier->delete();

        return response()->json(['message' => 'Annonce supprimée avec succès']);
    }

}
