<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Event;
use App\Models\Header;
use App\Models\Slider;
use App\Models\GalleryCat;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::whereStatus(1)->whereNotIn('id',[1])->get();
        $message = Slider::find(1);
        $events = Event::all();
        $galleryCats = GalleryCat::all();
        $photoGalleries = PhotoGallery::all();
        $videoGalleries = VideoGallery::all();
        $galleries = collect(array_merge($photoGalleries->toArray(), $videoGalleries->toArray()))->sortBy('id');
        $socials = Header::whereType('social')->get();
        $blogs = Blog::whereIs_published(1)->limit(6)->get();
        $members = User::wherePermission(2)->count();

        return view('frontend.index', compact('sliders','message','events','galleryCats','photoGalleries','videoGalleries','socials','blogs','members'));
    }
}
