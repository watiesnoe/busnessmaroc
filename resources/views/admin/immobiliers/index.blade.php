@extends('layouts.app')
@section('titre')
    Immobilier
@endsection
@section('page')
    <a href="{{route('immobiliers.create')}}">Ajouter</a>
@endsection
@section('content')
 <div class="content">
            <!-- Dynamic Table Full -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Dynamic Table <small>Full</small>
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Laura Carr</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client1<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Barbara Scott</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client2<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Jeffrey Shaw</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client3<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Jack Greene</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client4<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Carol White</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client5<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Jack Greene</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client6<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Sara Fields</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client7<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Marie Duncan</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client8<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Susan Day</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client9<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Andrea Gardner</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client10<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Lisa Jenkins</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client11<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Melissa Rice</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client12<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Marie Duncan</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client13<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Wayne Garcia</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client14<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Judy Ford</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client15<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Carol White</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client16<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Albert Ray</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client17<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Barbara Scott</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client18<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Sara Fields</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client19<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">20</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Sara Fields</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client20<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->

            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Dynamic Table <small>Export Buttons</small>
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Jesse Fisher</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client1<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Amanda Powell</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client2<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Helen Jacobs</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client3<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Jesse Fisher</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client4<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Jose Wagner</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client5<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Lori Moore</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client6<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Lisa Jenkins</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client7<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Megan Fuller</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client8<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Carol White</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client9<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Brian Stevens</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client10<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Ryan Flores</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client11<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Sara Fields</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client12<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Marie Duncan</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client13<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Betty Kelley</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client14<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Andrea Gardner</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client15<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Adam McCoy</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client16<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Megan Fuller</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client17<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Carl Wells</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client18<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Thomas Riley</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client19<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">20</td>
                            <td class="fw-semibold">
                                <a href="be_pages_generic_blank.html">Scott Young</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client20<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->

            <!-- Dynamic Table Full Pagination -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Dynamic Table <small>Full pagination</small>
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Carol Ray</td>
                            <td class="d-none d-sm-table-cell">
                                client1<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Jesse Fisher</td>
                            <td class="d-none d-sm-table-cell">
                                client2<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">Alice Moore</td>
                            <td class="d-none d-sm-table-cell">
                                client3<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="fw-semibold">Danielle Jones</td>
                            <td class="d-none d-sm-table-cell">
                                client4<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="fw-semibold">Wayne Garcia</td>
                            <td class="d-none d-sm-table-cell">
                                client5<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="fw-semibold">Alice Moore</td>
                            <td class="d-none d-sm-table-cell">
                                client6<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="fw-semibold">Lori Grant</td>
                            <td class="d-none d-sm-table-cell">
                                client7<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="fw-semibold">Andrea Gardner</td>
                            <td class="d-none d-sm-table-cell">
                                client8<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="fw-semibold">Jeffrey Shaw</td>
                            <td class="d-none d-sm-table-cell">
                                client9<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td class="fw-semibold">Amber Harvey</td>
                            <td class="d-none d-sm-table-cell">
                                client10<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            <td class="fw-semibold">Jose Parker</td>
                            <td class="d-none d-sm-table-cell">
                                client11<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            <td class="fw-semibold">Alice Moore</td>
                            <td class="d-none d-sm-table-cell">
                                client12<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            <td class="fw-semibold">Sara Fields</td>
                            <td class="d-none d-sm-table-cell">
                                client13<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            <td class="fw-semibold">Thomas Riley</td>
                            <td class="d-none d-sm-table-cell">
                                client14<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            <td class="fw-semibold">Jose Mills</td>
                            <td class="d-none d-sm-table-cell">
                                client15<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            <td class="fw-semibold">Brian Stevens</td>
                            <td class="d-none d-sm-table-cell">
                                client16<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            <td class="fw-semibold">Brian Cruz</td>
                            <td class="d-none d-sm-table-cell">
                                client17<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">4 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            <td class="fw-semibold">Brian Cruz</td>
                            <td class="d-none d-sm-table-cell">
                                client18<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            <td class="fw-semibold">Betty Kelley</td>
                            <td class="d-none d-sm-table-cell">
                                client19<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">20</td>
                            <td class="fw-semibold">David Fuller</td>
                            <td class="d-none d-sm-table-cell">
                                client20<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">4 days ago</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full Pagination -->

            <!-- Dynamic Table Simple -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Dynamic Table <small>With only sorting and pagination</small>
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <!-- DataTables init on table by adding .js-dataTable-simple class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Barbara Scott</td>
                            <td class="d-none d-sm-table-cell">
                                client1<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Amanda Powell</td>
                            <td class="d-none d-sm-table-cell">
                                client2<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">Laura Carr</td>
                            <td class="d-none d-sm-table-cell">
                                client3<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="fw-semibold">Jack Estrada</td>
                            <td class="d-none d-sm-table-cell">
                                client4<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="fw-semibold">Jose Parker</td>
                            <td class="d-none d-sm-table-cell">
                                client5<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="fw-semibold">Brian Stevens</td>
                            <td class="d-none d-sm-table-cell">
                                client6<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="fw-semibold">Justin Hunt</td>
                            <td class="d-none d-sm-table-cell">
                                client7<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="fw-semibold">Jack Greene</td>
                            <td class="d-none d-sm-table-cell">
                                client8<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="fw-semibold">Andrea Gardner</td>
                            <td class="d-none d-sm-table-cell">
                                client9<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td class="fw-semibold">Jack Greene</td>
                            <td class="d-none d-sm-table-cell">
                                client10<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            <td class="fw-semibold">Carol White</td>
                            <td class="d-none d-sm-table-cell">
                                client11<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            <td class="fw-semibold">Jeffrey Shaw</td>
                            <td class="d-none d-sm-table-cell">
                                client12<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            <td class="fw-semibold">Scott Young</td>
                            <td class="d-none d-sm-table-cell">
                                client13<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            <td class="fw-semibold">Alice Moore</td>
                            <td class="d-none d-sm-table-cell">
                                client14<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">9 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            <td class="fw-semibold">Thomas Riley</td>
                            <td class="d-none d-sm-table-cell">
                                client15<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            <td class="fw-semibold">Melissa Rice</td>
                            <td class="d-none d-sm-table-cell">
                                client16<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            <td class="fw-semibold">Henry Harrison</td>
                            <td class="d-none d-sm-table-cell">
                                client17<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            <td class="fw-semibold">Jose Wagner</td>
                            <td class="d-none d-sm-table-cell">
                                client18<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">4 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            <td class="fw-semibold">Albert Ray</td>
                            <td class="d-none d-sm-table-cell">
                                client19<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">20</td>
                            <td class="fw-semibold">Carol Ray</td>
                            <td class="d-none d-sm-table-cell">
                                client20<span class="text-muted">@example.com</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Simple -->

            <!-- Dynamic Table Responsive -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Dynamic Table <small>DataTables Responsive Mode</small>
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Name</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Access</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Brian Cruz</td>
                            <td>
                                client1<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-success">VIP</span>
                            </td>
                            <td>
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Sara Fields</td>
                            <td>
                                client2<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td>
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">Susan Day</td>
                            <td>
                                client3<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td>
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="fw-semibold">Betty Kelley</td>
                            <td>
                                client4<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td>
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="fw-semibold">Ryan Flores</td>
                            <td>
                                client5<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td>
                                <span class="text-muted">6 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="fw-semibold">Albert Ray</td>
                            <td>
                                client6<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td>
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="fw-semibold">Megan Fuller</td>
                            <td>
                                client7<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td>
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="fw-semibold">Wayne Garcia</td>
                            <td>
                                client8<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="fw-semibold">Jack Estrada</td>
                            <td>
                                client9<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">2 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td class="fw-semibold">Jose Mills</td>
                            <td>
                                client10<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            <td class="fw-semibold">Carl Wells</td>
                            <td>
                                client11<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td>
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            <td class="fw-semibold">David Fuller</td>
                            <td>
                                client12<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td>
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            <td class="fw-semibold">Jesse Fisher</td>
                            <td>
                                client13<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td>
                                <span class="text-muted">7 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            <td class="fw-semibold">Danielle Jones</td>
                            <td>
                                client14<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td>
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            <td class="fw-semibold">Helen Jacobs</td>
                            <td>
                                client15<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">Personal</span>
                            </td>
                            <td>
                                <span class="text-muted">10 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            <td class="fw-semibold">Amber Harvey</td>
                            <td>
                                client16<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            <td class="fw-semibold">Jack Estrada</td>
                            <td>
                                client17<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">5 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            <td class="fw-semibold">Sara Fields</td>
                            <td>
                                client18<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            <td class="fw-semibold">Jose Wagner</td>
                            <td>
                                client19<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-danger">Disabled</span>
                            </td>
                            <td>
                                <span class="text-muted">8 days ago</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">20</td>
                            <td class="fw-semibold">David Fuller</td>
                            <td>
                                client20<span class="text-muted">@example.com</span>
                            </td>
                            <td>
                                <span class="badge bg-info">Business</span>
                            </td>
                            <td>
                                <span class="text-muted">3 days ago</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Dynamic Table Responsive -->
        </div>>
   
@endsection
 {{-- <table id="immobiliers-table" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Type</th>
            <th>Localisation</th>
            <th>Statut</th>
            <th>Date de création</th>
        </tr>
        </thead>
    </table> --}}