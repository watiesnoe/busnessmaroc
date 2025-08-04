<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Yajra\DataTables\DataTables;

// Assure-toi que le modèle existe

class UtilisateurController extends Controller
{
    // Méthode pour afficher les offres côté site vitrine


    // Tu pourras aussi ajouter ici une méthode pour l'administration
      public function index()
    {
       // $utilisateurs = Utilisateur::latest()->get(); // Récupère les utilisateurs
        return view('admin.utilisateurs.index');
    }
    public function clients(Request $request)
    {
        if ($request->ajax()) {
            $clients = User::where('role', 'client');

            return DataTables::of($clients)
                ->addColumn('statut', function ($row) {
                    return '<span class="badge bg-success">Actif</span>';
                })
                ->addColumn('actions', function ($row) {
                    return '<a href="'.route('utilisateurs.show', $row->id).'" class="btn btn-sm btn-info">Voir</a>';
                })
                ->rawColumns(['statut', 'actions'])
                ->make(true);
        }

        return view('admin.utilisateurs.client');
    }

    public function create()
    {
        return view('admin.utilisateurs.create');
    }


}
