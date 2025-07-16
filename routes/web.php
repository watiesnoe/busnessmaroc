<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\ImmobiliersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitedashboardController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [ SitedashboardController::class, 'index'])->name('home.index');
Route::get('/location', [SitedashboardController::class, 'location'])->name('location');
Route::post('/location/filter', [SitedashboardController::class, 'filter'])->name('location.filter');
//Route::get('/registre', [RegisteredUserController::class, 'create'])->name('registre.create');
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-dashboard', [AdminHomeController::class, 'index'])->name('home.index');
    Route::resource('/immobiliers',ImmobiliersController::class);
    Route::resource('/chambres',ChambresController::class);
});

require __DIR__.'/auth.php';
