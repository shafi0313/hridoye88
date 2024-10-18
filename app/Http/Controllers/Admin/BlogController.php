<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('blog-manage')) {
            return $error;
        }
        $blogs = Blog::paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        if ($error = $this->authorize('blog-add')) {
            return $error;
        }
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('blog-add')) {
            return $error;
        }
        $data = $request->validate([
            'title' => 'required|max:200',
            'text' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        DB::beginTransaction();

        $image_name = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = "blog_".rand(0,1000000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/blog/',$image_name);
            $data['image'] = $image_name;
        }
        $data['user_id'] = auth()->user()->id;

        try{
            Blog::create($data);
            DB::commit();
            toast('success','Success');
            return redirect()->route('admin.blog.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('error','Error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('blog-edit')) {
            return $error;
        }
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('blog-edit')) {
            return $error;
        }
        $data = $request->validate([
            'title' => 'required|max:200',
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        DB::beginTransaction();

        $image_name = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = "blog_".rand(0,1000000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/blog/',$image_name);
            $data['image'] = $image_name;
        }
        $data['user_id'] = auth()->user()->id;

        try{
            Blog::find($id)->update($data);
            DB::commit();
            toast('success','Success');
            return redirect()->route('admin.blog.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('error','Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('blog-delete')) {
            return $error;
        }
        $blog = Blog::find($id);
        $path =  public_path('uploads/images/blog/'.$blog->image);
        if(file_exists($path)){
            unlink($path);
            $blog->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }else{
            $blog->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }
    }
}
