<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layout;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('slider-manage')) {
            return $error;
        }
        $sliders = Slider::whereNotIn('id',[1])->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        if ($error = $this->authorize('slider-add')) {
            return $error;
        }
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('slider-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'text' => 'sometimes',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');

            $path = public_path('/uploads/images/slider/');
            if(!file_exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            // $imageName = "slider".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            // $destinationPath = public_path('uploads/images/slider/');
            // $img = Image::make($image->getRealPath());
            // $img->resize(1919, 1000)->save($destinationPath.'/'.$imageName);
            // $data['image'] = $imageName;

            $image = $request->file('image');
            $imageName = "slider".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/slider/',$imageName);
            $data['image'] = $imageName;
        }

        try {
            Slider::create($data);
            toast('success', 'Success!');
            return redirect()->route('admin.slider.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('slider-edit')) {
            return $error;
        }
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('slider-edit')) {
            return $error;
        }
        $data = $this->validate($request, [
            'text' => 'sometimes',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('image')){
            $files = Slider::where('id', $id)->first();
            $path =  public_path('uploads/images/slider/'.$files->image);
            file_exists($path)?unlink($path):false;
            $image = $request->file('image');
            $imageName = "slider".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $path = public_path('/uploads/images/slider/');
            if(!file_exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $destinationPath = public_path('uploads/images/slider/');
            $img = Image::make($image->getRealPath());
            $img->resize(1919, 1000)->save($destinationPath.'/'.$imageName);
            $data['image'] = $imageName;
        }

        try {
            Slider::find($id)->update($data);
            toast('success', 'Success!');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $path =  public_path('uploads/images/slider/'.$slider->image);
        if(file_exists($path)){
            unlink($path);
            $slider->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }else{
            $slider->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }
    }
}
