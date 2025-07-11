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
                { data: 'typeimmeuble', name: 'typeimmeuble' },
                { data: 'localisation', name: 'localisation' },
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
    });
    // let table = new DataTable('#immobiliers-table');
</script>
<script>
    let index = 1;

    // Ajouter une ligne
    $('#addRow').click(function () {
        $('#chambres-wrapper').append(`
            <div class="chambre-row row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Categorie</label>
                        <select name="chambres[${index}][typechambre]" class="form-control">
                            <option value="">-- Choisir catégorie --</option>
                            <option value="1">Standard</option>
                            <option value="2">Confort</option>
                            <option value="3">VIP</option>
                        </select>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Capacité</label>
                        <input type="number" name="chambres[${index}][capacite]"  class="form-control" placeholder="Capacité" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Statut</label>
                        <select  name="chambres[${index}][statut]" required class="form-control">
                            <option value="disponible">Disponible</option>
                            <option value="reservee">Réservée</option>

                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Prix/Jour</label>
                        <input type="number" name="chambres[${index}][prix_jour]" class="form-control"  placeholder="Prix journalier" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Prix/Mois</label>
                        <input type="number" name="chambres[${index}][prix_mois]" class="form-control"  placeholder="Prix mensuel" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Prix/Année</label>
                        <input type="number" name="chambres[${index}][prix_annee]" class="form-control"  placeholder="Prix annuel" required>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group mb-5">
                        <label class="font-sm color-text-mutted mb-10">Description</label>
                        <textarea name="chambres[${index}][description]"  class="form-control" id="" cols="" rows="5"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button"  class="remove-btn btn btn-danger btn-sm float-end" >
                            <span class="fi fi-rr-trash"></span></button>
                    </div>
                </div>
              </div>
        `);
        index++;
    });

    // Supprimer une ligne
    $(document).on('click', '.remove-btn', function () {
        if(index>1){
            $(this).parent().parent().parent().remove();
            index--;
        }
    });

    // Soumission AJAX
    $('#createform').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: $(this).data('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: res.message,
                    showConfirmButton: false
                })
                $('#createform')[0].reset();
                window.setTimeout(function(){location.reload()},2000)
            },
            error: function(err) {
                // console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Erreur lors de l\'enregistrement'
                });
            }
        });
        window.setTimeout(function(){location.reload()},1000)
    });
</script>
