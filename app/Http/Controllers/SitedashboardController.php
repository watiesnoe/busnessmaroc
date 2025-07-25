<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Immobilier;
use App\Models\Offre;
use Illuminate\Http\Request;

class SitedashboardController extends Controller
{
    public function index()
    {
        $immobiliers = Immobilier::with(['category', 'photoPrincipale', 'chambres'])->get();

        $annoncesVedette = Immobilier::where('en_vedette', true)
            ->with('photoPrincipale')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'immobiliers' => $immobiliers,
            'annoncesVedette' => $annoncesVedette
        ]);
    }

    public function location(Request $request)
    {
        $categories = Category::all();
        $cities = Immobilier::select('ville')->distinct()->pluck('ville');

        $immobiliers = Immobilier::with(['category', 'photoPrincipale'])->paginate(10);

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
        $immobilier = Immobilier::with(['category', 'photos', 'chambres'])->findOrFail($id);
        return view('details_immobilier', compact('immobilier'));
    }
}
