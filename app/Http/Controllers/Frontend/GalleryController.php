<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function photoGallery()
    {
        $galleries = PhotoGallery::latest()->get();
        return view('frontend.photo_gallery', compact('galleries'));
    }
    public function videoGallery()
    {
        $galleries = VideoGallery::latest()->get();
        return view('frontend.video_gallery', compact('galleries'));
    }
}
