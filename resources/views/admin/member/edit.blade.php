@extends('admin.layouts.app')
@section('title', 'Member')
@section('content')
@php $m='member'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('admin.member.index') }}">Member</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Edit</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Member</div>
                        </div>
                        <form action="{{ route('admin.member.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="name_b" class="col-sm-2 col-form-label">{{__('register.memberNameB')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name_b" class="form-control" value="{{ $data->name_b }}" id="name_b" required>
                                                @if ($errors->has('name_b'))
                                                <div class="alert alert-danger">{{ $errors->first('name_b') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">{{__('register.memberName')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}" required>
                                                @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">{{__('register.email')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}" readonly required>
                                                @if ($errors->has('email'))
                                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">{{__('register.mobile')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="phone" name="phone" class="form-control" id="phone" value="{{ $data->phone }}" required>
                                                @if ($errors->has('phone'))
                                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="school" class="col-sm-2 col-form-label">{{__('register.school')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="school" name="school" class="form-control" id="school" value="{{ $data->school }}" required>
                                                @if ($errors->has('school'))
                                                <div class="alert alert-danger">{{ $errors->first('school') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profession" class="col-sm-2 col-form-label">{{__('register.profession')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <select name="profession" class="form-control" id="profession">
                                                    <option value="">Select</option>
                                                    @foreach ($professions as $profession)
                                                    <option value="{{ $profession->id }}" {{$data->profession_id == $profession->id ? 'selected':''}}>{{ $profession->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('profession'))
                                                <div class="alert alert-danger">{{ $errors->first('profession') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="hobby" class="col-sm-2 col-form-label">{{__('register.hobby')}} </label>
                                            <div class="col-sm-10">
                                                <input type="hobby" name="hobby" class="form-control" id="hobby" value="{{ $data->hobby }}">
                                                @if ($errors->has('hobby'))
                                                <div class="alert alert-danger">{{ $errors->first('hobby') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">{{__('register.permanentAddress')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="address" class="form-control" id="address" value="{{ $data->address }}" required>
                                                @if ($errors->has('address'))
                                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">{{__('register.checkAddress')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="same" class="" id="same" >
                                                @if ($errors->has(''))
                                                <div class="alert alert-danger">{{ $errors->first('') }}</div>
                                                @endif
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            <label for="pre_address" class="col-sm-2 col-form-label">{{__('register.presentAddress')}} <span class="t_r">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="pre_address" class="form-control" id="pre_address" value="{{ $data->pre_address }}" required>
                                                @if ($errors->has('pre_address'))
                                                <div class="alert alert-danger">{{ $errors->first('pre_address') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="blood" class="col-sm-2 col-form-label">{{__('register.bloodGroup')}}</label>
                                            <div class="col-sm-10">
                                                <input type="blood" name="blood" class="form-control" id="blood" value="{{ $data->blood }}">
                                                @if ($errors->has('blood'))
                                                <div class="alert alert-danger">{{ $errors->first('blood') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="fb" class="col-sm-2 col-form-label">{{__('register.fbId')}} </label>
                                            <div class="col-sm-10">
                                                <input type="fb" name="fb" class="form-control" id="fb" value="{{ $data->fb }}">
                                                @if ($errors->has('fb'))
                                                <div class="alert alert-danger">{{ $errors->first('fb') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">{{__('register.photo')}} </label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image" class="form-control" >
                                                @if ($errors->has('image'))
                                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cv" class="col-sm-2 col-form-label">{{__('register.cv')}} </label>
                                            <div class="col-sm-10">
                                                <input type="file" name="cv" class="form-control" >
                                                @if ($errors->has('cv'))
                                                <div class="alert alert-danger">{{ $errors->first('cv') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">{{__('register.password')}} </label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="password">
                                                @if ($errors->has('password'))
                                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="text-center card-action">
                                            <button type="submit" class="btn btn-{{$layout->submit_btn??'primary'}}">{{__('global.submit')}}</button>
                                            <button type="reset" class="btn btn-danger">{{__('global.cancel')}}</button>
                                        </div> --}}
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


@endpush
@endsection

