<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\ComptclientController;
use App\Http\Controllers\ContratLocationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ImmobiliersController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\PaiementsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SitedashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UniversiteController;
use App\Services\AuthorizeNetGateway;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\SecteuractiviteController;
use App\Http\Controllers\details_offreController;
use App\Http\Controllers\connexionController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\CommandePouletController;

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
//Route::get('/test-auth', function() {
//    $gateway = new \App\Services\AuthorizeNetGateway();
//
//    return [
//        'apiLoginId' => config('services.authorize.api_login_id'),
//        'transactionKey' => config('services.authorize.transaction_key'),
//        'sandbox' => config('services.authorize.sandbox'),
//    ];
//});

//Route::get('/test-payment', function () {
//    $gateway = new AuthorizeNetGateway();
//
//    $response = $gateway->charge([
//        'amount' => 1.00,
//        'currency' => 'USD',
//        'card_number' => '4111111111111111',
//        'expiry_month' => '12',
//        'expiry_year' => '2026',
//        'cvv' => '123',
//    ]);
//
//    if($response->isSuccessful()){
//        return "Success: " . $response->getTransactionReference();
//    } else {
//        return "Error: " . $response->getMessage();
//    }
//});



Route::get('busnessmaroc/public', function () {
    return redirect('/');
});
Route::any('busnessmaroc/public/{any}', function ($any) {
    return redirect('/' . $any);
})->where('any', '.*');

Route::get('/', [SitedashboardController::class, 'index'])->name('homesite.index');

// === Élevage Poulets de Chair ===
Route::get('/poulets-de-chair', [CommandePouletController::class, 'index'])->name('poulets.index');
Route::post('/poulets-de-chair/commander', [CommandePouletController::class, 'store'])->name('poulets.store');
Route::get('/actualite', [SitedashboardController::class, 'actualite']);
Route::get('/location', [SitedashboardController::class, 'location'])->name('location');
Route::post('/location/filter', [SitedashboardController::class, 'filter'])->name('location.filter');
Route::get('/detail/{id}', [SitedashboardController::class, 'showImmobilier'])->name('immobilier.detail');
Route::get('/chambre/{id}/reserver', [ReservationController::class, 'reserver'])->name('reserver.chambre');
// Corrige ça :
Route::post('/reservation/{immobilier}/{chambre}', [ReservationController::class, 'store']);
Route::post('/login/utilisateur', [LoginController::class, 'store'])->name('login.post');
Route::post('/se_connecter', [LoginController::class, 'store']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
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
Route::get('/universite', [UniversiteController::class, 'index']);
Route::get('/admin/universite', [UniversiteController::class, 'index_admin'])->name('adminuniversite.index_admin');
Route::get('/universite/{id}/daille', [UniversiteController::class, 'deitalle'])->name('universite.detaille');
Route::get('/details_offre/{id}', [details_offreController::class, 'show'])->name('details_offre.show');
Route::get('/se_connecter', [connexionController::class, 'index'])->name('login');
Route::get('/login', [connexionController::class, 'index']);
Route::get('/connexion', [connexionController::class, 'index'])->name('se_connecter');
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
    Route::get('/admin/offres/{offre}/candidats', [UtilisateurController::class, 'candidats'])->name('admin.offres.candidats');
    Route::post('candidature/{candidature}/status', [UtilisateurController::class, 'updateStatus'])->name('candidature.updateStatus');
    // Pour lister les candidats d’une offre avec filtrage
    Route::get('/candidature/postuler/{offre}', [UtilisateurController::class, 'candidats'])
        ->name('candidature.candidats');

    Route::post('/candidatures/{id}/alerte', [CandidatureController::class, 'envoyerAlerte'])->name('candidature.alerte');

    Route::get('/admin/utilisateurs/profile/{id}', [UtilisateurController::class, 'profile'])->name('utilisateurs.profile');

    //    Route::post('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
    //    Route::get('paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
    //    Route::get('paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    //    Route::post('paypal/create-order', [PayPalController::class, 'createOrder'])->name('paypal.createOrder');
    //    Route::get('paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    //    Route::get('paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');


    Route::get('/paypal/pay', [PayPalController::class, 'pay'])->name('paypal.pay');
    Route::post('/paypal/capture', [PayPalController::class, 'capture'])->name('paypal.capture');

    Route::get('/admin/candidats', [UtilisateurController::class, 'candidatsliste'])->name('utilisateurs.candidats');

    // Voir CV
    Route::get('/admin/candidats/{id}/cv', [UtilisateurController::class, 'showCv'])->name('candidats.cv');

    // Voir lettre de motivation
    Route::get('/admin/candidats/{id}/lettre', [UtilisateurController::class, 'showLettre'])->name('candidats.lettre');

    //    universite
    Route::resource('/universites', UniversiteController::class);
    Route::resource('/evenements', EvenementController::class);
    Route::resource('/adminactualite', ActualiteController::class);
    Route::get('/evenements/{evenement}/reservations', [EvenementController::class, 'parEvenement'])
        ->name('evenements.clients');

    Route::post('/tickets/{ticket}/confirmer', [TicketController::class, 'confirmer'])->name('tickets.confirmer');
    Route::get('/tickets/{ticket}/print', [TicketController::class, 'print'])->name('tickets.print');

    Route::resource('entreprises', EntrepriseController::class);
    Route::post('/utilisateurs/{user}/toggle', [UtilisateurController::class, 'toggleStatus'])->name('utilisateurs.toggle');

    // ✅ Route Ajax
    //    Route::get('/entreprises/data', [EntrepriseController::class, 'getData'])->name('entreprises.data');


    Route::get('/payment', [PaymentController::class, 'showForm'])->name('payment.form');
    Route::post('/payment', [PaymentController::class, 'charge'])->name('payment.charge');
});





