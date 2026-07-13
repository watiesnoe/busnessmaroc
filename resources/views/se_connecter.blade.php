@extends('layoutsite.site')

@section('titre', 'Connexion — Business Maroc')

@push('styles')
<style>
    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f4f7f6 0%, #e9ecef 100%);
        padding: 4rem 1rem;
    }
    .login-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05), 0 5px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.03);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .login-header {
        background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
        padding: 3rem 2rem;
        color: #ffffff;
        text-align: center;
    }
    .login-header h3 {
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 0.5rem;
    }
    .login-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    .login-body {
        padding: 3rem 2.5rem;
    }
    .btn-google-auth {
        background: #ffffff;
        border: 1.5px solid #e9ecef;
        border-radius: 12px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        color: #495057;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .btn-google-auth:hover {
        background: #f8f9fa;
        border-color: #ced4da;
        color: #212529;
        transform: translateY(-1px);
    }
    .separator-text {
        position: relative;
        text-align: center;
        margin: 2rem 0;
    }
    .separator-text::before {
        content: "";
        position: absolute;
        top: 50%; left: 0; right: 0;
        height: 1px;
        background: #e9ecef;
        z-index: 1;
    }
    .separator-text span {
        position: relative;
        background: #ffffff;
        padding: 0 15px;
        color: #adb5bd;
        font-size: 0.85rem;
        font-weight: 600;
        z-index: 2;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .form-group-custom {
        position: relative;
        margin-bottom: 1.5rem;
    }
    .form-group-custom label {
        font-weight: 700;
        font-size: 0.85rem;
        color: #0d1b2a;
        margin-bottom: 0.5rem;
        display: block;
    }
    .form-icon-addon {
        position: absolute;
        left: 15px;
        bottom: 15px;
        color: #adb5bd;
        font-size: 1.1rem;
        pointer-events: none;
    }
    .form-control-custom {
        padding-left: 45px;
        height: 50px;
        border-radius: 12px;
        border: 1.5px solid #e9ecef;
        font-size: 0.95rem;
        font-weight: 500;
        color: #0d1b2a;
        transition: all 0.2s ease;
        width: 100%;
        background-color: #fdfdfd;
    }
    .form-control-custom:focus {
        border-color: #d50100;
        box-shadow: 0 0 0 4px rgba(213, 1, 0, 0.1);
        background-color: #ffffff;
        outline: none;
    }
    .btn-submit-login {
        background: linear-gradient(135deg, #d50100 0%, #b30000 100%);
        border: none;
        color: #fff;
        height: 50px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.2s ease;
        box-shadow: 0 5px 15px rgba(213, 1, 0, 0.2);
    }
    .btn-submit-login:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(213, 1, 0, 0.35);
        color: #fff;
    }
    .link-register {
        color: #d50100;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s;
    }
    .link-register:hover {
        color: #b30000;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<main class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-10">
                <div class="login-card">
                    {{-- Header --}}
                    <div class="login-header">
                        <h3>Bienvenue</h3>
                        <p>Connectez-vous pour gérer vos réservations et candidatures</p>
                    </div>

                    {{-- Body --}}
                    <div class="login-body">
                        {{-- Google Auth Button --}}
                        <div class="d-grid">
                            <a href="{{ route('auth.google.redirect') }}" class="btn-google-auth">
                                <img src="{{ asset('asset/imgs/template/icons/icon-google.svg') }}" alt="Google" style="width:20px; height:20px;">
                                <span>Se connecter avec Google</span>
                            </a>
                        </div>

                        {{-- Separator --}}
                        <div class="separator-text">
                            <span>Ou continuer avec</span>
                        </div>

                        {{-- Form --}}
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            @if ($errors->any())
                                <div class="alert alert-danger py-2 mb-3 small border-0 rounded-3">
                                    <ul class="mb-0 list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li><i class="bi bi-exclamation-circle-fill me-1"></i> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group-custom">
                                <label for="email">Adresse e-mail</label>
                                <div class="position-relative">
                                    <i class="bi bi-envelope form-icon-addon"></i>
                                    <input class="form-control-custom @error('email') is-invalid @enderror" id="email" type="email" required name="email" value="{{ old('email') }}" placeholder="Ex: contact@exemple.com">
                                </div>
                            </div>

                            <div class="form-group-custom">
                                <label for="password">Mot de passe</label>
                                <div class="position-relative">
                                    <i class="bi bi-lock form-icon-addon"></i>
                                    <input class="form-control-custom" id="password" type="password" required name="password" placeholder="••••••••••••">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" style="cursor: pointer;">
                                    <label class="form-check-label text-muted small" for="remember" style="cursor: pointer; user-select: none;">
                                        Se souvenir de moi
                                    </label>
                                </div>
                                <a class="text-muted small text-decoration-none" href="#">Mot de passe oublié ?</a>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-submit-login w-100" type="submit">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Se connecter
                                </button>
                            </div>

                            <div class="text-muted text-center small mt-4">
                                Vous n'avez pas encore de compte ? <a href="{{ route('register.client') }}" class="link-register">S'inscrire</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
