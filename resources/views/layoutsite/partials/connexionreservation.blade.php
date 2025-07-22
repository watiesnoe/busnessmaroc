<div class="container mt-5">
    <h2>Réservation de la chambre : {{ $chambre->type }}</h2>

    <h3>Avez-vous déjà un compte ?</h3>

    <div class="mb-4">
        <button class="btn btn-primary" id="btn-login">Oui, me connecter</button>
        <button class="btn btn-outline-secondary" id="btn-register">Non, créer un compte</button>
    </div>

    {{-- Connexion avec Google --}}
    <a href="{{ route('google.login') }}" class="btn btn-danger mb-3">
        Se connecter avec Google
    </a>

    {{-- Formulaire de login --}}
    <div id="login-form" style="display:none;">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Se connecter</button>
        </form>
    </div>

    {{-- Formulaire d'inscription --}}
    <div id="register-form" style="display:none;">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="name" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Créer un compte</button>
        </form>
    </div>

</div>
