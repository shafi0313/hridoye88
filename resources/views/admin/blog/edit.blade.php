@extends('admin.layouts.app')
@section('title', 'Blog')
@section('content')
    @php
        $m = 'blog';
        $sm = '';
        $ssm = '';
    @endphp
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
                                <div class="card-title">Add Blog</div>
                            </div>
                            <form action="{{ route('admin.blog.update', $blog->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title <span class="t_r">*</span></label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ $blog->title }}" required>
                                                @if ($errors->has('title'))
                                                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text">Post <span class="t_r">*</span></label>
                                                <textarea name="text" id="text" cols="30" rows="10" class="form-control">{{ $blog->text }}</textarea>
                                                @if ($errors->has('text'))
                                                    <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <img src="{{ asset('uploads/images/blog/' . $blog->image) }}" alt=""
                                                width="100px">
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="image">Image <span class="t_r">*</span></label>
                                                <input type="file" name="image" class="form-control">
                                                @if ($errors->has('image'))
                                                    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="is_published">Published <span class="t_r">*</span></label>
                                                <select class="form-control" name="is_published">
                                                    <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Published
                                                    </option>
                                                    <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Unpublished
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center card-action">
                                    <button type="submit"
                                        class="btn btn-{{ $layout->submit_btn ?? 'primary' }}">Submit</button>
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
