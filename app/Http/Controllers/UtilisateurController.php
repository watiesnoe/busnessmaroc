<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
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
//    public function clients(Request $request)
//    {
//        if ($request->ajax()) {
//            $clients = User::where('role', 'client');
//
//            return DataTables::of($clients)
//                ->addColumn('statut', function ($row) {
//                    return '<span class="badge bg-success">Actif</span>';
//                })
//                ->addColumn('actions', function ($row) {
//                    return '<a href="'.route('utilisateurs.show', $row->id).'" class="btn btn-sm btn-info">Voir</a>';
//                })
//                ->rawColumns(['statut', 'actions'])
//                ->make(true);
//        }
//
//        return view('admin.utilisateurs.client');
//    }
    public function clients(Request $request)
    {
        $clients = User::where('role', 'client')->paginate(12);

        if ($request->ajax()) {
            // Retourne juste la vue partielle des cartes (pagination comprise)
            return view('admin.utilisateurs.partials.clients-cards', compact('clients'))->render();
        }

        return view('admin.utilisateurs.client', compact('clients'));
    }

    public function candidats(Request $request)
    {
        $candidats = User::where('role', 'client')
            ->whereHas('candidatures')
            ->paginate(12);

        if ($request->ajax()) {
            return view('layouts.partials.candidats', compact('candidats'))->render();
        }

        return view('admin.utilisateurs.candidature', compact('candidats'));
    }
    public function create()
    {
        return view('admin.utilisateurs.create');
    }

    public function showCv($id)
    {
        $candidature = Candidature::findOrFail($id);

        $path = public_path('storage/' . $candidature->cv);

        if (!File::exists($path)) {
            abort(404, 'CV non trouvé');
        }

        return response()->file($path);
    }

    public function showLettre($id)
    {
        $candidature = Candidature::findOrFail($id);

        if (!$candidature->lettre_motivation) {
            abort(404, 'Lettre de motivation non fournie');
        }

        $path = public_path('storage/' . $candidature->lettre_motivation);

        if (!File::exists($path)) {
            abort(404, 'Lettre de motivation non trouvée');
        }

        return response()->file($path);
    }

}
