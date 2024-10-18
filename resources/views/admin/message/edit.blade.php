@extends('admin.layouts.app')
@section('title', 'Message')
@section('content')
@php $m='message'; $sm='message'; $ssm=''; @endphp
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
                        <form action="{{ route('admin.message.update',1) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text">Text</label>
                                            <textarea name="text" rows="10" style="width:100%" class="form-control" id="text" required>{{ $message->text }}</textarea>
                                            @if ($errors->has('text'))
                                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <img src="{{asset('uploads/images/message/'.$message->image)}}" alt="" height="100px" width="100px">
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image <span class="t_r">Width: 1919px Height: 1000px *</span></label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="t_r">*</span></label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{$message->status==1?'selected':''}}>Published</option>
                                                <option value="0" {{$message->status==0?'selected':''}}>Unpublished</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <div class="alert alert-danger">{{ $errors->first('status') }}</div>
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

