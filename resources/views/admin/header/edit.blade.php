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
                        <li class="nav-item"><a href="{{ route('admin.header.index') }}">Slider</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Create</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Slider</div>
                            </div>
                            <form action="{{ route('admin.header.update', $header->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="icon">Icon <span class="t_r">*</span></label>
                                                <input type="text" name="icon" class="form-control"
                                                    value="{{ $header->icon }}" placeholder="fa fa-facebook" required>
                                                @if ($errors->has('icon'))
                                                    <div class="alert alert-danger">{{ $errors->first('icon') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">Content <span class="t_r">*</span></label>
                                                <input type="text" name="content" class="form-control"
                                                    value="{{ $header->content }}" placeholder="Enter content">
                                                @if ($errors->has('content'))
                                                    <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="link">Link <span class="t_r">*</span></label>
                                                <input type="text" name="link" class="form-control"
                                                    value="{{ $header->link }}" placeholder="Enter link">
                                                @if ($errors->has('link'))
                                                    <div class="alert alert-danger">{{ $errors->first('link') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center card-action">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom_scripts')
        <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('text')
            CKEDITOR.replace('title')
        </script>
    @endpush
@endsection
