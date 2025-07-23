@extends('layoutsite.site')

    @section('content')
        @if(Auth::check() && Auth::user()->role === 'client')
            @include('layoutsite.partials.connection')
        @else
            @include('layoutsite.partials.connectionclient')
        @endif
    @endsection

    @section('scripts')
{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                function calculerPrix() {--}}
{{--                    let type = $('select[name="type_contrat"]').val();--}}
{{--                    let debut = new Date($('input[name="date_debut"]').val());--}}
{{--                    let fin = new Date($('input[name="date_fin"]').val());--}}

{{--                    if (!type || isNaN(debut) || isNaN(fin) || debut >= fin) {--}}
{{--                        $('#prix_calcule').hide();--}}
{{--                        $('#prix_total').val('');--}}
{{--                        return;--}}
{{--                    }--}}

{{--                    let jours = (fin - debut) / (1000 * 60 * 60 * 24);--}}

{{--                    // Prix récupérés depuis Laravel via Blade--}}
{{--                    let prixParJour = {{ $chambre->prix_jour }};--}}
{{--                    let prixParMois = {{ $chambre->prix_mois }};--}}
{{--                    let prixParAnnee = {{ $chambre->prix_annee }};--}}

{{--                    let total = 0;--}}
{{--                    if (type === 'jour') total = prixParJour * jours;--}}
{{--                    else if (type === 'mois') total = prixParMois * Math.ceil(jours / 30);--}}
{{--                    else if (type === 'annee') total = prixParAnnee * Math.ceil(jours / 365);--}}

{{--                    if (total > 0) {--}}
{{--                        $('#prix_total').val(total.toFixed(0));--}}
{{--                        $('#prix_calcule').show().text('Prix estimé : ' + total.toLocaleString() + ' FCFA');--}}
{{--                    } else {--}}
{{--                        $('#prix_calcule').hide();--}}
{{--                        $('#prix_total').val('');--}}
{{--                    }--}}
{{--                }--}}

{{--                // Calculer à chaque changement sur les champs concernés--}}
{{--                $('input[name="date_debut"], input[name="date_fin"], select[name="type_contrat"]').on('change', calculerPrix);--}}

{{--                // Soumission AJAX du formulaire--}}
{{--                $('#reservationForm').submit(function (e) {--}}
{{--                    e.preventDefault();--}}

{{--                    let form = $(this);--}}
{{--                    let url = form.attr('action');--}}
{{--                    let data = form.serialize();--}}

{{--                    $.ajax({--}}
{{--                        url: url,--}}
{{--                        method: 'POST',--}}
{{--                        data: data,--}}
{{--                        success: function (response) {--}}
{{--                            alert(response.message || 'Réservation enregistrée avec succès !');--}}
{{--                            form[0].reset();--}}
{{--                            $('#prix_calcule').hide();--}}
{{--                            $('#prix_total').val('');--}}
{{--                        },--}}
{{--                        error: function (xhr) {--}}
{{--                            let errors = xhr.responseJSON?.errors;--}}
{{--                            let msg = 'Une erreur est survenue.';--}}

{{--                            if (errors) {--}}
{{--                                msg = Object.values(errors).flat().join("\n");--}}
{{--                            } else if(xhr.responseJSON?.message) {--}}
{{--                                msg = xhr.responseJSON.message;--}}
{{--                            }--}}

{{--                            alert(msg);--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
    @endsection
