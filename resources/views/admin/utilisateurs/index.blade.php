@extends('layouts.app')
@section('titre','Utilisateurs')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Date de création</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            let table = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("utilisateurs.index") }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'statut', name: 'statut', orderable: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false },
                ]
            });
        });

        function toggleUser(id){
            if(confirm("Voulez-vous changer le statut de cet utilisateur ?")){
                $.post('/utilisateurs/'+id+'/toggle', {
                    _token: '{{ csrf_token() }}'
                }, function(data){
                    if(data.success){
                        $('#usersTable').DataTable().ajax.reload();
                    }
                });
            }
        }
    </script>
@endsection
