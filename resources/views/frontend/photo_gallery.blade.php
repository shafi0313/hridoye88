@extends('frontend.layouts.app')
@section('title', 'Photo Gallery')
@section('content')
<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{__('index.m-photo')}} {{__('index.m-gallery')}}</h1>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->
<br><br>
<!--== Gallery Area Start ==-->
<section id="gallery-area" class="section-padding">
    <div class="container">
        <!--== Gallery Container Warpper ==-->
        <div class="gallery-content-wrapper">
            <div class="row"id="page-content-wrap">
                <div class="col-lg-12">
                    <!-- Gallery Item content Start -->
                    <div class="row gallery-gird">
                        <!-- Single Gallery Start -->
                        @foreach ($galleries as $gallery)
                        <div class="col-lg-4  col-sm-6">
                            <div class="single-gallery-item" style="background-image: url('{{ getImg("gallery", $gallery->image) }}')">
                                <div class="gallery-hvr-wrap">
                                    <div class="gallery-hvr-text">
                                    </div>
                                    <a href="{{ getImg('gallery', $gallery->image) }}" class="btn-zoom image-popup">
                                        <img src="{{ getImg('gallery', $gallery->image) }}" alt="" width="100%">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Gallery End -->
                    </div>
                    <!-- Gallery Item content End -->
                </div>
            </div>
        </div>
        <!--== Gallery Container Warpper==-->
    </div>
</section>
<!--== Gallery Area Start ==-->

@push('custom_scripts')
@endpush
@endsection
