<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
