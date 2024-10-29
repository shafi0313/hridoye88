<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCat;
use App\Models\Profession;
use Illuminate\Http\Request;

class GalleryCatController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('gallery-category-manage')) {
            return $error;
        }
        $galleryCats = GalleryCat::all();

        return view('admin.gallery_cat.index', compact('galleryCats'));
    }

    public function create()
    {
        if ($error = $this->authorize('gallery-category-add')) {
            return $error;
        }

        return view('admin.gallery_cat.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('gallery-category-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        try {
            GalleryCat::create($data);
            toast('Success!', 'success');

            return redirect()->route('admin.gallery-cat.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');

            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('gallery-category-edit')) {
            return $error;
        }
        $profession = Profession::find($id);

        return view('admin.profession.edit', compact('profession'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('gallery-category-edit')) {
            return $error;
        }
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        try {
            Profession::find($id)->update($data);
            toast('success', 'Success!');

            return redirect()->route('admin.profession.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');

            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('gallery-category-delete')) {
            return $error;
        }
        try {
            Profession::find($id)->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        } catch (\Exception $ex) {
            toast('Failed', 'error');

            return redirect()->back();
        }
    }
}
