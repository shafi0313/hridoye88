@extends('admin.layouts.app')
@section('title', 'Member')
@section('content')
@php $m='member'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Member</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('admin.member.create') }}" class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
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
                                            <th>Name</th>
                                            <th>Name (Bn)</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>School</th>
                                            <th>Profession</th>
                                            <th>Hobby</th>
                                            <th>Permanent Address</th>
                                            <th>Present Address</th>
                                            <th>Image</th>
                                            <th class="no-sort" width="40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datum as $data)
                                        <tr>
                                            <td>{{ @$x += 1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->name_b }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->school }}</td>
                                            <td>{{ $data->designation?->name }}</td>
                                            <td>{{ $data->hobby }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->pre_address }}</td>
                                            <td>
                                                <img src="{{ imagePath('users', $data->image) }}" height="60">
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.member.edit', $data->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button> --}}
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

