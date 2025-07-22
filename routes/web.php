<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\ImmobiliersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SitedashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\SecteuractiviteController;
use App\Http\Controllers\details_offreController;
use App\Http\Controllers\connexionController;
use App\Http\Controllers\GoogleAuthController;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [ SitedashboardController::class, 'index'])->name('home.index');
Route::get('/location', [SitedashboardController::class, 'location'])->name('location');
Route::post('/location/filter', [SitedashboardController::class, 'filter'])->name('location.filter');

Route::get('/', [SitedashboardController::class, 'index']);
Route::get('/detail/{id}', [SitedashboardController::class, 'showImmobilier'])->name('immobilier.detail');
Route::get('/chambre/{id}/reserver', [ReservationController::class, 'reserver'])->name('reserver.chambre');
// Corrige ça :
Route::post('/reservation/{immobilier}/{chambre}', [ReservationController::class, 'store']);

//Partie google forme
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google.redirect');
//Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
//Route::get('/', [SitedashboardController::class, 'indexOffre']);
Route::get('/offres', [OffreController::class, 'afficher'])->name('offres');
Route::get('/offres-filtre', [OffreController::class, 'filtrer'])->name('offres.filtrer');
//Route::get('/details_offre', [details_offreController::class, 'index'])->name('details_offre');
Route::get('/creation_compte', function () {
    return view('auth.clientRegister');
})->name('register');

Route::get('/details_offre/{id}', [details_offreController::class, 'show'])->name('details_offre.show');
Route::get('/se_connecter', [connexionController::class, 'index'])->name('se_connecter');
//Route::get('/registre', [RegisteredUserController::class, 'create'])->name('registre.create');
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin_dashboard', [AdminHomeController::class, 'index'])->name('home.index');
    Route::resource('/immobiliers', ImmobiliersController::class);
    Route::resource('/chambres', ChambresController::class);
    // route pour afficher les offres côté admin
    Route::resource('/offre', OffreController::class);
    Route::get('/offres/data', [OffreController::class, 'getData'])->name('offre.data');

    Route::resource('/entreprises', EntrepriseController::class);
    Route::resource('/secteurActivites', SecteuractiviteController::class);


    Route::resource('/utilisateurs', UtilisateurController::class);
    // route pour afficher les offres côté site vitrine


    // route pour afficher les offres côté site vitrine


});



require __DIR__ . '/auth.php';
