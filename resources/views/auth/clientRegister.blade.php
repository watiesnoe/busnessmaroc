@extends('layoutsite.site')

@section('titre', 'Création de compte — Business Maroc')

@push('styles')
<style>
    .register-container {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f4f7f6 0%, #e9ecef 100%);
        padding: 4rem 1rem;
    }
    .register-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05), 0 5px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.03);
        overflow: hidden;
        width: 100%;
        max-width: 800px;
    }
    .register-header {
        background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%);
        padding: 2.5rem 2rem;
        color: #ffffff;
        text-align: center;
    }
    .register-header h3 {
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 0.5rem;
    }
    .register-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    .register-body {
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
        margin-bottom: 1.25rem;
    }
    .form-group-custom label {
        font-weight: 700;
        font-size: 0.82rem;
        color: #0d1b2a;
        margin-bottom: 0.4rem;
        display: block;
    }
    .form-icon-addon {
        position: absolute;
        left: 15px;
        bottom: 14px;
        color: #adb5bd;
        font-size: 1.1rem;
        pointer-events: none;
    }
    .form-control-custom {
        padding-left: 45px;
        height: 48px;
        border-radius: 12px;
        border: 1.5px solid #e9ecef;
        font-size: 0.92rem;
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
    .btn-submit-register {
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
    .btn-submit-register:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(213, 1, 0, 0.35);
        color: #fff;
    }
    .link-login {
        color: #d50100;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s;
    }
    .link-login:hover {
        color: #b30000;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<main class="register-container">
    <div class="register-card">
        {{-- Header --}}
        <div class="register-header">
            <h3>Création de compte</h3>
            <p class="mb-0">Inscrivez-vous pour accéder à nos offres de logements, emplois et services</p>
        </div>

        {{-- Body --}}
        <div class="register-body">
            {{-- Google Auth Button --}}
            <div class="d-grid">
                <a href="{{ route('auth.google.redirect') }}" class="btn-google-auth">
                    <img src="{{ asset('asset/imgs/template/icons/icon-google.svg') }}" alt="Google" style="width:20px; height:20px;">
                    <span>S'inscrire avec Google</span>
                </a>
            </div>

            {{-- Separator --}}
            <div class="separator-text">
                <span>Ou continuer avec le formulaire</span>
            </div>

            {{-- Form --}}
            <form method="POST" id="createform" data-action="{{ route('register.ajax') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="nom">Nom</label>
                            <div class="position-relative">
                                <i class="bi bi-person form-icon-addon"></i>
                                <input type="text" name="nom" id="nom" class="form-control-custom" placeholder="Ex: Benjelloun" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="prenom">Prénom</label>
                            <div class="position-relative">
                                <i class="bi bi-person form-icon-addon"></i>
                                <input type="text" name="prenom" id="prenom" class="form-control-custom" placeholder="Ex: Youssef" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="name">Nom d'utilisateur</label>
                            <div class="position-relative">
                                <i class="bi bi-person-badge form-icon-addon"></i>
                                <input type="text" name="name" id="name" class="form-control-custom" placeholder="Ex: youssef_bj" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="email">Adresse e-mail</label>
                            <div class="position-relative">
                                <i class="bi bi-envelope form-icon-addon"></i>
                                <input type="email" name="email" id="email" class="form-control-custom" placeholder="Ex: youssef@mail.com" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="password">Mot de passe</label>
                            <div class="position-relative">
                                <i class="bi bi-lock form-icon-addon"></i>
                                <input type="password" name="password" id="password" class="form-control-custom" placeholder="••••••••••••" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="password_confirmation">Confirmation du mot de passe</label>
                            <div class="position-relative">
                                <i class="bi bi-lock-fill form-icon-addon"></i>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control-custom" placeholder="••••••••••••" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="telephone">Téléphone</label>
                            <div class="position-relative">
                                <i class="bi bi-telephone form-icon-addon"></i>
                                <input type="text" name="telephone" id="telephone" class="form-control-custom" placeholder="Ex: +212 600 000 000" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group-custom">
                            <label for="adresse">Adresse</label>
                            <div class="position-relative">
                                <i class="bi bi-geo-alt form-icon-addon"></i>
                                <input type="text" name="adresse" id="adresse" class="form-control-custom" placeholder="Ex: Boulevard Anfa, Casablanca" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-submit-register py-2">
                                <i class="bi bi-person-plus me-1"></i> Créer un compte
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="text-muted text-center small mt-4">
                Vous avez déjà un compte ? <a href="{{ route('se_connecter') }}" class="link-login">Se connecter</a>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#createform').on('submit', function (e) {
                e.preventDefault();

                let form = $(this);
                let actionUrl = form.data('action');

                $.ajax({
                    type: 'POST',
                    url: actionUrl,
                    data: form.serialize(),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message
                        }).then(() => {
                            window.location.href = "{{ route('se_connecter') }}";
                        });
                        form.trigger("reset");
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let messages = '';
                            $.each(errors, function (key, value) {
                                messages += value[0] + '\n';
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de validation',
                                text: messages
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: "Une erreur est survenue."
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
