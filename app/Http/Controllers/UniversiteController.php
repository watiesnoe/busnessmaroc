<?php
namespace App\Http\Controllers;

use App\Models\Universite;
use App\Models\Filiere;
use App\Models\UniversitePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UniversiteController extends Controller
{

    public function index_admin(Request $request)
    {
        if ($request->ajax()) {
            $universites = Universite::with('filieres');

            return DataTables::of($universites)
                ->addIndexColumn()
                ->addColumn('filieres', function ($uni) {
                    return $uni->filieres->pluck('nom')->implode(', ');
                })
                ->addColumn('actions', function ($uni) {
                    $voirUrl = route('universites.show', $uni->id);
                    $editUrl = route('universites.edit', $uni->id);
                    $deleteUrl = route('universites.destroy', $uni->id);

                    return '
                        <div class="btn-group" role="group">
                            <a href="' . $voirUrl . '" class="btn btn-sm btn-info me-2" title="Voir"><i class="fa fa-eye"></i></a>
                            <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-2" title="Modifier"><i class="fa fa-pencil-alt"></i></a>
                            <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Voulez-vous vraiment supprimer cette université ?\')">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.universite.index');
    }

    public function index()
    {
        if (Universite::count() === 0 && class_exists(\Database\Seeders\SiteDataSeeder::class)) {
            app(\Database\Seeders\SiteDataSeeder::class)->run();
        }
        $universites = Universite::with(['filieres', 'photos'])->get();
        return view('universite', compact('universites'));
    }
    public function create()
    {
    return view('admin.universite.creation');
    }
    public function deitalle($id)
    {
        $query = Universite::with(['filieres', 'photos']);
        if (\Illuminate\Support\Facades\Schema::hasColumn('universites', 'uuid')) {
            $query->where('uuid', $id)->orWhere('id', $id);
        } else {
            $query->where('id', $id);
        }
        $universite = $query->firstOrFail();

        if (\Illuminate\Support\Facades\Schema::hasColumn('universites', 'uuid') && $id == $universite->id && !empty($universite->uuid)) {
            return redirect()->route('universite.detaille', $universite->uuid);
        }

        return view('universite_detaille', compact('universite'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'filieres.*.nom' => 'required|string',
            'filieres.*.description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg|max:8000',
        ]);

        // 📌 Sauvegarde de l'université
        $universite = new Universite();
        $universite->nom = $request->nom;
        $universite->adresse = $request->adresse;
        $universite->ville = $request->ville;
        $universite->pays = $request->pays;
        $universite->email = $request->email;
        $universite->telephone = $request->telephone;
        $universite->description = $request->description;

        // Logo
        if ($request->hasFile('logo')) {
            $universite->logo = $request->file('logo')->store('logos', 'public');
        }

        $universite->save();

        // 📌 Ajout des filières
        if ($request->has('filieres')) {
            foreach ($request->filieres as $filiere) {
                if (!empty($filiere['nom'])) {
                    Filiere::create([
                        'universite_id' => $universite->id,
                        'nom' => $filiere['nom'],
                        'description' => $filiere['description'] ?? null,
                    ]);
                }
            }
        }

        // 📌 Ajout des photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('universites/photos', 'public');
                UniversitePhoto::create([
                    'universite_id' => $universite->id,
                    'photo' => $path,
                ]);
            }
        }

        return redirect()->route('universites.create')->with('success', 'Université ajoutée avec succès.');
    }
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'filieres.*.nom' => 'required|string|',
            'filieres.*.description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'photos_to_delete' => 'nullable|string',
        ]);

        $universite = Universite::findOrFail($id);

        // Mise à jour des informations principales
        $universite->fill($request->only([
            'nom', 'adresse', 'ville', 'pays', 'email', 'telephone', 'description'
        ]));

        // Gestion du logo
        if ($request->hasFile('logo')) {
            if ($universite->logo && Storage::disk('public')->exists($universite->logo)) {
                Storage::disk('public')->delete($universite->logo);
            }
            $universite->logo = $request->file('logo')->store('logos', 'public');
        }

        $universite->save();

        // 🔹 Gestion des filières : suppression puis ajout
        $universite->filieres()->delete();
        if ($request->filled('filieres')) {
            foreach ($request->filieres as $filiere) {
                if (!empty($filiere['nom'])) {
                    $universite->filieres()->create([
                        'nom' => $filiere['nom'],
                        'description' => $filiere['description'] ?? null,
                    ]);
                }
            }
        }

        // 🔹 Suppression des photos sélectionnées
        if ($request->filled('photos_to_delete')) {
            $idsToDelete = array_filter(explode(',', $request->photos_to_delete));
            $photosToDelete = UniversitePhoto::whereIn('id', $idsToDelete)
                ->where('universite_id', $universite->id)
                ->get();

            foreach ($photosToDelete as $photo) {
                if (Storage::disk('public')->exists($photo->photo)) {
                    Storage::disk('public')->delete($photo->photo);
                }
                $photo->delete();
            }
        }

        // 🔹 Ajout de nouvelles photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('universites/photos', 'public');
                $universite->photos()->create(['photo' => $path]);
            }
        }

        return redirect()->route('universites.edit', $universite->id)
            ->with('success', 'Université mise à jour avec succès.');
    }

    public function edit($id)
    {
        $universite = Universite::with(['filieres', 'photos'])->findOrFail($id);
        return view('admin.universite.creation', compact('universite'));
    }

    public function show($id)
    {
        $universite = Universite::with(['filieres', 'photos'])->findOrFail($id);
        return view('admin.universite.show', compact('universite'));
    }



}
