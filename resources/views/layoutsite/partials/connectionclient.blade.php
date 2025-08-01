<section class="pt-10 login-register">
    <div class="container">
        <div class="row login-register-cover">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                <div class="text-center">
                    <p class="font-sm text-brand-2">Welcome back!</p>
                    <h2 class="mt-10 mb-5 text-brand-1">Member Login</h2>
                    <p class="font-sm text-muted mb-30">Access all features. No credit card required.</p>

                    <!-- Bouton de connexion Google -->
                    <a href="{{ route('auth.google.redirect') }}" class="btn social-login hover-up mb-20">
                        <img src="{{ asset('asset/imgs/template/icons/icon-google.svg') }}" alt="Google login">
                        <strong>Sign in with Google</strong>
                    </a>

                    <div class="divider-text-center"><span>Or continue with</span></div>
                </div>

                <!-- Formulaire de connexion -->
                <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email address *</label>
                        <input class="form-control" id="email" type="email" name="email" required placeholder="your@email.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password *</label>
                        <input class="form-control" id="password" type="password" name="password" required placeholder="********">
                    </div>

                    <div class="login_footer form-group d-flex justify-content-between">
                        <label class="cb-container">
                            <input type="checkbox" name="remember">
                            <span class="text-small">Remember me</span>
                            <span class="checkmark"></span>
                        </label>
                        <a class="text-muted" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-brand-1 hover-up w-100" type="submit">Login</button>
                    </div>

                    <div class="text-muted text-center">
                        Don't have an account?
                        <a href="{{ route('register.client') }}">Sign up</a>
                    </div>
                </form>
            </div>

            <!-- Images -->
            <div class="img-1 d-none d-lg-block">
                <img class="shape-1" src="{{ asset('asset/imgs/page/login-register/img-4.svg') }}" alt="JobBox">
            </div>
            <div class="img-2">
                <img src="{{ asset('asset/imgs/page/login-register/img-3.svg') }}" alt="JobBox">
            </div>
        </div>
    </div>
</section>

