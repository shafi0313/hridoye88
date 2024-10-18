@extends('frontend.layouts.app')
@section('title', 'About')
@section('content')
<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{__('index.m-about')}}</h1>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->
<!--== Blog Page Content Start ==-->
<div id="page-content-wrap">
    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog content Area Start -->
                <div class="col-lg-12">
                    <div class="blog-page-contant-start">
                        <div class="row">
                            <!--== Single Blog Post start ==-->
                            <div class="col-md-12">
                                {!! $about->text !!}
                            </div>
                            <!--== Single Blog Post End ==-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar Area End -->
    </div>
</div>
</div>
</div>
<!--== Blog Page Content End ==-->

@push('custom_scripts')
@endpush
@endsection
