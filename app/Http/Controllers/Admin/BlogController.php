<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:200',
            'text' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'blog_'.rand(0, 1000000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/blog/', $image_name);
            $data['image'] = $image_name;
        }
        $data['user_id'] = auth()->user()->id;

        try {
            Blog::create($data);
            toast('success', 'Success');

            return redirect()->route('admin.blog.index');
        } catch (\Exception $ex) {
            toast('error', 'Error');

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:200',
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'blog_'.rand(0, 1000000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/blog/', $image_name);
            $data['image'] = $image_name;
        }
        $data['user_id'] = auth()->user()->id;

        try {
            Blog::find($id)->update($data);
            toast('success', 'Success');

            return redirect()->route('admin.blog.index');
        } catch (\Exception $ex) {
            toast('error', 'Error');

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $path = public_path('uploads/images/blog/'.$blog->image);
        if (file_exists($path)) {
            unlink($path);
            $blog->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        } else {
            $blog->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        }
    }
}

