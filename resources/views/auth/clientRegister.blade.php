@extends('layoutsite.site')

@section('content')
{{--    @include('layoutsite.partials.register')--}}
<section class="py-5" style="background: #f5f7fa;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <!-- Image gauche -->
            <div class="col-lg-3 d-none d-lg-block text-end">
                <img src="{{ asset('asset/imgs/page/login-register/img-4.svg') }}" class="img-fluid" alt="Image gauche">
            </div>

            <!-- Formulaire centré dans une carte -->
            <div class="col-lg-6 col-md-10">
                <div class="card shadow-lg border-0 rounded-4 p-4">
                    <div class="text-center mb-4">
                        <h3 class="text-primary">Création de compte</h3>
                        <button class="btn btn-outline-secondary w-100 mb-3">
                            <img src="{{ asset('asset/imgs/template/icons/icon-google.svg') }}" class="me-2" alt="Google">
                            S'inscrire avec Google
                        </button>
                        <div class="text-muted">Ou continuez avec le formulaire</div>
                    </div>
                    <form method="POST" id="createform" data-action="{{ route('register.ajax') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Nom d'utilisateur" required>
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="adresse" class="form-control" placeholder="Adresse" required>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-100">Créer un compte</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Image droite -->
            <div class="col-lg-3 d-none d-lg-block text-start">
                <img src="{{ asset('asset/imgs/page/login-register/img-3.svg') }}" class="img-fluid" alt="Image droite">
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#createform').on('submit', function (e) {
                e.preventDefault(); // Empêche l'envoi normal du formulaire

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
                        });
                        // Tu peux aussi rediriger ou vider le formulaire ici :
                        // window.location.href = '/login';
                        form.trigger("reset");
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let messages = '';
                            $.each(errors, function (key, value) {
                                messages += value[0] + '\n';
                            });
                            alert(messages);
                        } else {
                            alert("Une erreur est survenue.");
                        }
                    }
                });
            });
        });
    </script>

@endsection
