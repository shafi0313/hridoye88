<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::whereIs_published(1)->paginate(6);

        return view('frontend.blog', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        return view('frontend.blog_show', compact('blog'));
    }
}
