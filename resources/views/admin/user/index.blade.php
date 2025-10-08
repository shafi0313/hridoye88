@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">User</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Add Row</h4>
                                    <a data-toggle="modal" data-target="#user-add"
                                        class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
                                        <i class="fa fa-plus"></i> Add New
                                    </a>
                                </div>
                            </div>
                            <div class="card-body row">
                                <table id="userDT" class="table table-striped table-hover">
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Permission</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Photo</th>
                                            <th>Address</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.user.create')

        @push('custom_scripts')
            <!-- Datatables -->
            @include('include.data_table')
            <script>
                $(function() {
                    $('#userDT').DataTable({
                        processing: true,
                        serverSide: true,
                        deferRender: true,
                        ordering: true,
                        responsive: true,
                        scrollY: 400,
                        ajax: "{{ route('admin.user.index') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex',
                                searchable: false,
                                orderable: false,
                                className: 'text-center',
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'permission',
                                name: 'permission',
                                searchable: false,
                                orderable: false,
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                            {
                                data: 'phone',
                                name: 'phone',
                            },
                            {
                                data: 'image',
                                name: 'image',
                                className: 'text-center',
                                searchable: false,
                                orderable: false,
                            },
                            {
                                data: 'address',
                                name: 'address'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false,
                                className: 'text-center',
                                width: '80px'
                            },
                        ],
                        scroller: {
                            loadingIndicator: true
                        }
                    });
                });
            </script>
        @endpush
    @endsection
