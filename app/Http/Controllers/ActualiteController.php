<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ActualiteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $actualites = Actualite::orderBy('date_publication', 'desc');

            return DataTables::of($actualites)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="'.asset('storage/'.$row->image).'"
                             alt="'.$row->titre.'"
                             style="width:50px; height:50px; object-fit:cover; border-radius:5px;">';
                    }
                    return '<span class="badge bg-secondary">Aucune</span>';
                })
                ->editColumn('date_publication', function ($row) {
                    return Carbon::parse($row->date_publication)->format('d/m/Y H:i');
                })
                ->addColumn('actions', function ($row) {
                    $editUrl = route('adminactualite.edit', $row->id);
                    $deleteUrl = route('adminactualite.destroy', $row->id);

                    return '
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        ⚙️ Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="'.$editUrl.'">✏️ Éditer</a></li>
                        <li><button class="dropdown-item text-danger delete-btn" data-url="'.$deleteUrl.'">🗑 Supprimer</button></li>
                    </ul>
                </div>';
                })
                ->rawColumns(['image', 'actions'])
                ->make(true);
        }

        return view('admin.actualites.index');
    }
    public function create()
    {
        return view('admin.actualites.creation');
    }
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'titre'             => 'required|string|max:255',
            'contenu'           => 'required|string',
            'auteur'            => 'nullable|string|max:150',
            'date_publication'  => 'nullable|date',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4000',
        ]);

        try {
            // 2. Préparer les données
            $actualite = new Actualite();
            $actualite->titre = $validated['titre'];
            $actualite->contenu = $validated['contenu'];
            $actualite->auteur = $validated['auteur'] ?? auth()->user()->name ?? 'Anonyme';
            $actualite->date_publication = $validated['date_publication'] ?? now();

            // 3. Upload image si fournie
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads/actualites', $filename, 'public');
                $actualite->image = $path; // Colonne `image` dans la BDD
            }

            // 4. Sauvegarde
            $actualite->save();

            // 5. Réponse AJAX
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Actualité enregistrée avec succès !']);
            }

            // Sinon redirection classique
            return redirect()->back()->with('success', 'Actualité enregistrée avec succès !');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Erreur : '.$e->getMessage()], 500);
            }
            return redirect()->back()->withErrors(['error' => 'Erreur : '.$e->getMessage()]);
        }
    }

    public function show($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('admin.actualites.show', compact('actualite'));
    }

    public function edit($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('admin.actualites.creation', compact('actualite'));
    }

    public function update(Request $request, $id)
    {
        // Récupérer l'actualité existante
        $actualite = Actualite::findOrFail($id);

        // Validation des champs
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'auteur' => 'nullable|string|max:255',
            'date_publication' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);

        // Mise à jour des champs
        $actualite->titre = $request->titre;
        $actualite->contenu = $request->contenu;
        $actualite->auteur = $request->auteur;
        $actualite->date_publication = $request->date_publication;

        // Upload image si fournie
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Supprimer l'ancienne image si elle existe
            if($actualite->image && file_exists(public_path('storage/'.$actualite->image))){
                unlink(public_path('storage/'.$actualite->image));
            }

            // Stocker la nouvelle image
            $path = $file->storeAs('uploads/actualites', $filename, 'public');
            $actualite->image = $path;
        }

        $actualite->save();

        // Retour AJAX ou redirection normale
        if($request->ajax()){
            return response()->json(['success' => true]);
        }

        return redirect()->route('adminactualite.index')
            ->with('success', 'Actualité mise à jour avec succès !');
    }


}

