<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Description;
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

    public function candidatsliste(Request $request)
    {
        if ($request->ajax()) {
            // Requête de base avec jointure et count
            $query = User::select(
                'users.id',
                'users.prenom',
                'users.nom',
                'users.email',
                DB::raw('COUNT(candidatures.id) as total_candidatures')
            )
                ->leftJoin('candidatures', 'users.id', '=', 'candidatures.user_id')
                ->groupBy('users.id', 'users.prenom', 'users.nom', 'users.email');

            // Retourner la réponse DataTables en JSON
            return DataTables::of($query)
                ->addColumn('avatar', function($user) {
                    $avatarNum = rand(1, 10);
                    $url = asset("assets/media/avatars/avatar{$avatarNum}.jpg");
                    return '<img src="'.$url.'" alt="Avatar" width="32" height="32" class="img-avatar img-avatar32">';
                })
                ->addColumn('actions', function($user) {
                    $profileUrl = route('utilisateurs.profile', $user->id);
                    return '<a class="btn btn-sm btn-alt-primary" href="'.$profileUrl.'">
                            <i class="fa fa-user-circle"></i> Profil
                        </a>';
                })
                ->rawColumns(['avatar', 'actions']) // Pour rendre le HTML
                ->make(true);
        }
        // Affiche la vue normale avec la table (sans données, chargées via Ajax)
        return view('admin.utilisateurs.candidatureliste');
    }

//    public function candidats(Request $request, Offre $offre)
//    {
//
//        $candidatures = $offre->candidatures()->with('user')->latest()->paginate(12);
////        dd($candidatures);
//        if ($request->ajax()) {
//            return view('layouts.partials.candidats', compact('candidatures'))->render();
//        }
//
//        return view('admin.utilisateurs.candidature', compact('offre', 'candidatures'));
//    }
    public function candidats(Request $request, Offre $offre)
    {
        $candidatures = $offre->candidatures()->with('user')->latest()->paginate(12);

        if ($request->ajax()) {
            return view('layouts.partials.candidats', compact('candidatures'))->render();
        }

        return view('admin.utilisateurs.candidature', compact('offre', 'candidatures'));
    }

    // Mettre à jour le statut d'un candidat (apprové/refusé)
    public function updateStatus(Request $request, $id)
    {
        $candidature = Candidature::findOrFail($id);

        $request->validate([
            'status' => 'required|in:accepte,refuse',
            'note' => 'nullable|integer|min:1|max:5',
            'remarque' => 'nullable|string|max:500'
        ]);

        $candidature->update([
            'est_approuve' => $request->status === 'accepte',
            'note' => $request->note,
            'remarque' => $request->remarque,
//            'status' => $request->status, // optionnel pour suivi
        ]);

        return response()->json(['success' => true]);
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
    public function profile ($id){
        $user = User::with(['candidatures.offre'])->findOrFail($id);

        return view('admin.utilisateurs.profile', compact('user'));
    }

}
