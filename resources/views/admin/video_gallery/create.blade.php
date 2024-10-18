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
                    <li class="nav-item"><a href="{{ route('admin.video-gallery.index') }}">Video Galleries</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Create</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Video Galleries</div>
                        </div>
                        <form action="{{ route('admin.video-gallery.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gallery_cat_id">Gallery Category <span class="t_r">*</span></label>
                                            <select type="text" name="gallery_cat_id" class="form-control" value="{{ old('gallery_cat_id') }}" required>
                                                <option value="">Select</option>
                                                @foreach ($galleryCats as $galleryCat)
                                                <option value="{{$galleryCat->id}}">{{$galleryCat->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('gallery_cat_id'))
                                            <div class="alert alert-danger">{{ $errors->first('gallery_cat_id') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type <span class="t_r">*</span></label>
                                            <select type="text" name="type" id="type" class="form-control">
                                                <option value="">Select</option>
                                                <option value="File">File</option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="Youtube">Youtube</option>
                                            </select>
                                            @if ($errors->has('type'))
                                            <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Caption</label>
                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 file" style="display: none">
                                        <div class="form-group">
                                            <label for="link">Video <span class="t_r">*</span></label>
                                            <input type="file" name="link" id="file" class="form-control">
                                            @if ($errors->has('link'))
                                                <div class="alert alert-danger">{{ $errors->first('link') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 link" style="display: none">
                                        <div class="form-group">
                                            <label for="link">Link <span class="t_r">*</span></label>
                                            <input type="text" name="link" id="link" class="form-control">
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
<script>
    $('#type').on('change', function() {
        let type = $(this).val();
        if(type == 'File'){
            $('.file').show();
            $('.link').hide();
            $('#link').attr('disabled', true);
            $('#file').attr('disabled', false);
        }else{
            $('.file').hide();
            $('.link').show();
            $('#link').attr('disabled', false);
            $('#file').attr('disabled', true);
        }
    })
</script>
@endpush
@endsection

