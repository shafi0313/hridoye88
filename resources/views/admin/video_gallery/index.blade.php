@extends('admin.layouts.app')
@section('title', 'Video Galleries')
@section('content')
@php $m='video-gallery'; $sm='video-gallery'; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Video Galleries</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('admin.video-gallery.create') }}" class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th>SL</th>
                                            <th>Caption</th>
                                            <th>Image</th>
                                            <th class="no-sort" width="40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $gallery->title }}</td>
                                            <td>
                                                @if ($gallery->type == 'File')
                                                <video style="height: 200px !important" controls>
                                                    <source src="{{ asset('uploads/images/gallery/'.$gallery->link) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                                </video>
                                                @else
                                                <div style="width: 100% !important; height: 300px !important">
                                                    {!! $gallery->link !!}
                                                </div>
                                                @endif
                                                {{-- <img src="{{ asset('uploads/images/gallery/'.$gallery->image) }}" alt="" height="80px" width="100px"></td> --}}
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.video-gallery.edit', $gallery->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.video-gallery.destroy', $gallery->id) }}" method="post">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" title="Delete" class="btn btn-link btn-danger" onClick="return confirm('Are you sure')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('custom_scripts')
    <!-- Datatables -->
    @include('admin.layouts.includes.data_table')
@endpush
@endsection

