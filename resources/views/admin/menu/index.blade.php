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
                    <li class="nav-item">Menu</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal">
                                    Add Menu
                                  </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-hover" >
                                    <thead class="bg-secondary thw">
                                    <tbody>
                                        @php $x = 1 @endphp
                                        @foreach ($menus as $menu)
                                        <tr class="bg-info text-light">
                                            {{-- <td>{{ $x++ }}</td> --}}
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->name_b }}</td>
                                            <td>{!! Str::limit($menu->text, 50) !!}</td>
                                            <td><img src="{{asset('uploads/images/blog/'.$menu->image)}}" alt="" width="100"></td>
                                            <td>{{ $menu->is_published==1?'Published':'Not Published' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <span class="btn btn-link btn-warning quesAns" data-toggle="modal" data-target="#quesAns" data-id="{{$menu->id}}">Add Sub Menu</span>
                                                    <a href="{{ route('admin.menu.edit', $menu->id) }}" title="Edit" class="btn btn-link btn-primary btn-lg" >
                                                        Edit
                                                    </a>
                                                    ||<form action="{{ route('admin.menu.destroy', $menu->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-link btn-danger" onClick="return confirm('Are you sure')">
                                                            Delete
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        @if ($menu->subMenus->count() > 0)
                                        @foreach ($menu->subMenus as $subMenu)
                                        <tr>
                                            <td style="padding-left: 50px !important;">{{ $subMenu->name }}</td>
                                            <td>{{ $subMenu->name_b }}</td>
                                            <td>{!! Str::limit($subMenu->text, 50) !!}</td>
                                            <td><img src="{{asset('uploads/images/blog/'.$subMenu->image)}}" alt="" width="100"></td>
                                            <td>{{ $subMenu->is_published==1?'Published':'Not Published' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- <span class="btn btn-link btn-success btn-lg quesAns" data-toggle="modal" data-target="#quesAns" data-id="{{$menu->id}}">Add Sub Menu</span> --}}

                                                    <form action="{{ route('admin.subMenu.destroy', $subMenu->id) }}" method="post">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-link btn-danger" onClick="return confirm('Are you sure')">
                                                            Delete
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach

                                        @endif
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

<!-- Menu -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name English <span class="t_r">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name" required>
                            @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_b">Name Bangla <span class="t_r">*</span></label>
                            <input type="text" name="name_b" class="form-control" value="{{ old('name_b') }}" placeholder="Enter name_b" required>
                            @if ($errors->has('name_b'))
                            <div class="alert alert-danger">{{ $errors->first('name_b') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="text">Content</label>
                            <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                            @if ($errors->has('text'))
                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_published">Published <span class="t_r">*</span></label>
                            <select class="form-control" name="is_published">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
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

<!-- Sub Menu -->
<div class="modal fade" id="quesAns" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('admin.sub-menu.store') }}" method="post">
          @csrf
          <input type="hidden" id="menu_id" name="menu_id">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name English <span class="t_r">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name" required>
                            @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_b">Name Bangla <span class="t_r">*</span></label>
                            <input type="text" name="name_b" class="form-control" value="{{ old('name_b') }}" placeholder="Enter name_b" required>
                            @if ($errors->has('name_b'))
                            <div class="alert alert-danger">{{ $errors->first('name_b') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="text">Content</label>
                            <textarea name="text" id="text2" cols="30" rows="10" class="form-control"></textarea>
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
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
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
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('text')
    CKEDITOR.replace('text2')
</script>
<script>
    $(".quesAns").on('click', function(){
        $('#menu_id').val($(this).data('id'));
        // $('#q').val($(this).data('qusAns'));
    });

</script>
@endpush
@endsection

