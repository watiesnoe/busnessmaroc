@extends('layouts.app')

@section('titre')
    Candidats
@endsection

@section('content')
    <div class="content">
        <div id="candidats-container">
            @include('layouts.partials.candidats', ['candidats' => $candidats])
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#candidats-container .pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                fetchCandidats(url);
            });

            function fetchCandidats(url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#candidats-container').html(data);
                    },
                    error: function() {
                        alert('Erreur lors du chargement des candidats.');
                    }
                });
            }
        });
    </script>
@endsection
