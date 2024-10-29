@extends('frontend.layouts.app')
@section('title', 'Humanitarian Assistance')
@section('content')
    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">@lang('Humanitarian Assistance')</h1>
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
                            <div class="row mb-3">
                                <!--== Single Blog Post start ==-->
                                @foreach ($humanitarians as $humanitarian)
                                    <div class="col-lg-4 col-md-6">
                                        <article class="single-blog-post">
                                            <figure class="blog-thumb">
                                                <div class="blog-thumbnail">
                                                    <img src="{{ getImg('humanitarian', $humanitarian->image) }}" alt="Blog"
                                                        class="img-fluid" width="100%">
                                                </div>
                                                <figcaption class="blog-meta clearfix">
                                                    <a href="{{ route('frontend.humanitarian-assistance.show', $humanitarian->id) }}" class="author">
                                                        @if ($humanitarian->user->image)
                                                            <div class="author-pic">
                                                                <img src="{{ getImg('user', $humanitarian->user->image) }}"
                                                                    alt="Author">
                                                            </div>
                                                        @endif
                                                        <div class="author-info">
                                                            <h5>{{ $humanitarian->user->name }}</h5>
                                                            <p>{{ bdDate($humanitarian->created_at) }}</p>
                                                        </div>
                                                    </a>
                                                    {{-- <div class="like-comm pull-right">
                                                    <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                                    <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                                </div> --}}
                                                </figcaption>
                                            </figure>
                                            <div class="blog-content">
                                                <h3>
                                                    <a
                                                        href="{{ route('frontend.humanitarian-assistance.show', $humanitarian->id) }}">{{ $humanitarian->title }}</a>
                                                </h3>
                                                <p>{{ strip_tags(Str::limit($humanitarian->text, 100)) }}</p>
                                                <a href="{{ route('frontend.humanitarian-assistance.show', $humanitarian->id) }}"
                                                    class="btn btn-brand">More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                                <!--== Single Blog Post End ==-->
                            </div>
                            <!-- Pagination Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pagination-wrap text-center">
                                        <nav>
                                            <ul class="pagination">
                                                {{ $humanitarians->links('pagination::bootstrap-4') }}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination End -->
                        </div>
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
    <!-- Single Sidebar End --> --}}
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
