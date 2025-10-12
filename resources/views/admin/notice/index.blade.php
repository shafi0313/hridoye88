@extends('admin.layouts.app')
@php
    $pageTitle = 'Notice';
    $folder = 'notice';
    $route = $folder.'s';
@endphp
@section('title', $pageTitle)
@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">{{ $pageTitle }}</li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between mb-2">
                                    <h4 class="card-title">List of {{ $pageTitle }}s</h4>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                        <i class="fa-solid fa-plus"></i> Add New
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="data_table" class="table table-striped table-hover w-100">
                                    <thead class="bg-secondary thw"></thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.' . $folder . '.create', ['pageTitle' => $pageTitle, 'route' => $route])
        @push('custom_scripts')
            <!-- Datatables -->
            @include('include.data_table')
            @include('admin.layouts.includes.summer-note-with-image', ['height' => 300])
            <script>
                $(function() {
                    $('#data_table').DataTable({
                        processing: true,
                        serverSide: true,
                        deferRender: true,
                        ordering: true,
                        // responsive: true,
                        scrollX: true,
                        scrollY: 400,
                        ajax: "{{ route('admin.' . $route . '.index') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex',
                                title: 'SL',
                                className: "text-center",
                                width: "60px",
                                searchable: false,
                                orderable: false,
                            },
                            {
                                data: 'title',
                                name: 'title',
                                title: 'title'
                            },
                            {
                                data: 'date',
                                name: 'date',
                                title: 'date'
                            },
                            {
                                data: 'content',
                                name: 'content',
                                title: 'content',
                                orderable: false,
                                searchable: false,
                            },
                            // {
                            //     data: 'is_active',
                            //     name: 'is_active',
                            //     title: 'Status'
                            // },
                            {
                                data: 'action',
                                name: 'action',
                                title: 'Action',
                                className: "text-center",
                                width: "100px",
                                orderable: false,
                                searchable: false,
                            },
                        ],
                        // fixedColumns: false,
                        scroller: {
                            loadingIndicator: true
                        }
                    });
                });
            </script>
        @endpush
    @endsection
