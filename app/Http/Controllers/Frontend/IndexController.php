<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Header;
use App\Models\PhotoGallery;
use App\Models\Slider;
use App\Models\User;
use App\Models\VideoGallery;

class IndexController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::whereStatus(1)->whereNotIn('id', [1])->get();
        $data['message'] = Slider::find(1);
        $data['events'] = Event::where('date', '>=', now())->get();
        $data['photoGalleries'] = PhotoGallery::select('id', 'image')->take(8)->get();
        $data['videoGalleries'] = VideoGallery::select('id', 'type', 'link')->whereType('Youtube')->take(6)->get();
        $data['socials'] = Header::whereType('social')->get();
        $data['blogs'] = Blog::whereIs_published(1)->limit(6)->get();
        $data['members'] = User::wherePermission(2)->count();

        return view('frontend.index', $data);
    }
}
