<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\ComptclientController;
use App\Http\Controllers\ContratLocationController;
use App\Http\Controllers\ImmobiliersController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\PaiementsController;
use App\Http\Controllers\PayPalController;

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
//Route::get('/test-paypal-env', function () {
//    return response()->json([
//        'mode' => env('PAYPAL_MODE'),
//        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
//        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
//    ]);
//});
Route::get('/', [SitedashboardController::class, 'index'])->name('homesite.index');
Route::get('/location', [SitedashboardController::class, 'location'])->name('location');
Route::post('/location/filter', [SitedashboardController::class, 'filter'])->name('location.filter');
Route::get('/detail/{id}', [SitedashboardController::class, 'showImmobilier'])->name('immobilier.detail');
Route::get('/chambre/{id}/reserver', [ReservationController::class, 'reserver'])->name('reserver.chambre');
// Corrige ça :
Route::post('/reservation/{immobilier}/{chambre}', [ReservationController::class, 'store']);
//Route::post('/login/utilisateur', [LoginController::class, 'store'])->name('login');

//Partie google forme
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
//Route::get('/', [SitedashboardController::class, 'indexOffre']);
Route::get('/offres', [OffreController::class, 'afficher'])->name('offres');
Route::get('/offres-filtre', [OffreController::class, 'filtrer'])->name('offres.filtrer');
//Route::get('/details_offre', [details_offreController::class, 'index'])->name('details_offre');
Route::get('/creation_compte', [ComptclientController::class, 'index'])->name('register.client');
// routes/web.php
Route::post('/register/ajax', [ComptclientController::class, 'store'])->name('register.ajax');

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
    // Étape 1 : Choisir le contrat
    Route::get('/reservation/{chambre}/', [ReservationController::class, 'reserver'])->name('reservation.chambre');

    // Étape 2 : Informations client (POST depuis step1)
    //        Route::post('/reservation/step2', [ReservationController::class, 'step2'])->name('reservation.step2');
    //
    //        // Étape 3 : Paiement (POST depuis step2)
    Route::post('/reservation/paiement', [ReservationController::class, 'paiement'])->name('reservation.paiement');

    // Paiement confirmé (POST depuis PayPal ou autre)
    Route::resource('/contrats', ContratLocationController::class);
    Route::resource('/paiements', PaiementsController::class);
    // route pour afficher les offres côté site vitrine

    Route::get('/candidature/{offre}', [CandidatureController::class, 'create'])->name('candidature.form');
//    Route::post('/candidature', [CandidatureController::class, 'store'])->name('candidatures.store');
    Route::resource('/candidature', CandidatureController::class);
    Route::get('/admin/utilisateurs/clients', [UtilisateurController::class, 'clients'])->name('utilisateurs.clients');
    Route::get('/admin/utilisateurs/candidature', [UtilisateurController::class, 'candidats'])->name('utilisateurs.candidats');

//    Route::post('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
//    Route::get('paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
//    Route::get('paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    Route::post('paypal/create-order', [PayPalController::class, 'createOrder'])->name('paypal.createOrder');
    Route::get('paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    Route::get('paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');

    Route::get('/admin/candidats', [UtilisateurController::class, 'candidats'])->name('utilisateurs.candidats');

// Voir CV
    Route::get('/admin/candidats/{id}/cv', [UtilisateurController::class, 'showCv'])->name('candidats.cv');

// Voir lettre de motivation
    Route::get('/admin/candidats/{id}/lettre', [UtilisateurController::class, 'showLettre'])->name('candidats.lettre');
});



require __DIR__ . '/auth.php';
