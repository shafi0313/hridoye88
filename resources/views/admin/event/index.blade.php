@extends('admin.layouts.app')
@section('title', 'Event')
@section('content')
@php $m=''; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Event</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('admin.event.create') }}" class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="thw bg-secondary">
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
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
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ bdDate($event->date) }}</td>
                                            <td>{!! $event->text !!}</td>
                                            <td><img src="{{ asset('uploads/images/events/'.$event->image) }}" alt="" height="80px" width="100px"></td>
                                            <td>{{ $event->status==1?'Published':'Unpublished'}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.event.edit', $event->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.event.destroy', $event->id) }}" method="post">
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

