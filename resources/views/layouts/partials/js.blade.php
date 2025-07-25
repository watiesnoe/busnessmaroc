    <script src="{{ asset('admin/js/dashmix.app.min.js') }}"></script>

    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin/js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>Dashmix.helpersOnLoad(['jq-select2']);</script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/js/pages/be_forms_validation.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>--}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
       $('#immobiliers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('immobiliers.index') }}",
            columns: [

                { data: 'description', name: 'description' },
                { data: 'type', name: 'type' },
                { data: 'nom', name: 'nom' },
                { data: 'statut', name: 'statut' },
                { data: 'created_at', name: 'created_at' },
                 {
                data: 'id',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return `<a href="#"><span class="btn-edit btn btn-primary btn-sm" data-id="${data}"><i class="fa fa-pencil-alt"></i></span></a>
                            <a href="#"><span class="btn-delete btn btn-danger btn-sm" data-id="${data}"><i class="fa fa-trash"></i></span></a>`;
                }
            }
            ]
           });
            $('#createform').on('submit', function (e) {
                e.preventDefault(); // empêche le rechargement

                let formData = new FormData(this);

                $.ajax({
                    url: $(this).data('action'),
                    method: 'POST',
                    data: formData,
                    processData: false, // ne pas transformer les données
                    contentType: false, // ne pas définir de content-type
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            text: res.message
                        });

                        $('#createform')[0].reset(); // reset du formulaire
                        $('#chambres-body').html(''); // vider les chambres
                        window.setTimeout(function(){location.reload()},2000)
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON?.errors || {};
                        let messages = Object.values(errors).flat().join('\n');

                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: messages || 'Une erreur est survenue'
                        });
                    }
                });
            });

    });
    // let table = new DataTable('#immobiliers-table');

</script>

{{-- Table offre js datatbable---}}



