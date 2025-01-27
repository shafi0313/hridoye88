<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Event;
use App\Models\Header;
use App\Models\Slider;
use App\Models\Literature;
use App\Models\Humanitarian;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Http\Controllers\Controller;

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
        $data['blogs'] = Blog::with('user:id,name,image')->whereIsPublished(1)->limit(6)->get();
        $data['humanitarians'] = Humanitarian::with('user:id,name,image')->whereIsActive(1)->limit(6)->get();
        $data['members'] = User::wherePermission(2)->count();
        $data['literatures'] = Literature::latest()->limit(4)->get();

        return view('frontend.index', $data);
    }
}