Route::get('/reseed-site', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'SiteDataSeeder', '--force' => true]);
        return response("Seed OK:\n" . \Illuminate\Support\Facades\Artisan::output(), 200)->header('Content-Type', 'text/plain');
    } catch (\Exception $e) {
        return response("Seed Error: " . $e->getMessage(), 500)->header('Content-Type', 'text/plain');
    }
});

Route::get('/apply-uuid', function() {
    ob_start();
    include base_path('apply_uuid_trait.php');
    $output = ob_get_clean();
    return response($output)->header('Content-Type', 'text/plain');
});

Route::get('/run-migrations', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return response("Migrations run successfully:\n" . \Illuminate\Support\Facades\Artisan::output(), 200)
            ->header('Content-Type', 'text/plain');
    } catch (\Exception $e) {
        return response("Error running migrations: " . $e->getMessage(), 500)
            ->header('Content-Type', 'text/plain');
    }
});

Route::get('/setup-poulets', function() {
    $out = [];
    // Copy hero image
    $src  = '/home/snt/.gemini/antigravity/brain/091fe5d1-3ead-400b-9e50-6e2d64409236/poulet_hero_1783383024275.png';
    $dest = public_path('asset/imgs/poulet_hero.png');
    if (file_exists($src)) {
        @copy($src, $dest);
        $out[] = file_exists($dest) ? "✅ Image copiée vers $dest" : "❌ Échec de la copie de l'image";
    } else {
        $out[] = "⚠️  Image source introuvable : $src";
    }
    // Run migrations
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $out[] = "✅ Migrations:\n" . \Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        $out[] = "❌ Migration error: " . $e->getMessage();
    }
    return response(implode("\n", $out))->header('Content-Type', 'text/plain');
});

Route::get('/view-laravel-log', function() {
    $log = storage_path('logs/laravel.log');
    if (!file_exists($log)) {
        return "Log file does not exist";
    }
    $lines = file($log);
    $last_lines = array_slice($lines, -100);
    return response(implode("", $last_lines))->header('Content-Type', 'text/plain');
});

