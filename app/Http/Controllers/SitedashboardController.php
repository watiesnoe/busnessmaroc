<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Immobilier;
use Illuminate\Http\Request;

class SitedashboardController extends Controller
{
    //
    public function index()
    {
        // Logic to show the site dashboard
       $immobiliers = Immobilier::with(relations: ['category','photos', 'chambres'])->get();
        $annoncesVedette = Immobilier::where('en_vedette', true)
            ->with('photos')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', ['immobiliers' => $immobiliers,'annoncesVedette' => $annoncesVedette]);
    }
 public function location(Request $request)
{
    $categories = Category::all();
    $cities = Immobilier::select('ville')->distinct()->pluck('ville');

    $immobiliers = Immobilier::with(['category', 'photos'])->paginate(10);

    return view('location', compact('categories', 'cities', 'immobiliers'));
}

public function filter(Request $request)
{
    $query = Immobilier::with(['category', 'photos']);

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


}
