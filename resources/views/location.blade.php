@extends('layoutsite.site')
@section('content')
      <section class="section-box mt-30">
        <div class="container">
          <div class="row flex-row-reverse">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
              <div class="content-page"> 
                <div class="box-filters-job">
                  <div class="row">
                    <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing <strong>41-60 </strong>of <strong>944 </strong>jobs</span></div>
                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                      <div class="display-flex2">
                        <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                          <div class="dropdown dropdown-sort">
                            <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                              <li><a class="dropdown-item active" href="#">10</a></li>
                              <li><a class="dropdown-item" href="#">12</a></li>
                              <li><a class="dropdown-item" href="#">20</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="box-border"><span class="text-sortby">Sort by:</span>
                          <div class="dropdown dropdown-sort">
                            <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>Newest Post</span><i class="fi-rr-angle-small-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                              <li><a class="dropdown-item active" href="#">Newest Post</a></li>
                              <li><a class="dropdown-item" href="#">Oldest Post</a></li>
                              <li><a class="dropdown-item" href="#">Rating Post</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="box-view-type"><a class="view-type" href="jobs-list.html"><img src="assets/imgs/template/icons/icon-list.svg" alt="jobBox"></a><a class="view-type" href="jobs-grid.html"><img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="results" id="immobilier-data">
                    @include('layoutsite.partials.resultats', ['immobiliers' => $immobiliers])
                </div>
              </div>
          
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
              <div class="sidebar-shadow none-shadow mb-30">
                <div class="sidebar-filters">
                  <div class="filter-block head-border mb-30">
                    <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
                  </div>
                   <form id="filterForm">
                        <h4>Filtres</h4>

                        <label>Catégorie</label>
                        <select name="category" class="form-control mb-2">
                            <option value="">Toutes</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                            @endforeach
                        </select>

                        <label>Ville</label>
                        <select name="city"  class="form-control mb-2">
                            <option value="">Toutes</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>

                        <label>Prix min</label>
                        <input type="number" name="min_price" class="form-control mb-2">

                        <label>Prix max</label>
                        <input type="number" name="max_price" class="form-control mb-2">
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        fetchData();
    });

    $('#filterForm select, #filterForm input').on('change', function () {
        fetchData();
    });

    function fetchData() {
        $.ajax({
            url: "{{ route('location.filter') }}",
            method: 'POST',
            data: $('#filterForm').serialize(),
            beforeSend: function () {
                $('#immobilier-data').html('<p>Chargement...</p>');
            },
            success: function (data) {
                $('#immobilier-data').html(data);
            },
            error: function (xhr) {
                $('#immobilier-data').html('<p>Erreur lors du chargement.</p>');
                console.log(xhr.responseText);
            }
        });
    }
});
</script>
@endsection
