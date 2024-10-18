@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')
<!--== Slider Area Start ==-->
<section id="slider-area">
    <div class="slider-active-wrap owl-carousel text-center text-md-left">
        <!-- Single Slide Item Start -->
        @foreach ($sliders as $slider)
        <div class="single-slide-wrap" style="background: url('{{asset('uploads/images/slider/'. $slider->image)}}'); background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-content">
                            {!! $slider->text !!}
                            {{-- <div class="slider-btn">
                                <a href="#about-area" class="btn btn-brand smooth-scroll">our mission</a>
                            </div> --}}
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
            @foreach($socials as $social)
            <li><a href="{{ $social->link }}" target="_blank"><i class="{{ $social->icon }}"></i></a></li>
            @endforeach
        </ul>
    </div>
    <!-- Social Icons Area End -->
</section>
<!--== Slider Area End ==-->

<!--== Upcoming Event Area Start ==-->
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
                                        <h4 class="up-event-date">It&#x2019;s {{$event->date->format('d M Y')}}</h4>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="up-event-text">
                                                <div class="event-countdown">
                                                    <div class="event-countdown-counter" data-date="{{$event->date->format('Y/m/d')}}"></div>
                                                    <p>Remaining</p>
                                                </div>
                                                {!! $event->text !!}
                                                {{-- <a href="single-event.html" class="btn btn-brand btn-brand-dark">join
                                                    with us</a> --}}
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
<!--== Upcoming Event Area End ==-->
<style>
    #about-area .about-area-wrapper:before {
        background-image: url('{{asset('uploads/images/message/'.$message->image)}}');
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
                            <h2>Our Mission</h2>
                        </div>
                        <div class="about-thumb">
                            <img src="{{getImg('message', $message->image) }}" alt="" class="img-fluid">
                        </div>
                        {!! Str::limit($message->text, 800) !!}
                        <br>
                        <button type="button" class="btn btn-brand about-btn" data-toggle="modal" data-target="#exampleModal">More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== About Area End ==-->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Our Mission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! $message->text !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!--== Our Responsibility Area Start ==-->
<section id="responsibility-area" class="section-padding">
    <div class="container">
        <!--== Section Title Start ==-->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Our Responsibility</h2>
                </div>
            </div>
        </div>
        <!--== Section Title End ==-->

        <!--== Responsibility Content Wrapper ==-->
        <div class="row text-center text-sm-left">
            <!--== Single Responsibility Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-responsibility">
                    <img src="{{ asset('frontend/assets/img/responsibility/01.png') }}" alt="Responsibility">
                    <h4>Scholarship</h4>
                    <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                </div>
            </div>
            <!--== Single Responsibility End ==-->

            <!--== Single Responsibility Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-responsibility">
                    <img src="{{ asset('frontend/assets/img/responsibility/02.png') }}" alt="Responsibility">
                    <h4>Help Current Students</h4>
                    <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                </div>
            </div>
            <!--== Single Responsibility End ==-->

            <!--== Single Responsibility Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-responsibility">
                    <img src="{{ asset('frontend/assets/img/responsibility/03.png') }}" alt="Responsibility">
                    <h4>Help Our University</h4>
                    <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                </div>
            </div>
            <!--== Single Responsibility End ==-->

            <!--== Single Responsibility Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-responsibility">
                    <img src="{{ asset('frontend/assets/img/responsibility/04.png')}}" alt="Responsibility">
                    <h4>Build Our Community</h4>
                    <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                </div>
            </div>
            <!--== Single Responsibility End ==-->
        </div>
        <!--== Responsibility Content Wrapper ==-->
    </div>
</section>
<!--== Our Responsibility Area End ==-->

