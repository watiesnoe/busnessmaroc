<?php

namespace App\Http\Controllers;

use App\Models\Immobilier;
use Illuminate\Http\Request;

class SitedashboardController extends Controller
{
    //
    public function index()
    {
        // Logic to show the site dashboard
        $immobiliers = Immobilier::all();
        return view('dashboard', ['immobiliers' => $immobiliers]);
    }
}
