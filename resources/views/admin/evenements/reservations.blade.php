@extends('layouts.app')

@section('titre', 'Clients de ' . $evenement->titre)

@section('content')
    <div class="content">
        <h4 class="mb-3 text-primary">
            👥 Clients ayant réservé pour : {{ $evenement->titre }}
        </h4>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive"> <!-- Scroll horizontal -->
                    <table id="ticketsTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Quantité</th>
                            <th>Montant total</th>
                            <th>Statut</th>
                            <th>Date d’achat</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#ticketsTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true, // active le scroll horizontal
                ajax: "{{ route('evenements.clients', $evenement->id) }}",
                columns: [
                    {data: 'nom', name: 'nom'},
                    {data: 'email', name: 'email'},
                    {data: 'quantite', name: 'quantite'},
                    {data: 'montant_total', name: 'montant_total'},
                    {data: 'statut', name: 'statut', orderable: false, searchable: false},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[5, 'desc']]
            });

            // Clic sur Confirmer
            $('#ticketsTable').on('click', '.confirmer-btn', function() {
                let ticketId = $(this).data('id');
                if(confirm('Confirmer cette réservation ?')) {
                    $.ajax({
                        url: '{{ route("tickets.confirmer", ":ticket") }}'.replace(':ticket', ticketId),
                        type: 'POST',
                        data: {_token: '{{ csrf_token() }}'},
                        success: function(response) {
                            if(response.success){
                                table.ajax.reload(null, false);
                                alert(response.message);
                                // Ouvrir le ticket à imprimer automatiquement après confirmation
                                window.open('{{ route("tickets.print", ":ticket") }}'.replace(':ticket', ticketId), '_blank');
                            }
                        },
                        error: function() {
                            alert('Erreur lors de la confirmation. Veuillez réessayer.');
                        }
                    });
                }
            });

        });
    </script>
@endsection
