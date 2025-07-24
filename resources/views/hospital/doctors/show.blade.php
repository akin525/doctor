@extends('layouts.sidebar')
@section('tittle', 'All Patients')
@section('content')
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Patient List</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row mb-3">
            <div class="card">
                <div class="card-body">
                    <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Patients</th>
                            <th>Age</th>
                            <th>Adress</th>
                            <th>Admited</th>
                            <th>Discharge</th>
                            <th>Progress</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($patients as $pa)
                            <tr>
                                <td>{{$pa['id']}}</td>
                                <td><img src="assets/images/xs/avatar3.jpg" class="avatar sm rounded-circle me-2" alt="profile-image"><span>{{$pa['lastname']}} </span></td>
                                <td>{{$pa['dob']}}</td>
                                <td>{{$pa['address']}}</td>
                                <td>{{$pa['admited']}}</td>
                                <td>{{$pa['discharge']}}</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"> <span class="sr-only">40% Complete</span> </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info">Admit</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No patient has been attached to this doctor yet.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js-->
    <script src="assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
{{--    <script src="js/template.js"></script>--}}
    <script>
        $(document).ready(function() {
            $('#patient-table')
                .addClass( 'nowrap' )
                .dataTable( {
                    responsive: true,
                    columnDefs: [
                        { targets: [-1, -3], className: 'dt-body-right' }
                    ]
                });
        });

    </script>

@endsection
