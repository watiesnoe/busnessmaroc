<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Image;
use App\Models\Immobilier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class ChambresController extends Controller
{
    //
    Public function index(Request $request)
    {
//         Logic to display the list of rooms

        if ($request->ajax()) {
            $immobiliers = Immobilier::withCount('chambres'); // ajoute chambres_count

           return datatables()->of(Immobilier::withCount('chambres'))
             ->addColumn('action', function ($row) {
                 return '<a href="' . route('chambres.show', parameters: $row->id) . '">Voir</a>';
             })
    ->rawColumns(['action']) // important si tu rends du HTML
    ->make(true);
        }

        return view('admin.chambres.index');
    }
    Public function create()
    {
        // Logic to show the form for creating a new room
        $immobiliers = Immobilier::all();
        return view('admin.chambres.creation',compact('immobiliers'));
    }
    Public function store(Request $request)
    {
        $request->validate([
            'immobilier_id' => 'required|exists:immobiliers,id',
            'chambres' => 'required|array|min:1',
            'chambres.*.typechambre' => 'required',
            'chambres.*.prix_jour' => 'required|numeric',
            'chambres.*.prix_mois' => 'required|numeric',
            'chambres.*.prix_annee' => 'required|numeric',
            'chambres.*.capacite' => 'required|integer',
            'chambres.*.statut' => 'required',
            'chambres.*.description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // 1. Créer le bien immobilier
            foreach ($request->chambres as $chambreData) {
                Chambre::create([
                    'immobilier_id' => $request->immobilier_id,
                    'typechambre'   => $chambreData['typechambre'],
                    'prix_jour'          => $chambreData['prix_jour'],
                    'prix_mois'          => $chambreData['prix_mois'],
                    'prix_annee'          => $chambreData['prix_annee'],
                    'capacite'      => $chambreData['capacite'],
                    'statut'        => $chambreData['statut'],
                    'description'   => $chambreData['description'],
                ]);
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
        // Logic to display a specific room
        return view('chambres.show', compact('id'));
    }
    Public function edit($id)
    {
        // Logic to show the form for editing a specific room
        return view('chambres.edit', compact('id'));
    }
    Public function update(Request $request, $id)
    {
        // Logic to update a specific room
        // Validate and update the room data
        // Redirect or return a response
    }

}
