<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EntrepriseController extends Controller
{
    /**
     * Liste toutes les entreprises.
     */
    public function index(Request $request)
    {
        // ⚡ Cas DataTables AJAX
        if ($request->ajax()) {
            $entreprises = Entreprise::select(['id','nom','email','telephone','adresse','created_at']);

            return DataTables::of($entreprises)
                ->addColumn('action', function ($row) {
                    return '
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="actionDropdown'.$row->id.'" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="actionDropdown'.$row->id.'">
                                <li>
                                    <a class="dropdown-item" href="'.route('entreprises.show', $row->id).'">
                                        <i class="fa fa-eye me-2"></i>Voir
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="'.route('entreprises.edit', $row->id).'">
                                        <i class="fa fa-edit me-2"></i>Modifier
                                    </a>
                                </li>
                                <li>
                                    <button class="dropdown-item text-danger delete-btn" data-id="'.$row->id.'">
                                        <i class="fa fa-trash me-2"></i>Supprimer
                                    </button>
                                </li>
                            </ul>
                        </div>
                        ';
                })
                ->editColumn('created_at', function($row){
                    return $row->created_at ? $row->created_at->format('d/m/Y H:i') : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // ⚡ Cas affichage classique → retour vue Blade
        return view('admin.entreprises.index');
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.entreprises.create');
    }

    /**
     * Enregistre une nouvelle entreprise.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'adresse' => 'nullable|string|max:255',
            'secteur' => 'nullable|string|max:255',
            'site_web' => 'nullable|url|max:255',
            'description' => 'nullable|string',
        ]);

        $entreprise = Entreprise::create($validated);

        return response()->json([
            'success' => true,
            'entreprise' => $entreprise
        ]);
    }


    /**
     * Affiche une entreprise précise.
     */
    public function show(Entreprise $entreprise)
    {
        return view('admin.entreprises.show', compact('entreprise'));
    }

    /**
     * Affiche le formulaire d’édition.
     */
    // Affiche le formulaire pour éditer une entreprise
    public function edit(Entreprise $entreprise)
    {
        // On passe l'entreprise à la vue
        $entreprises = Entreprise::select(['id','nom','email','telephone','adresse','created_at']);
        return view('admin.entreprises.create', compact('entreprise'));
    }

    /**
     * Met à jour une entreprise.
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:50',
            'adresse' => 'nullable|string|max:255',
            'secteur' => 'nullable|string|max:100',
            'site_web' => 'nullable|url|max:255',
            'description' => 'nullable|string',
        ]);

        $entreprise->update($request->all());

        // Si tu veux gérer l'édition via AJAX, tu peux retourner JSON
        if($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Entreprise mise à jour avec succès !']);
        }

        // Sinon redirection normale
        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise mise à jour avec succès.');
    }


    /**
     * Supprime une entreprise.
     */
    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise supprimée avec succès.');
    }
}
