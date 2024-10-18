@extends('frontend.layouts.app')
@section('title', 'Video Gallery')
@section('content')
<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{__('index.m-video')}} {{__('index.m-gallery')}}</h1>
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
            <div class="row" id="page-content-wrap">
                <div class="col-lg-12" >
                    <!-- Gallery Item content Start -->
                    <div class="row gallery-gird">
                        <!-- Single Gallery Start -->
                        @foreach ($galleries as $gallery)
                        @if (!empty($gallery->type))
                            @if ($gallery->type == 'File')
                            <div class="col-lg-4  col-sm-6  {{ $gallery->gallery_cat_id }}">
                                <div class="single-gallery-item video gallery-bg-2">
                                    <video style="width: 100% !important; height: 300px !important" controls>
                                        <source src="{{ getImg('gallery', $gallery->link) }}" type="video/mp4">
                                      Your browser does not support the video tag.
                                      </video>
                                    <a href="https://player.vimeo.com/video/140182080?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1"
                                        class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>

                            {{-- <video style="width: 100% !important; height: 300px !important" controls>
                                <source src="{{ getImg('gallery', $gallery->image) }}" type="video/mp4">
                              Your browser does not support the video tag.
                              </video> --}}
                            @else
                            <div class="col-lg-4  col-sm-6  {{ $gallery->gallery_cat_id }}">
                                <div class="single-gallery-item video gallery-bg-2">
                                    <div style="width: 100% !important; height: 300px !important">
                                        {!! $gallery->link !!}
                                    </div>
                                </div>
                            </div>

                            @endif

                        @endif
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
