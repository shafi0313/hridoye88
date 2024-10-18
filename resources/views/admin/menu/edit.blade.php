@extends('admin.layouts.app')
@section('title', 'Menu')
@section('content')
@php $m='menu'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Create</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Menu</div>
                        </div>
                        <form action="{{ route('admin.menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name English <span class="t_r">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ $menu->name }}" placeholder="Enter name" required>
                                            @if ($errors->has('name'))
                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_b">Name Bangla <span class="t_r">*</span></label>
                                            <input type="text" name="name_b" class="form-control" value="{{ $menu->name_b }}" placeholder="Enter name_b" required>
                                            @if ($errors->has('name_b'))
                                            <div class="alert alert-danger">{{ $errors->first('name_b') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text">Content</label>
                                            <textarea name="text" id="text" cols="30" rows="10" class="form-control">{!! $menu->text !!}</textarea>
                                            @if ($errors->has('text'))
                                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image <span class="t_r">*</span></label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="is_published">Published <span class="t_r">*</span></label>
                                            <select class="form-control" name="is_published">
                                                <option value="1" {{$menu->is_published==1?'selected':'' }}>Published</option>
                                                <option value="0" {{$menu->is_published==0?'selected':'' }}>Unpublished</option>
                                            </select>
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

