<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Chambre;
use App\Models\ContratLocation;
use App\Models\Immobilier;
use App\Models\Offre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')) {
            $totalImmobiliers = Immobilier::count();
            $immobiliersDisponibles = Immobilier::where('statut', 'disponible')->count();
            $immobiliersOccupes = Immobilier::whereIn('statut', ['reserve', 'loue'])->count();

            $chambresDisponibles = Chambre::where('statut', 'disponible')->count();
            $contratsActifs = ContratLocation::where('statut', 'actif')->count();
            $totalCandidatures = Candidature::count();
            $totalOffres = Offre::count();

            // ✅ Clients non candidats
            $clientsNonCandidats = User::where('role', 'client')
                ->whereDoesntHave('candidatures')
                ->count();

            // Graphique des offres par mois
            $offresParMois = Offre::selectRaw('MONTH(date_publication) as mois, COUNT(*) as total')
                ->whereYear('date_publication', Carbon::now()->year)
                ->groupBy('mois')
                ->orderBy('mois')
                ->pluck('total', 'mois');

            $labels = [];
            $data = [];

            for ($i = 1; $i <= 12; $i++) {
                $labels[] = Carbon::create()->month($i)->translatedFormat('F');
                $data[] = $offresParMois->get($i, 0);
            }

            return view('admindash', compact(
                'totalImmobiliers',
                'immobiliersDisponibles',
                'immobiliersOccupes',
                'chambresDisponibles',
                'contratsActifs',
                'totalCandidatures',
                'totalOffres',
                'clientsNonCandidats', // ✅ passer à la vue
                'labels',
                'data'
            ));
        } else {
            return redirect()->route('homesite.index');
        }
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
        //
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
