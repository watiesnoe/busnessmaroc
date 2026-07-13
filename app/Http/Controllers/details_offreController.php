<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class details_offreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         return view('details_offre');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $query = Offre::query();
        if (\Illuminate\Support\Facades\Schema::hasColumn('offres', 'uuid')) {
            $query->where('uuid', $id)->orWhere('id', $id);
        } else {
            $query->where('id', $id);
        }
        $offre = $query->firstOrFail();

        if (\Illuminate\Support\Facades\Schema::hasColumn('offres', 'uuid') && $id == $offre->id && !empty($offre->uuid)) {
            return redirect()->route('details_offre.show', $offre->uuid);
        }

        return view('details_offre', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
