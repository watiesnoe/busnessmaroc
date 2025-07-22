<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur; // Assure-toi que le modèle existe

class UtilisateurController extends Controller
{
    // Méthode pour afficher les offres côté site vitrine
   

    // Tu pourras aussi ajouter ici une méthode pour l'administration
  public function index()
{
   // $utilisateurs = Utilisateur::latest()->get(); // Récupère les utilisateurs
    return view('admin.utilisateurs.index');
}


    public function create()
    {
        return view('admin.utilisateurs.create');
    }

   
}
