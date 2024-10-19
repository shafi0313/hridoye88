@extends('admin.layouts.app')
@section('title', 'Header')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Header</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#textModal">
                                    Add Text
                                  </button>
                                  ||
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#socialModal">
                                    Add Social Icon
                                  </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th>SL</th>
                                            <th>Type</th>
                                            <th>Icon</th>
                                            <th>Text</th>
                                            <th>Link</th>
                                            <th class="no-sort" width="40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($headers as $header)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $header->type }}</td>
                                            <td><i class="{{ $header->icon }}"></i></td>
                                            <td>{{ $header->content }}</td>
                                            <td>{{ $header->link }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('admin.header.edit', $header->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.header.destroy', $header->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" data-original-title="Delete Task" onClick="return confirm('Are you sure')">
                                                        <i class="fa fa-times"></i>
                                                    </a>
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

{{-- text --}}
<div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="textModalLabel">Add Text</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('admin.header.textStore') }}" method="post">
          @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="icon">Icon <span class="t_r">*</span></label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="fa fa-facebook" required>
                            @if ($errors->has('icon'))
                            <div class="alert alert-danger">{{ $errors->first('icon') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Content <span class="t_r">*</span></label>
                            <input type="text" name="content" class="form-control" value="{{ old('content') }}" placeholder="Enter content" required>
                            @if ($errors->has('content'))
                            <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

{{-- social --}}
<div class="modal fade" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="socialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="socialModalLabel">Add Social Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.header.socialStore') }}" method="post">
              @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="icon">Icon <span class="t_r">*</span></label>
                                <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="fa fa-facebook" required>
                                @if ($errors->has('icon'))
                                <div class="alert alert-danger">{{ $errors->first('icon') }}</div>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="link">Link <span class="t_r">*</span></label>
                                <input type="text" name="link" class="form-control" value="{{ old('link') }}" placeholder="Enter link" required>
                                @if ($errors->has('link'))
                                <div class="alert alert-danger">{{ $errors->first('link') }}</div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>

@push('custom_scripts')
    <!-- Datatables -->
    @include('admin.layouts.includes.data_table')
@endpush
@endsection

