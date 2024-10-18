@extends('frontend.layouts.app')
@section('title', 'Members' )
@section('content')
    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">{{__('index.m-member')}}</h1>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
<style>
    .section-padding>.container {
        border: 1px solid rgb(167, 167, 167);
        border-radius: 3px;

    }
    .member {
        border-bottom: 1px solid rgb(167, 167, 167);
        margin: 0 -11px;
        padding: 10px 0px;
    }
    .member .text {
        border-left: 1px solid rgb(167, 167, 167);
    }

    .member:last-child{
        border-bottom: none;

    }
</style>
    <!--== Blog Page Content Start ==-->
    <div id="page-content-wrap">
        <div class="section-padding">
            <div class="container">
                @foreach ($members as $member)
                <div class="row member">
                    <div class="col-md-3">
                        <img src="{{ asset('uploads/images/users/'.$member->image) }}" height="120px" alt="">
                    </div>
                    <div class="col-md-9 text">
                        <h5 class="name">{{ $member->name }}</h5>
                        <p class="designation">Member At: {{ bdDate( $member->created_at ) }}</p>
                        <p class="designation">Designation: {{ $member->designation->name ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@push('custom_scripts')
@endpush
@endsection
