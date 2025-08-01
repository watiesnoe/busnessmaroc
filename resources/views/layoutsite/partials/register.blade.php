<section class="pt-100 login-register">
    <div class="container">
        <div class="row login-register-cover">
            <div class="col-lg-4 col-md-12 col-sm-12 mx-auto">
                <div class="text-center">
                    <h3 class="mt-5 mb-5 text-brand-1">Creation de compte</h3>
                    <button class="btn social-login hover-up mb-20"> <img src="{{ asset('asset/imgs/template/icons/icon-google.svg') }}" alt="Google login"><strong>Sign up with Google</strong></button>
                    <div class="divider-text-center"><span>Or continue with</span></div>
                </div>
                <form method="POST" id="createform"  data-action="{{ route('register.ajax') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Nom d'utilisateur</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Téléphone</label>
                            <input type="text" name="telephone" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Adresse</label>
                            <input type="text" name="adresse" class="form-control" required>
                        </div>

                        <div class="col-md-12 mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Créer un compte</button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="img-1 d-none d-lg-block">
                <img class="shape-1" src="{{ asset('asset/imgs/page/login-register/img-4.svg') }}" alt="JobBox">
            </div>
            <div class="img-2">
                <img src="{{ asset('asset/imgs/page/login-register/img-3.svg') }}" alt="JobBox">
            </div>
        </div>
    </div>
</section>
