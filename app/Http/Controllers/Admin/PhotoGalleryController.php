<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryCat;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $galleries = PhotoGallery::all();

        return view('admin.photo_gallery.index', compact('galleries'));
    }

    public function create()
    {
        $galleryCats = GalleryCat::all();

        return view('admin.photo_gallery.create', compact('galleryCats'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'gallery_cat_id' => 'required',
            'title' => 'sometimes',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $path = public_path('/uploads/images/gallery/');
            if (! file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $image = $request->file('image');
            $imageName = 'gallery' . rand(0, 10000) . '.' . $image->getClientOriginalExtension();
            $request->image->move('uploads/images/gallery/', $imageName);
            $data['image'] = $imageName;
        }

        try {
            PhotoGallery::create($data);
            Alert::success('Success', 'Successfully Added');
        } catch (\Exception $e) {
            Alert::error('Error', 'Oops! Something went wrong. Please try again.');
        }
        return back();
    }

    public function edit($id)
    {
        $data = PhotoGallery::find($id);
        $galleryCats = GalleryCat::all();

        return view('admin.photo_gallery.edit', compact('data','galleryCats'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'sometimes',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $files = PhotoGallery::where('id', $id)->first();
            $path = public_path('uploads/images/gallery/' . $files->image);
            file_exists($path) ? unlink($path) : false;

            $image = $request->file('image');
            $imageName = 'gallery' . rand(0, 10000) . '.' . $image->getClientOriginalExtension();
            $request->image->move('uploads/images/gallery/', $imageName);
            $data['image'] = $imageName;
        }

        try {
            PhotoGallery::find($id)->update($data);
            Alert::success('Success', 'Successfully Updated');
        } catch (\Exception $e) {
            Alert::error('Error', 'Oops! Something went wrong. Please try again.');
        }
        return back();
    }

    public function destroy($id)
    {
        $data = PhotoGallery::find($id);
        $path = public_path('uploads/images/gallery/' . $data->image);
        if (file_exists($path)) {
            unlink($path);
        }

        try {
            $data->delete();
            Alert::success('Success', 'Successfully Deleted');
        } catch (\Exception $e) {
            Alert::error('Error', 'Oops! Something went wrong. Please try again.');
        }
        return back();
    }
}

