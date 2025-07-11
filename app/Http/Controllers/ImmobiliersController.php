<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Immobilier;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ImmobiliersController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $immobiliers = Immobilier::select('*');
            return datatables()->of($immobiliers)->make(true);
        }

        return view('admin.immobiliers.index');
    }
    Public function create()
    {
        // Logic to show the form for creating a new property
        return view('admin.immobiliers.creation');
    }
    Public function store(Request $request)
    {

        $request->validate([
            'description' => 'required|string',
            'typeimmeuble' => 'required|string',
            'localisation' => 'required|string',
            'statut' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // 1. Créer le bien immobilier
            $immobilier = Immobilier::create([
                'description' => $request->description,
                'typeimmeuble' => $request->typeimmeuble,
                'localisation' => $request->localisation,
                'statut' => 'available',
            ]);

            // 2. Enregistrer les images si fournies
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $img) {
                    $path = $img->store('images', 'public');

                    Image::create([
                        'immobilier_id' => $immobilier->id,
                        'typeimage' => $path,
                        'dateposte' => now(),
                        'statut' => 'active'
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Bien immobilier créé avec succès !'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erreur : ' . $e->getMessage()], 500);
        }
    }
    Public function show($id)
    {
        // Logic to display a specific property
        return view('immobiliers.show', compact('id'));
    }
    Public function edit($id)
    {
        // Logic to show the form for editing a specific property
        return view('immobiliers.edit', compact('id'));
    }

    Public function update(Request $request, $id)
    {
        // Logic to update a specific property
        // Validate and update the property data
        // Redirect or return a response
    }
}
