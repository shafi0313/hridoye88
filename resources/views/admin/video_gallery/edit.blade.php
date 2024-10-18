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
                    <li class="nav-item">Edit</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Video Galleries</div>
                        </div>
                        <form action="{{ route('admin.video-gallery.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type <span class="t_r">*</span></label>
                                            <select type="text" name="type" id="type" class="form-control">
                                                <option value="File" {{ $data->type == 'File' ? 'selected' :''}}>File</option>
                                                <option value="Facebook" {{ $data->type == 'Facebook' ? 'selected' :''}}>Facebook</option>
                                                <option value="Youtube" {{ $data->type == 'Youtube' ? 'selected' :''}}>Youtube</option>
                                            </select>
                                            @if ($errors->has('type'))
                                            <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Caption</label>
                                            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                                            @if ($errors->has('title'))
                                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data->type == 'File')
                                        <video style="height: 200px !important" controls>
                                            <source src="{{ asset('uploads/images/gallery/'.$data->link) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                        </video>
                                        @else
                                        <div style="width: 100% !important; height: 300px !important">
                                            {!! $data->link !!}
                                        </div>
                                        @endif
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
                                <button type="submit" class="btn btn-{{$layout->submit_btn??'primary'}}">Submit</button>
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
        let dBtype = '{{ $data->type }}';
        if(type == 'File' || dBtype == 'File'){
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
    let dBtype = '{{ $data->type }}';
    if(type == 'File' || dBtype == 'File'){
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
</script>
@endpush
@endsection

