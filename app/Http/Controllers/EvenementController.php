<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    if ($request->ajax()) {
        $evenements = Evenement::query()->orderBy('date_debut', 'desc');

        return DataTables::of($evenements)
            ->addIndexColumn()
            ->addColumn('actions', function ($event) {
                $editUrl = route('evenements.edit', $event->id);
                $deleteUrl = route('evenements.destroy', $event->id);
                return '
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="'.$editUrl.'"><i class="fa fa-edit me-2"></i>Éditer</a></li>
                            <li><button class="dropdown-item delete-btn" data-url="'.$deleteUrl.'"><i class="fa fa-trash me-2"></i>Supprimer</button></li>
                        </ul>
                    </div>
                    ';})
            ->editColumn('prix_ticket', function($event) {
                return number_format($event->prix_ticket, 0, ',', ' ') . ' FCFA';
            })
            ->editColumn('date_debut', function($event){
                return \Carbon\Carbon::parse($event->date_debut)->format('d M Y H:i');
            })
            ->editColumn('date_fin', function($event){
                return \Carbon\Carbon::parse($event->date_fin)->format('d M Y H:i');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    return view('admin.evenements.index'); // ta vue avec DataTable
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.evenements.creation'); // ta vue pour créer un événement
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'titre'        => 'required|string|max:255',
            'lieu'         => 'required|string|max:255',
            'description'  => 'required|string',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'prix_ticket'  => 'required|numeric|min:0',
            'statut'       => 'required|in:à venir,terminé,annulé',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4000',
        ]);

        // ✅ Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evenements', 'public');
        }

        // ✅ Création de l’événement
        $evenement = Evenement::create([
            'titre'       => $validated['titre'],
            'lieu'        => $validated['lieu'],
            'description' => $validated['description'],
            'date_debut'  => $validated['date_debut'],
            'date_fin'    => $validated['date_fin'],
            'prix_ticket' => $validated['prix_ticket'],
            'statut'      => $validated['statut'],
            'image'       => $imagePath,
        ]);

        // ✅ Si AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Événement enregistré avec succès',
                'data'    => $evenement
            ]);
        }

        // ✅ Si formulaire classique
        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès !');
    }
    /**
     * Display the specified resource.
     */



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('admin.evenements.creation',compact('evenement'));
    }
    public function update(Request $request, $id)
    {
        // ✅ Récupération de l'événement
        $evenement = Evenement::findOrFail($id);

        // ✅ Validation
        $validated = $request->validate([
            'titre'        => 'required|string|max:255',
            'lieu'         => 'required|string|max:255',
            'description'  => 'required|string',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'prix_ticket'  => 'required|numeric|min:0',
            'statut'       => 'required|in:à venir,terminé,annulé',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4000',
        ]);

        // ✅ Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l’ancienne image si elle existe
            if ($evenement->image && Storage::disk('public')->exists($evenement->image)) {
                Storage::disk('public')->delete($evenement->image);
            }

            // Sauvegarder la nouvelle image
            $validated['image'] = $request->file('image')->store('evenements', 'public');
        }

        // ✅ Mise à jour
        $evenement->update($validated);

        // ✅ Si AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Événement mis à jour avec succès',
                'data'    => $evenement
            ]);
        }

        // ✅ Si classique
        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès !');
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
