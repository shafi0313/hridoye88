<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SubMenuController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => 'required|numeric',
            'name' => 'required|max:80',
            'name_b' => 'required|max:80',
            'is_published' => 'required',
            'text' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        DB::beginTransaction();

        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'menu_'.rand(0, 1000000).'.'.$image->getClientOriginalExtension();
            $path = public_path().'/uploads/images/menu';
            if (! file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $request->image->move('uploads/images/menu/', $image_name);
            $data['image'] = $image_name;
        }

        try {
            SubMenu::create($data);
            DB::commit();
            toast('success', 'Success');

            return back();
        } catch (\Exception $ex) {
            return $ex->getMessage();
            DB::rollBack();
            toast('error', 'Error');

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $menu = SubMenu::find($id);
        $path = public_path('uploads/images/menu/'.$menu->image);
        if (file_exists($path)) {
            unlink($path);
            $menu->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        } else {
            $menu->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        }
    }
}

