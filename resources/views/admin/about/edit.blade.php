@extends('admin.layouts.app')
@section('title', 'About')
@section('content')
@php $m='about'; $sm='about'; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    {{-- <li class="nav-item"><a href="{{ route('slider.index') }}">Slider</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li> --}}
                    <li class="nav-item">Edit</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Message</div>
                        </div>
                        <form action="{{ route('admin.about.update',1) }}" method="post">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text">Text</label>
                                            <textarea name="text" rows="10" style="width:100%" class="form-control" id="text" required>{{ $about->text }}</textarea>
                                            @if ($errors->has('text'))
                                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
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
</script>
@endpush
@endsection

