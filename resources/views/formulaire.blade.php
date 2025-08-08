@extends('layoutsite.site')

@section('content')
   <!-- SECTION HERO AVEC HAUTEUR AJUSTÉE -->
    <section class="text-white d-flex align-items-center"
        style="background-image: url('{{ asset('asset/imgs/location.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container text-center">
            <div class="container text-center">
                <h3 class="fw-bold mb-3" style="font-size: 2.8rem; color: #f5f5f5;">
                    <span class="text-primary">Trouvez</span> le logement idéal <br class="d-none d-md-block"> pour vous dès
                    aujourd’hui
                </h3>
                <p class="lead mx-auto" style="max-width: 750px; color: #f0f0f0; text-shadow: 1px 1px 4px rgba(0,0,0,0.8);">
                    Explorez une large sélection d’appartements, maisons et studios, soigneusement choisis pour répondre à
                    toutes vos envies.
                </p>
            </div>


        </div>

    </section>
    {{-- section principale --}}

    @if (Auth::check() && Auth::user()->role === 'client')
        @include('layoutsite.partials.connection')
    @endif
    {{-- @else
        @include('layoutsite.partials.connectionclient')
    @endif --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            function calculerPrix() {
                let type = $('select[name="type_contrat"]').val();
                let debut = new Date($('input[name="date_debut"]').val());
                let fin = new Date($('input[name="date_fin"]').val());

                if (!type || isNaN(debut) || isNaN(fin) || debut >= fin) {
                    $('#prix_calcule').hide();
                    $('#prix_total').val('');
                    return;
                }

                let jours = (fin - debut) / (1000 * 60 * 60 * 24);

                // Prix récupérés depuis Laravel via Blade
                let prixParJour = {{ $chambre->prix_jour }};
                let prixParMois = {{ $chambre->prix_mois }};
                let prixParAnnee = {{ $chambre->prix_annee }};

                let total = 0;
                if (type === 'jour') total = prixParJour * jours;
                else if (type === 'mois') total = prixParMois * Math.ceil(jours / 30);
                else if (type === 'annee') total = prixParAnnee * Math.ceil(jours / 365);

                if (total > 0) {
                    $('#prix_total').val(total.toFixed(0));
                    $('#prix_calcule').show().text('Prix estimé : ' + total.toLocaleString() + ' FCFA');
                } else {
                    $('#prix_calcule').hide();
                    $('#prix_total').val('');
                }
            }

            // Calculer à chaque changement sur les champs concernés
            $('input[name="date_debut"], input[name="date_fin"], select[name="type_contrat"]').on('change',
                calculerPrix);

            // Soumission AJAX du formulaire
            {{-- $('#reservationForm').submit(function (e) { --}}
            {{--    e.preventDefault(); --}}

            {{--    let form = $(this); --}}
            {{--    let url = form.attr('action'); --}}
            {{--    let data = form.serialize(); --}}

            {{--    $.ajax({ --}}
            {{--        url: url, --}}
            {{--        method: 'POST', --}}
            {{--        data: data, --}}
            {{--        success: function (response) { --}}
            {{--            Swal.fire({ --}}
            {{--                icon: 'success', --}}
            {{--                text: response.message, --}}
            {{--                timer: 2000, --}}
            {{--                showConfirmButton: false --}}
            {{--            }).then(() => { --}}
            {{--                // Redirection après le succès --}}
            {{--                window.location.href = "{{ route('homesite.index') }}"; --}}
            {{--            }); --}}
            {{--            form[0].reset(); --}}
            {{--            $('#prix_calcule').hide(); --}}
            {{--            $('#prix_total').val(''); --}}
            {{--        }, --}}
            {{--        error: function (xhr) { --}}
            {{--            let errors = xhr.responseJSON?.errors; --}}
            {{--            let msg = 'Une erreur est survenue.'; --}}

            {{--            if (errors) { --}}
            {{--                msg = Object.values(errors).flat().join("\n"); --}}
            {{--            } else if(xhr.responseJSON?.message) { --}}
            {{--                msg = xhr.responseJSON.message; --}}
            {{--            } --}}

            {{--            alert(msg); --}}
            {{--        } --}}
            {{--    }); --}}
            {{-- }); --}}
        });
    
    </script>
@endsection
