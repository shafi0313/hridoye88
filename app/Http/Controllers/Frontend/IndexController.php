<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Event;
use App\Models\Header;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Literature;
use App\Models\Humanitarian;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $data['notices'] = Notice::where('date', '>=', Carbon::now()->subDays(10))->get();
        $data['sliders'] = Slider::whereStatus(1)->whereNotIn('id', [1])->get();
        $data['message'] = Slider::find(1);
        $data['events'] = Event::where('date', '>=', now())->get();
        $data['photoGalleries'] = PhotoGallery::select('id', 'image')->take(8)->get();
        $data['videoGalleries'] = VideoGallery::select('id', 'type', 'link')->whereType('Youtube')->take(6)->get();
        $data['socials'] = Header::whereType('social')->get();
        $data['blogs'] = Blog::with('user:id,name,image')->whereIsPublished(1)->limit(6)->get();
        $data['humanitarians'] = Humanitarian::with('user:id,name,image')->whereIsActive(1)->limit(6)->get();
        $data['members'] = User::with('designation')->whereNot('email', 'dev.admin@shafi95.com')->count();
        $data['literatures'] = Literature::latest()->limit(4)->get();

        return view('frontend.index', $data);
    }
}
