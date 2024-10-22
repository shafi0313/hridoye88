@extends('frontend.layouts.app')
@section('title', 'Blog')
@section('content')
    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">{{ __('index.m-blog') }}</h1>
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
                <div class="row justify-content-center">
                    <!-- Blog content Area Start -->
                    <div class="col-lg-8">
                        <article class="single-blog-content-wrap">
                            <header class="article-head">
                                <div class="single-blog-thumb">
                                    <img src="{{ getImg('blog', $blog->image) }}" class="img-fluid" alt="Blog">
                                </div>
                                <div class="single-blog-meta">
                                    <h2>{{ $blog->title }}</h2>
                                    <div class="posting-info">
                                        <a href="#">{{ bdDate($blog->created_at) }}</a> &#x2022; Posted by: <a
                                            href="#">{{ $blog->user->name }}</a>
                                    </div>
                                </div>
                            </header>
                            <section class="blog-details">
                                {!! $blog->text !!}
                            </section>
                        </article>
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
