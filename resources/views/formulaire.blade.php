@extends('layoutsite.site')

@section('content')
    <section class="section-box-2 position-relative text-white d-flex align-items-center"
        style="
    height: 400px;
    background-image: url('{{ asset('asset/imgs/bg-job.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;">

        <!-- Overlay sombre -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
        </div>

        <!-- Contenu centré -->
        <div class="container position-relative text-center" style="z-index: 2;">
            <div class="p-4 offre-card-content">

                <h2 class="offre-card-title fw-bold fs-2">Réservez votre chambre idéale dès aujourd’hui</h2>
                <p class="lead mt-2">Choisissez parmi nos logements confortables et flexibles selon vos besoins.</p>
            </div>
        </div>
    </section>






    @if (Auth::check() && Auth::user()->role === 'client')
        @include('layoutsite.partials.connection')
    @else
        @include('layoutsite.partials.connectionclient')
    @endif
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