Route::get('/test-link', function() {
    return response(shell_exec('ls -la ' . public_path()))->header('Content-Type', 'text/plain');
});

Route::get('/check-base-path', function() {
    $path = base_path();
    return [
        'path' => $path,
        'perms' => sprintf('%o', fileperms($path)),
        'owner' => fileowner($path),
        'group' => filegroup($path),
    ];
});

Route::get('/check-tree', function() {
    $paths = [
        base_path('storage'),
        base_path('storage/app'),
        base_path('storage/app/public'),
        base_path('storage/app/public/photos'),
        storage_path('framework/views'),
    ];
    $out = [];
    foreach ($paths as $path) {
        $out[$path] = [
            'exists' => file_exists($path),
            'perms' => sprintf('%o', fileperms($path)),
            'owner' => fileowner($path),
            'group' => filegroup($path),
        ];
    }
    return $out;
});

Route::get('/debug-photo', function() {
    $file = storage_path('app/public/photos/sh3DpqvMu1TVC9musW3l.jpg');
    if (!file_exists($file)) {
        return "File does not exist: $file";
    }
    clearstatcache();
    $perms = fileperms($file);
    return [
        'file' => $file,
        'readable_by_php' => is_readable($file),
        'owner' => fileowner($file),
        'group' => filegroup($file),
        'perms' => sprintf('%o', $perms),
        'whoami_terminal' => trim(shell_exec('whoami')),
        'whoami_web' => get_current_user(),
        'parent_perms' => sprintf('%o', fileperms(dirname($file)))
    ];
});

Route::get('/check-symlink', function() {
    clearstatcache();
    $link = public_path('storage');
    $exists = file_exists($link);
    $isLink = is_link($link);
    $target = $isLink ? readlink($link) : 'not a link';
    $targetExists = file_exists($isLink ? (dirname($link) . '/' . $target) : $link);
    return [
        'link_path' => $link,
        'exists' => $exists,
        'is_link' => $isLink,
        'target' => $target,
        'target_exists' => $targetExists,
        'real_path' => realpath($link)
    ];
});

Route::get('/fix-storage-link', function() {
    clearstatcache();
    $link = public_path('storage');
    $out = [];
    if (file_exists($link)) {
        if (!is_link($link)) {
            $backup = public_path('storage_old_' . time());
            if (rename($link, $backup)) {
                $out[] = "✅ Renamed physical public/storage directory to " . basename($backup);
            } else {
                return "❌ Failed to rename physical public/storage directory";
            }
        } else {
            unlink($link);
            $out[] = "✅ Removed old symlink public/storage";
        }
    }
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $out[] = "✅ Created storage symlink:\n" . \Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        $out[] = "❌ storage:link error: " . $e->getMessage();
    }
    return response(implode("\n", $out))->header('Content-Type', 'text/plain');
});

Route::get('/fix-perms', function() {
    $path = storage_path();
    if (!file_exists($path)) {
        return "Storage path does not exist";
    }
    @chmod($path, 0777);
    
    // Fix FontAwesome icons 404 by copying webfonts
    $src = public_path('admin/fonts/fontawesome');
    $dest = public_path('webfonts');
    if (!file_exists($dest)) {
        @mkdir($dest, 0775, true);
    }
    if (file_exists($src) && is_dir($src)) {
        $files = scandir($src);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                @copy("$src/$file", "$dest/$file");
            }
        }
    }
    
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    $count = 0;
    foreach ($iterator as $item) {
        $pathname = $item->getPathname();
        if ($item->isDir()) {
            if (@chmod($pathname, 0777)) {
                $count++;
            }
        } else {
            if (@chmod($pathname, 0666)) {
                $count++;
            }
        }
    }
    return "Permissions fixed recursively for $count items! FontAwesome fonts copied.";
});

require __DIR__ . '/auth.php';
