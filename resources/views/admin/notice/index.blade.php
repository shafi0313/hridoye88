@extends('admin.layouts.app')
@section('title', 'Notice')
@section('content')
    @include('admin.layouts.includes.breadcrumb', ['title' => ['', 'Notice', 'Index']])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="card-title">List of Notices</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fa-solid fa-plus"></i> Add New
                        </button>
                    </div>
                    <table id="data_table" class="table table-bordered bordered table-centered mb-0 w-100">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    @can('notice-add')
        @include('admin.notice.create')
    @endcan
    @push('scripts')
    @include('admin.layouts.includes.summer-note-with-image')
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
                    ajax: "{{ route('admin.notices.index') }}",
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
                            title: 'content'
                        },
                        {
                            data: 'file',
                            name: 'file',
                            title: 'file'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active',
                            title: 'Status'
                        },
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
