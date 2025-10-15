@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    {{-- <style>
        .single-slide-wra {}
    </style> --}}
    @if ($notices->count() > 0)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mt-2">
                        <marquee behavior="" direction="" onmouseover="this.stop();" onmouseout="this.start();">
                            @foreach ($notices as $notice)
                                <a href="{{ route('frontend.notices.show', $notice->id) }}" class="text-dark">
                                    <i class="fa fa-bullhorn"></i> {{ $notice->title ?? 'No notice found' }}.
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </a>
                            @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <!--== Slider Area Start ==-->
    <section id="slider-area">
        <div class="slider-active-wrap owl-carousel text-center text-md-left">
            <!-- Single Slide Item Start -->
            @foreach ($sliders as $slider)
                <div class="single-slide-wrap"
                    style="background: url('{{ asset('uploads/images/slider/' . $slider->image) }}') no-repeat center center / contain; background-color: #003366;  min-height: 400px !important;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    {!! $slider->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Single Slide Item End -->
        </div>

        <!-- Social Icons Area Start -->
        <div class="social-networks-icon">
            <ul>
                @foreach ($socials as $social)
                    <li>
                        <a href="{{ $social->link }}" target="_blank">
                            <i class="{{ $social->icon }}"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Social Icons Area End -->
    </section>
    <!--== Slider Area End ==-->

    <!--== Upcoming Event Area Start ==-->
    @if ($events->count() > 0)
        <section id="upcoming-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upcoming-event-wrap">
                            <div class="up-event-titile">
                                <h3>Upcoming event</h3>
                            </div>
                            <div class="upcoming-event-content owl-carousel">
                                <!-- No 1 Event -->
                                @foreach ($events as $event)
                                    <div class="single-upcoming-event">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="up-event-thumb">
                                                    <img src="{{ getImg('events', $event->image) }}" class="img-fluid"
                                                        alt="Upcoming Event">
                                                    <h4 class="up-event-date">It&#x2019;s
                                                        {{ $event->date->format('d M Y') }}
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-7">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="up-event-text">
                                                            <div class="event-countdown">
                                                                <div class="event-countdown-counter"
                                                                    data-date="{{ $event->date->format('Y/m/d') }}"></div>
                                                                <p>Remaining</p>
                                                            </div>
                                                            {!! $event->text !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- partial -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--== Upcoming Event Area End ==-->
    <style>
        #about-area .about-area-wrapper:before {
            background-image: url('{{ asset('uploads/images/message/' . $message->image) }}');
            border-radius: 5px;
            -webkit-box-shadow: 4px 4px 23px 0px rgba(255, 0, 0, 0.3);
            -moz-box-shadow: 4px 4px 23px 0px rgba(255, 0, 0, 0.3);
            box-shadow: 4px 4px 23px 0px rgba(255, 0, 0, 0.3);
        }
    </style>
    <!--== About Area Start ==-->
    <section id="about-area" class="section-padding">
        <div class="about-area-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ml-auto">
                        <div class="about-content-wrap">
                            <div class="section-title text-center text-lg-left">
                                <h2>@lang('Our Mission')</h2>
                            </div>
                            <div class="about-thumb">
                                <img src="{{ getImg('message', $message->image) }}" alt="" class="img-fluid">
                            </div>
                            {!! Str::limit($message->text, 800) !!}
                            <br>
                            <button type="button" class="btn btn-brand about-btn" data-toggle="modal"
                                data-target="#exampleModal">@lang('More')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== About Area End ==-->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Our Mission')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $message->text !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>

    <!--== FunFact Area Start ==-->
    <section id="funfact-area">
        <div class="container-fluid">
            <div class="row text-center">
                <!--== Single FunFact Start ==-->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-funfact-wrap">
                        <div class="funfact-icon">
                            <img src="{{ asset('frontend/assets/img/fun-fact/user.svg') }}" alt="Funfact">
                        </div>
                        <div class="funfact-info">
                            <h5 class="funfact-count">{{ $members }}</h5>
                            <p>@lang('Members')</p>
                        </div>
                    </div>
                </div>
                <!--== Single FunFact End ==-->

                <!--== Single FunFact Start ==-->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-funfact-wrap">
                        <div class="funfact-icon">
                            <img src="{{ asset('frontend/assets/img/fun-fact/picture.svg') }}" alt="Funfact">
                        </div>
                        <div class="funfact-info">
                            <h5 class="funfact-count">{{ $photoGalleries->count() }}</h5>
                            <p>@lang('Photos')</p>
                        </div>
                    </div>
                </div>
                <!--== Single FunFact End ==-->

                <!--== Single FunFact Start ==-->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-funfact-wrap">
                        <div class="funfact-icon">
                            <img src="{{ asset('frontend/assets/img/fun-fact/picture.svg') }}" alt="Funfact">
                        </div>
                        <div class="funfact-info">
                            <h5 class="funfact-count">{{ $photoGalleries->count() }}</h5>
                            <p>@lang('Videos')</p>
                        </div>
                    </div>
                </div>
                <!--== Single FunFact End ==-->

                <!--== Single FunFact Start ==-->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-funfact-wrap">
                        <div class="funfact-icon">
                            <img src="{{ asset('frontend/assets/img/fun-fact/event.svg') }}" alt="Funfact">
                        </div>
                        <div class="funfact-info">
                            <h5><span class="funfact-count">{{ $events->count() }}</span>+</h5>
                            <p>@lang('Events')</p>
                        </div>
                    </div>
                </div>
                <!--== Single FunFact End ==-->
            </div>
        </div>
    </section>
    <!--== FunFact Area End ==-->

    {{-- <!--== Job Opportunity Area Start ==-->
<section id="job-opportunity" class="section-padding">
    <div class="container">
        <!--== Section Title Start ==-->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Recent Jobs</h2>
                </div>
            </div>
        </div>
        <!--== Section Title End ==-->

        <!--== Job opportunity Wrapper ==-->
        <div class="job-opportunity-wrapper">
            <div class="row">
                <!--== Single Job opportunity Start ==-->
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-job-opportunity">
                        <div class="job-opportunity-text">
                            <div class="job-oppor-logo">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <img src="http://placehold.it/317x410" alt="Job">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Urgently Need Five Data Center Specialist</a></h3>
                            <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                est etiam procsus dymicus.<a href="#">[...]</a></p>
                        </div>
                        <a href="#" class="btn btn-job">Apply now</a>
                    </div>
                </div>
                <!--== Single Job opportunity End ==-->

                <!--== Single Job opportunity Start ==-->
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-job-opportunity">
                        <div class="job-opportunity-text">
                            <div class="job-oppor-logo">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <img src="http://placehold.it/349x248" alt="Job">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Product Owner (m/f) for our Charter Business</a></h3>
                            <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                est etiam procsus dymicus.<a href="#">[...]</a></p>
                        </div>
                        <a href="#" class="btn btn-job">Apply now</a>
                    </div>
                </div>
                <!--== Single Job opportunity End ==-->

                <!--== Single Job opportunity Start ==-->
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-job-opportunity">
                        <div class="job-opportunity-text">
                            <div class="job-oppor-logo">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <img src="http://placehold.it/317x410" alt="Job">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Backend Developer (Java) (m/f) wanted for leading</a></h3>
                            <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                est etiam procsus dymicus.<a href="#">[...]</a></p>
                        </div>
                        <a href="#" class="btn btn-job btn-expired disabled">Expired</a>
                    </div>
                </div>
                <!--== Single Job opportunity End ==-->

                <!--== Single Job opportunity Start ==-->
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-job-opportunity">
                        <div class="job-opportunity-text">
                            <div class="job-oppor-logo">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <img src="http://placehold.it/349x248" alt="Job">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">API Architect and Lead - Python, SQLAlchemy, GraphQL</a></h3>
                            <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                est etiam procsus dymicus.<a href="#">[...]</a></p>
                        </div>
                        <a href="#" class="btn btn-job">Apply now</a>
                    </div>
                </div>
                <!--== Single Job opportunity End ==-->

                <!--== Single Job opportunity Start ==-->
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-job-opportunity">
                        <div class="job-opportunity-text">
                            <div class="job-oppor-logo">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <img src="http://placehold.it/314x234" alt="Job">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Remotely - Javascript Developer Node.js</a></h3>
                            <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                est etiam procsus dymicus.<a href="#">[...]</a></p>
                        </div>
                        <a href="#" class="btn btn-job btn-expired disabled">Expired</a>
                    </div>
                </div>
                <!--== Single Job opportunity End ==-->

                <!--== Single Job opportunity Start ==-->
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-job-opportunity">
                        <div class="job-opportunity-text">
                            <div class="job-oppor-logo">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <img src="http://placehold.it/226x224" alt="Job">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Five Years Experience Data Center Specialist Needed</a></h3>
                            <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                est etiam procsus dymicus.<a href="#">[...]</a></p>
                        </div>
                        <a href="#" class="btn btn-job">Apply now</a>
                    </div>
                </div>
                <!--== Single Job opportunity End ==-->
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="career.html" class="btn btn-brand btn-load@lang('More')">All job list</a>
                </div>
            </div>
        </div>
        <!--== Job opportunity Wrapper ==-->
    </div>
</section>
<!--== Job Opportunity Area End ==--> --}}

    <!--== Gallery Area Start ==-->
    <section id="gallery-area" class="section-padding">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>@lang('Photo') @lang('Gallery')</h2>
                    </div>
                </div>
            </div>
            <div class="gallery">
                <div class="row">
                    @foreach ($photoGalleries as $photoGalley)
                        <div class="col-md-3 mb-4">
                            <a href="{{ getImg('gallery', $photoGalley->image) }}" class="image-popup  gallery-col">
                                <img src="{{ getImg('gallery', $photoGalley->image) }}" alt="{{ $photoGalley->image }}"
                                    width="100%" height="180px">
                                <div class="preview-text">
                                    Preview
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-12 text-center">
                        <a href="{{ route('frontend.photoGallery.index') }}" class="btn btn-brand"
                            style="width: 250px">@lang('More')..</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Gallery Area Start ==-->

    <!--== Gallery Area Start ==-->
    <section id="gallery-area" class="section-padding" style="background: #ecf1f5">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>@lang('Videos')</h2>
                    </div>
                </div>
            </div>
            <div class="video-gallery">
                <div class="row">
                    @foreach ($videoGalleries as $videoGalle)
                        <div class="col-md-4 mb-4">
                            {!! $videoGalle->link !!}
                        </div>
                    @endforeach
                    <div class="col-md-12 text-center">
                        <a href="{{ route('frontend.videoGallery.index') }}" class="btn btn-brand"
                            style="width: 250px">@lang('More')..</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Gallery Area Start ==-->

    <!--== Blog Area Start ==-->
    <section id="blog-area" class="section-padding" style="background: #ffffff">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>@lang('Recent') @lang('Blog') </h2>
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->

            <!--== Blog Content Wrapper ==-->
            <div class="row">
                <!--== Single Blog Post start ==-->
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="{{ getImg('blog', $blog->image) }}" alt="Blog" class="img-fluid">
                                </div>
                                <figcaption class="blog-meta clearfix">
                                    <a href="{{ route('frontend.blog.show', $blog->id) }}" class="author">
                                        @if ($blog->user->image)
                                            <div class="author-pic">
                                                <img src="{{ getImg('user', $blog->user->image) }}" alt="Author">
                                            </div>
                                        @endif
                                        <div class="author-info">
                                            <h5>{{ $blog->user->name }}</h5>
                                            <p>{{ bdDate($blog->created_at) }}</p>
                                        </div>
                                    </a>
                                    {{-- <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div> --}}
                                </figcaption>
                            </figure>

                            <div class="blog-content">
                                <h3><a href="{{ route('frontend.blog.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                                <p>{{ strip_tags(Str::limit($blog->text, 100)) }}</p>
                                <a href="{{ route('frontend.blog.show', $blog->id) }}"
                                    class="btn btn-brand">@lang('More')</a>
                            </div>
                        </article>
                    </div>
                @endforeach
                <!--== Single Blog Post End ==-->
                <div class="col-md-12 mt-5 text-center">
                    <a href="{{ route('frontend.blog.index') }}" class="btn btn-brand"
                        style="width: 250px">@lang('More')..</a>
                </div>
            </div>
            <!--== Blog Content Wrapper ==-->
        </div>
    </section>
    <!--== Blog Area EndBlog ==-->


    <!--== humanitarian Area Start ==-->
    <section id="blog-area" class="section-padding" style="background: #ecf1f5">
        <div class="container">
            <!--== Section Title Start ==-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>@lang('Recent') @lang('Humanitarian Assistance')</h2>
                    </div>
                </div>
            </div>
            <!--== Section Title End ==-->

            <!--== Blog Content Wrapper ==-->
            <div class="row">
                <!--== Single Blog Post start ==-->
                @foreach ($humanitarians as $humanitarian)
                    <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="{{ getImg('humanitarian', $humanitarian->image) }}" alt="humanitarian"
                                        class="img-fluid">
                                </div>
                                <figcaption class="blog-meta clearfix">
                                    <a href="{{ route('frontend.humanitarian-assistance.show', $humanitarian->id) }}"
                                        class="author">
                                        @if ($humanitarian->user->image)
                                            <div class="author-pic">
                                                <img src="{{ getImg('user', $humanitarian->user->image) }}"
                                                    alt="Author">
                                            </div>
                                        @endif
                                    </a>
                                    {{-- <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div> --}}
                                </figcaption>
                            </figure>

                            <div class="blog-content">
                                <h3 class="mb-2">
                                    <a
                                        href="{{ route('frontend.humanitarian-assistance.show', $humanitarian->id) }}">{{ $humanitarian->title }}</a>
                                </h3>
                                <div class="author-info text-muted" style="font-size: 14px">
                                    <p>
                                        <i class="fa-solid fa-circle-user"></i>
                                        {{ $humanitarian->publisher ?? '' }}&nbsp;
                                        <i class="fa-solid fa-calendar-days"></i> {{ bdDate($humanitarian->created_at) }}
                                    </p>
                                </div>
                                <p>{{ strip_tags(Str::limit($humanitarian->content, 100)) }}</p>
                                <a href="{{ route('frontend.humanitarian-assistance.show', $humanitarian->id) }}"
                                    class="btn btn-brand">@lang('More')</a>
                            </div>
                        </article>
                    </div>
                @endforeach
                <!--== Single Blog Post End ==-->
                <div class="col-md-12 mt-5 text-center">
                    <a href="{{ route('frontend.humanitarian-assistance.index') }}" class="btn btn-brand"
                        style="width: 250px">@lang('More')..</a>
                </div>
            </div>
            <!--== Blog Content Wrapper ==-->
        </div>
    </section>
    <!--== humanitarian Area End ==-->


    <!--== Literary Area Start ==-->

    <style>
        .book-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .book-card .img {
            position: relative;
            overflow: hidden;
            height: 350px;
        }

        .book-card .img img {
            width: 100%;
            object-fit: fill;
            transition: transform 0.5s;
        }

        .book-card:hover .img img {
            transform: scale(1.1);
        }

        .book-card .content {
            padding: 12px;
            text-align: center;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: 1.2;
        }

        .book-card .content h3 {
            font-size: 20px;
        }

        .book-card .content p {
            font-size: 14px;
            line-height: 1;
            margin: 5px 0px;
        }

        .book-card {
            color: #000
        }
    </style>
    <section id="blog-area" class="section-padding" style="background: #ffffff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>@lang('Hridoye Literature Publication')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($literatures as $literature)
                    <div class="col-md-3">
                        <a href="#">
                            <div class="book-card">
                                <div class="img">
                                    <img src="{{ imagePath('book', $literature->cover_img) }}"
                                        alt="{{ $literature->name }}">
                                </div>
                                <div class="content">
                                    <h3>{{ $literature->name }}</h3>
                                    <p>{{ $literature->writer }}</p>
                                    <p><b>&#x09F3 {{ $literature->price }}</b></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="col-md-12 mt-5 text-center">
                    <a href="{{ route('frontend.blog.index') }}" class="btn btn-brand"
                        style="width: 250px">@lang('More')..</a>
                </div>
            </div>
        </div>
    </section>
    <!--== Literary Area EndBlog ==-->


    @push('custom_scripts')
        <script>
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image'
                });
                $('.video-popup').magnificPopup({
                    type: 'iframe'
                });
            });
        </script>
    @endpush
@endsection