<!--== FunFact Area Start ==-->
<section id="funfact-area">
    <div class="container-fluid">
        <div class="row text-center">
            <!--== Single FunFact Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="{{ asset('frontend/assets/img/fun-fact/user.svg')}}" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5 class="funfact-count">{{ $members }}</h5>
                        <p>Members</p>
                    </div>
                </div>
            </div>
            <!--== Single FunFact End ==-->

            <!--== Single FunFact Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="{{ asset('frontend/assets/img/fun-fact/picture.svg')}}" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5 class="funfact-count">{{ $photoGalleries->count() }}</h5>
                        <p>Photos</p>
                    </div>
                </div>
            </div>
            <!--== Single FunFact End ==-->

            <!--== Single FunFact Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="{{ asset('frontend/assets/img/fun-fact/picture.svg')}}" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5 class="funfact-count">{{ $photoGalleries->count() }}</h5>
                        <p>Videos</p>
                    </div>
                </div>
            </div>
            <!--== Single FunFact End ==-->

            <!--== Single FunFact Start ==-->
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="{{ asset('frontend/assets/img/fun-fact/event.svg')}}" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5><span class="funfact-count">{{ $events->count() }}</span>+</h5>
                        <p>Events</p>
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
                    <a href="career.html" class="btn btn-brand btn-loadmore">All job list</a>
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
                    <h2>Our gallery</h2>
                </div>
            </div>
        </div>
        <!--== Section Title End ==-->

        <!--== Gallery Container Warpper ==-->
        <div class="gallery-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Gallery Menu Start -->
                    <div class="gallery-menu text-center">
                        <span class="active" data-filter="*">All</span>
                        @foreach ($galleryCats as $key => $galleryCat)
                        <span data-filter=".{{$galleryCat->id}}">{{$galleryCat->name}}</span>
                        @endforeach
                    </div>
                    <!-- Gallery Menu End -->

                    <!-- Gallery Item content Start -->
                    <div class="row gallery-gird">
                        <!-- Single Gallery Start -->
                        @php
                            $array = array_merge($photoGalleries->toArray(), $videoGalleries->toArray());
                            array_multisort(array_column($array, 'id'), SORT_ASC, $array);
                        @endphp
                        @foreach ($array as $gallery)
                        @if (!empty($gallery['type']))
                            @if ($gallery['type'] == 'File')
                            <div class="col-lg-4  col-sm-6  {{ $gallery['gallery_cat_id'] }}">
                                <div class="single-gallery-item video gallery-bg-2">
                                    <video style="width: 100% !important; height: 300px !important" controls>
                                        <source src="{{ getImg('gallery', $gallery['link']) }}" type="video/mp4">
                                      Your browser does not support the video tag.
                                      </video>
                                    <a href="https://player.vimeo.com/video/140182080?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1"
                                        class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>

                            {{-- <video style="width: 100% !important; height: 300px !important" controls>
                                <source src="{{ getImg('gallery', $gallery['image']) }}" type="video/mp4">
                              Your browser does not support the video tag.
                              </video> --}}
                            @else
                            <div class="col-lg-4  col-sm-6  {{ $gallery['gallery_cat_id'] }}">
                                <div class="single-gallery-item video gallery-bg-2">
                                    <div style="width: 100% !important; height: 300px !important">
                                        {!! $gallery['link'] !!}
                                    </div>
                                </div>
                            </div>

                            @endif
                        @else
                        <div class="col-lg-3  col-sm-6  {{ $gallery['gallery_cat_id'] }}">
                            <div class="single-gallery-item" style="background-image: url('{{ getImg("gallery", $gallery["image"]) }}')">
                                <div class="gallery-hvr-wrap">
                                    <div class="gallery-hvr-text">
                                        <h4>{{$gallery['title']}}</h4>
                                    </div>
                                    <a href="{{ getImg('gallery', $gallery['image']) }}" class="btn-zoom image-popup">
                                        <img src="{{ getImg('gallery', $gallery['image']) }}" alt="a">
                                    </a>
                                </div>
                            </div>
                        </div>
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

<!--== Blog Area Start ==-->
<section id="blog-area" class="section-padding">
    <div class="container">
        <!--== Section Title Start ==-->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Recent Blog</h2>
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
                                <div class="author-pic">
                                    <img src="{{ getImg('blog', $blog->user->image) }}" alt="Author">
                                </div>
                                <div class="author-info">
                                    <h5>{{ $blog->user->name }}</h5>
                                    <p>{{ bdDate( $blog->created_at) }}</p>
                                </div>
                            </a>
                            <div class="like-comm pull-right">
                                <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                <a href="#"><i class="fa fa-heart-o"></i>12</a>
                            </div>
                        </figcaption>
                    </figure>

                    <div class="blog-content">
                        <h3><a href="{{ route('frontend.blog.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                        <p>{!! Str::limit($blog->text, 100) !!}</p>
                        <a href="{{ route('frontend.blog.show', $blog->id) }}" class="btn btn-brand">More</a>
                    </div>
                </article>
            </div>
            @endforeach
            <!--== Single Blog Post End ==-->
        </div>
        <!--== Blog Content Wrapper ==-->
    </div>
</section>
<!--== Blog Area EndBlog ==-->


@push('custom_scripts')

@endpush
@endsection
