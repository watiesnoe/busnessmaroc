<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    // Redirige vers la page de connexion Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Gère le callback après authentification Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(12)),
                    'role' => 'client',
                ]);
            }

            Auth::login($user);

            return redirect('/')->with('success', 'Connexion réussie via Google');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['google' => 'Erreur lors de la connexion Google.']);
        }
    }
}
