<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\ImmobiliersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitedashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\SecteuractiviteController;
use App\Http\Controllers\details_offreController;
use App\Http\Controllers\connexionController;

//Route::get('/', function () {
//    return view('welcome');
//});
<<<<<<< HEAD
Route::get('/', [ SitedashboardController::class, 'index'])->name('home.index');
Route::get('/location', [SitedashboardController::class, 'location'])->name('location');
Route::post('/location/filter', [SitedashboardController::class, 'filter'])->name('location.filter');
=======
Route::get('/', [SitedashboardController::class, 'index']);
>>>>>>> 1473e24 (mis a jours du partie front-end)
//Route::get('/registre', [RegisteredUserController::class, 'create'])->name('registre.create');
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-dashboard', [AdminHomeController::class, 'index'])->name('home.index');
    Route::resource('/immobiliers', ImmobiliersController::class);
    Route::resource('/chambres', ChambresController::class);
    // route pour afficher les offres côté admin
    Route::resource('/offre', OffreController::class);
    Route::resource('/entreprises', EntrepriseController::class);
    Route::resource('/secteurActivites', SecteuractiviteController::class);


    Route::resource('/utilisateurs', UtilisateurController::class);
    // route pour afficher les offres côté site vitrine


    // route pour afficher les offres côté site vitrine
    Route::get('/offres', [OffreController::class, 'afficher'])->name('offres');
    Route::get('/details_offre', [details_offreController::class, 'index'])->name('details_offre');
    Route::get('/se_connecter', [connexionController::class, 'index'])->name('se_connecter');

});



require __DIR__ . '/auth.php';
