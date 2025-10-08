<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MessageController extends Controller
{
    public function edit($id)
    {
        $message = Slider::find($id);

        return view('admin.message.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $files = Slider::find($id);
            $path = public_path('uploads/images/message/'.$files->image);
            file_exists($path) ? unlink($path) : false;
            $image = $request->file('image');
            $imageName = 'message'.rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $path = public_path('/uploads/images/message/');
            if (! file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $request->image->move('uploads/images/message/', $imageName);
            $data['image'] = $imageName;
        }

        try {
            Slider::find($id)->update($data);
            toast('success', 'Success!');

            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');

            return back();
        }
    }
}

