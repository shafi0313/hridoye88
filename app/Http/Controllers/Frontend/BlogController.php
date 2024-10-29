<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user:id,name,image')->whereIsPublished(1)->paginate(12);

        return view('frontend.blog', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::with('user:id,name,image')->find($id);

        return view('frontend.blog_show', compact('blog'));
    }
}
