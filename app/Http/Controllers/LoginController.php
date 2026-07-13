<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        // Authentification de l'utilisateur
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (session()->has('redirect_after_login')) {
                $redirectUrl = session('redirect_after_login');
                session()->forget('redirect_after_login'); // Nettoyer la session après redirection
                return redirect($redirectUrl);
            }

            // Redirection selon rôle
            if (Auth::user()->role === 'admin'|| Auth::user()->role === 'superadmin') {
                return redirect()->intended(route('home.index'));
            } else {
                return redirect()->intended(route('homesite.index'));
            }
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
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
