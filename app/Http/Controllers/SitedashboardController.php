<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Category;
use App\Models\Evenement;
use App\Models\Immobilier;
use App\Models\Offre;
use Illuminate\Http\Request;

class SitedashboardController extends Controller
{
    public function index()
    {

        // Charger uniquement les biens avec AU MOINS UNE chambre qui n’est ni "occupée" ni "réservée"
        $immobiliers = Immobilier::with(['category', 'photoPrincipale', 'chambres'])
            ->whereHas('chambres', function ($q) {
                $q->whereNotIn('statut', ['occupee', 'reservee', 'occupée', 'réservée', 'indisponible']);
            })
            ->get();
        $actualites = Actualite::orderBy('date_publication','desc')
            ->paginate(12)
            ->appends(request()->query());

        // Annonces vedette (non filtrées par statut de chambre, sauf si tu veux)
        $annoncesVedette = Immobilier::where('en_vedette', true)
            ->with('photoPrincipale')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'immobiliers' => $immobiliers,
            'annoncesVedette' => $annoncesVedette,
            'actualites'=> $actualites
        ]);
    }


   public function location(Request $request)
{
    $categories = Category::all();
    $cities = Immobilier::select('ville')->distinct()->pluck('ville');

    $immobiliers = Immobilier::with(['category', 'photoPrincipale', 'photos', 'chambres'])
        ->whereNotIn('statut', ['loue', 'occupe', 'reserve', 'louée', 'occupée', 'réservée']) // exclure ces statuts du bien
        ->whereHas('chambres', function ($query) {
            $query->whereNotIn('statut', ['occupee', 'reservee', 'loue', 'occupée', 'réservée', 'louée', 'indisponible']); // au moins une chambre libre
        })
        ->paginate(10);

    return view('location', compact('categories', 'cities', 'immobiliers'));
}

    public function filter(Request $request)
    {
        $query = Immobilier::with(['category', 'photoPrincipale']);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('city')) {
            $query->where('ville', $request->city);
        }

        if ($request->filled('min_price')) {
            $query->where('prix', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('prix', '<=', $request->max_price);
        }

        $immobiliers = $query->paginate(10);

        return view('layoutsite.partials.resultats', compact('immobiliers'))->render();
    }

    public function indexOffre()
    {
        $offres = Offre::latest()->paginate(6);
        return view('offres', compact('offres'));
    }

    public function show($id)
    {
        $offre = Offre::findOrFail($id);
        return view('offres', compact('offre'));
    }

    public function showImmobilier($id)
    {
        $query = Immobilier::with(['category', 'photos', 'chambres']);
        if (\Illuminate\Support\Facades\Schema::hasColumn('immobiliers', 'uuid')) {
            $query->where('uuid', $id)->orWhere('id', $id);
        } else {
            $query->where('id', $id);
        }
        $immobilier = $query->firstOrFail();

        if (\Illuminate\Support\Facades\Schema::hasColumn('immobiliers', 'uuid') && $id == $immobilier->id && !empty($immobilier->uuid)) {
            return redirect()->route('immobilier.detail', $immobilier->uuid);
        }

        return view('details_immobilier', compact('immobilier'));
    }
    public function actualite(Request $request)
    {
        $evenements = Evenement::where('statut', 'à venir')
            ->where('date_fin', '>=', now())
            ->orderBy('date_debut','asc')
            ->paginate()
            ->appends(request()->query());

        $actualites = Actualite::orderBy('date_publication','desc')
            ->paginate(12)
            ->appends(request()->query());

        if($request->ajax()){
            if($request->section === 'evenements'){
                return view('layoutsite.partials._evenements', compact('evenements'))->render();
            } elseif($request->section === 'actualites'){
                return view('layoutsite.partials._actualites', compact('actualites'))->render();
            }
        }

        return view('evenement', compact('evenements','actualites'));
    }


}
