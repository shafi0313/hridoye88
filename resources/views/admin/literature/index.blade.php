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
                                    <a data-toggle="modal" data-target="#createModal"
                                        class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
                                        <i class="fa fa-plus"></i> Add New
                                    </a>
                                </div>
                            </div>
                            <div class="card-body row">
                                <table id="data_table" class="table table-striped table-hover">
                                    <thead class="bg-secondary thw"></thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @can('literature-add')
            @include('admin.literature.create')
        @endcan

        @push('custom_scripts')
            <!-- Datatables -->
            @include('include.data_table')
            <script>
                $(function() {
                    $('#data_table').DataTable({
                        processing: true,
                        serverSide: true,
                        deferRender: true,
                        ordering: true,
                        responsive: true,
                        scrollY: 400,
                        ajax: "{{ route('admin.literatures.index') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex',
                                title: 'SL',
                                searchable: false,
                                orderable: false,
                            },
                            {
                                data: 'name',
                                name: 'name',
                                title: 'Book Name'
                            },
                            {
                                data: 'writer',
                                name: 'writer',
                                title: 'Writer'
                            },
                            {
                                data: 'price',
                                name: 'price',
                                title: 'Price'
                            },
                            {
                                data: 'publisher',
                                name: 'publisher',
                                title: 'Publisher'
                            },
                            {
                                data: 'published_at',
                                name: 'published_at',
                                title: 'Published at'
                            },
                            {
                                data: 'cover_img',
                                name: 'cover_img',
                                title: 'Cover Image',
                                orderable: false,
                                searchable: false
                            },
                            {
                                data: 'action',
                                name: 'action',
                                title: 'Action',
                                orderable: false,
                                searchable: false
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
