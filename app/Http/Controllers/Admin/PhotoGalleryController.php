<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layout;
use App\Models\GalleryCat;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('photo-gallery-manage')) {
            return $error;
        }
        $galleries = PhotoGallery::all();
        return view('admin.photo_gallery.index', compact('galleries'));
    }

    public function create()
    {
        if ($error = $this->authorize('photo-gallery-add')) {
            return $error;
        }
        $galleryCats = GalleryCat::all();
        return view('admin.photo_gallery.create', compact('galleryCats'));
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('photo-gallery-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'gallery_cat_id' => 'required',
            'title' => 'sometimes',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);
        if($request->hasFile('image')){
            $path = public_path('/uploads/images/gallery/');
            if(!file_exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $image = $request->file('image');
            $imageName = "gallery".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/gallery/',$imageName);
            $data['image'] = $imageName;
        }

        try {
            PhotoGallery::create($data);
            toast('success', 'Success!');
            return redirect()->route('admin.photo-gallery.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('photo-gallery-edit')) {
            return $error;
        }
        $data = PhotoGallery::find($id);
        return view('admin.photo_gallery.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('photo-gallery-edit')) {
            return $error;
        }
        $data = $this->validate($request, [
            'title' => 'sometimes',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('image')){
            $files = PhotoGallery::where('id', $id)->first();
            $path =  public_path('uploads/images/gallery/'.$files->image);
            file_exists($path)?unlink($path):false;

            $image = $request->file('image');
            $imageName = "gallery".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/gallery/',$imageName);
            $data['image'] = $imageName;
        }

        try {
            PhotoGallery::find($id)->update($data);
            toast('success', 'Success!');
            return redirect()->route('admin.photoGallery.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('photo-gallery-delete')) {
            return $error;
        }
        $data = PhotoGallery::find($id);
        $path =  public_path('uploads/images/gallery/'.$data->image);
        if(file_exists($path)){
            unlink($path);
            $data->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }else{
            $data->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }
    }
}
