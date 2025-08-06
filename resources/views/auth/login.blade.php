@extends('layoutsite.site')
@section('content')
<section class="bg-light min-vh-100 d-flex align-items-center justify-content-center position-relative">
    <div class="container">
        <div class="row justify-content-center">
            {{-- <img src="{{asset('admin/logo.png')}}" alt="hjfjf" width="50" height="100"> --}}
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
                    <h3 class="text-center mb-4 text-primary">Connexion</h3>

                    <!-- Formulaire de connexion -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email *</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="your@email.com">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe *</label>
                            <input type="password" id="password" name="password" class="form-control" required placeholder="********">
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">Mot de passe oublié ?</a>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary rounded-pill">Se connecter</button>
                        </div>

                        <div class="text-center">
                            <span class="text-muted">Pas encore de compte ?</span>
                            <a href="{{ route('register.client') }}" class="text-primary text-decoration-none">Créer un compte</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Images décoratives -->
    <div class="position-absolute top-0 start-0 d-none d-lg-block" style="z-index: 0;">
        <img src="{{ asset('asset/imgs/page/login-register/img-4.svg') }}" alt="Décor gauche" style="max-width: 300px;">
    </div>
    <div class="position-absolute bottom-0 end-0" style="z-index: 0;">
        <img src="{{ asset('asset/imgs/page/login-register/img-3.svg') }}" alt="Décor droite" style="max-width: 250px;">
    </div>
</section>

@endsection
