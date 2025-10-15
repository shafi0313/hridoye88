<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    // public function index()
    // {
    //     $blogs = Blog::with('user:id,name,image')->whereIsPublished(1)->paginate(12);

    //     return view('frontend.blog', compact('blogs'));
    // }

    public function show($id)
    {
        $notice = Notice::with('user:id,name')->findOrFail($id);

        return view('frontend.notice_show', compact('notice'));
    }
}
