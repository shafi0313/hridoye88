<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCat;
use App\Models\Layout;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $galleries = VideoGallery::all();

        return view('admin.video_gallery.index', compact('galleries'));
    }

    public function create()
    {
        $galleryCats = GalleryCat::all();

        return view('admin.video_gallery.create', compact('galleryCats'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'gallery_cat_id' => 'required',
            'title' => 'sometimes',
            'type' => 'required',
            'link' => 'sometimes',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);

        if ($request->type == 'File' && $request->hasFile('link')) {
            $path = public_path('/uploads/images/gallery/');
            if (! file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $image = $request->file('link');
            $imageName = 'gallery'.rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->link->move('uploads/images/gallery/', $imageName);
            $data['link'] = $imageName;
        }

        try {
            VideoGallery::create($data);
            toast('success', 'Success!');

            return redirect()->route('admin.video-gallery.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');

            return back();
        }
    }

    public function edit($id)
    {
        $layout = Layout::where('user_id', auth()->user()->id)->first(['submit_btn']);
        $data = VideoGallery::find($id);

        return view('admin.video_gallery.edit', compact('layout', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'sometimes',
            'type' => 'required',
            'link' => 'sometimes',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);

        if ($request->type == 'File' && $request->hasFile('link')) {
            $files = VideoGallery::where('id', $id)->first();
            $path = public_path('uploads/images/gallery/'.$files->link);
            file_exists($path) ? unlink($path) : false;

            $image = $request->file('link');
            $imageName = 'gallery'.rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->link->move('uploads/images/gallery/', $imageName);
            $data['link'] = $imageName;
        }

        try {
            VideoGallery::find($id)->update($data);
            toast('success', 'Success!');

            return redirect()->route('admin.videoGallery.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');

            return back();
        }
    }

    public function destroy($id)
    {
        $data = VideoGallery::find($id);
        $path = public_path('uploads/images/gallery/'.$data->link);
        if (file_exists($path)) {
            unlink($path);
            $data->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        } else {
            $data->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        }
    }
}

