@extends('admin.layouts.app')
@section('title', 'Blog')
@section('content')
@php $m='blog'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Blog</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
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
                                            <th>Published By</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th class="no-sort" width="40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x=1 @endphp
                                        @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $blog->user->name }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ Str::limit($blog->title, 50) }}</td>
                                            <td><img src="{{asset('uploads/images/blog/'.$blog->image)}}" alt="" width="100"></td>
                                            <td>{{ $blog->is_published==1?'Published':'Not Published' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" title="Edit" class="btn btn-link btn-primary btn-lg" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.blog.destroy', $blog->id) }}">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-link btn-danger">
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
    @include('include.data_table')
@endpush
@endsection

