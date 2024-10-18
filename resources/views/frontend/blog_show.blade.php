@extends('frontend.layouts.app')
@section('title', 'Blog')
@section('content')
<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{__('index.m-blog')}}</h1>
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
                <div class="col-lg-812">
                    <article class="single-blog-content-wrap">
                        <header class="article-head">
                            <div class="single-blog-thumb">
                                <img src="{{ getImg('blog', $blog->image) }}" class="img-fluid" alt="Blog">
                            </div>
                            <div class="single-blog-meta">
                                <h2>{{ $blog->title }}</h2>
                                <div class="posting-info">
                                    <a href="#">{{ bdDate($blog->created_at) }}</a> &#x2022; Posted by: <a href="#">{{ $blog->user->name }}</a>
                                </div>
                            </div>
                        </header>
                        <section class="blog-details">
                            {!! $blog->title !!}
                        </section>
                        {{-- <footer class="post-share">
                            <div class="row no-gutters ">
                                <div class="col-8">
                                    <div class="shareonsocial">
                                        <span>Share:</span>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-vimeo"></i></a>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="post-like-comm">
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>20</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>15</a>
                                    </div>
                                </div>
                            </div>
                        </footer> --}}
                    </article>
                </div>
                <!-- Blog content Area End -->

                {{-- <!-- Sidebar Area Start -->
                <div class="col-lg-4 order-first order-lg-last">

<div class="sidebar-area-wrap">
    <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap">
        <div class="brand-search-form">
            <form action="index.html">
                <input type="search" placeholder="Type and hit here">
                <button type="button"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- Single Sidebar End -->

    <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap">
       <h4 class="sidebar-title">Categories</h4>
        <div class="sidebar-body">
            <ul class="brand-unorderlist">
                <li><a href="#">Scholership</a></li>
                <li><a href="#">Alumni</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Member</a></li>
                <li><a href="#">Tour</a></li>
                <li><a href="#">Current Student</a></li>

            </ul>
        </div>
    </div>
    <!-- Single Sidebar End -->

    <!-- Single Sidebar Start -->
    <div class="single-sidebar-wrap d-none d-lg-block">
       <h4 class="sidebar-title">Popular Tags</h4>
        <div class="sidebar-body">
            <div class="tags">
                <a href="#">Bootstrap</a>
                <a href="#">Design</a>
                <a href="#">web</a>
                <a class="active" href="#">custom</a>
                <a href="#">wordpres</a>
                <a href="#">Art</a>
                <a href="#">our team</a>
                <a href="#">Classic</a>
            </div>
        </div>
    </div>
    <!-- Single Sidebar End -->
</div> --}}
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
