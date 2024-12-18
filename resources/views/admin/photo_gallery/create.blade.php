@extends('admin.layouts.app')
@section('title', 'Photo Galleries')
@section('content')
    @php
        $m = 'photo-gallery';
        $sm = 'photo-gallery';
        $ssm = '';
    @endphp
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('admin.photo-gallery.index') }}">Photo Galleries</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Create</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Add Photo Galleries</div>
                            </div>
                            <form action="{{ route('admin.photo-gallery.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gallery_cat_id">Gallery Category <span
                                                        class="t_r">*</span></label>
                                                <select type="text" name="gallery_cat_id" class="form-control" required>
                                                    <option value="">Select</option>
                                                    @foreach ($galleryCats as $galleryCat)
                                                        <option value="{{ $galleryCat->id }}">{{ $galleryCat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('gallery_cat_id'))
                                                    <div class="alert alert-danger">{{ $errors->first('gallery_cat_id') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Caption </label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}">
                                                @if ($errors->has('title'))
                                                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                                @endif
                                            </div>
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
    @endpush
@endsection
