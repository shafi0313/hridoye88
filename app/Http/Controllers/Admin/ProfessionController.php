<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layout;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::all();
        return view('admin.profession.index', compact('professions'));
    }

    public function create()
    {
        if ($error = $this->authorize('profession-add')) {
            return $error;
        }
        return view('admin.profession.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('profession-edit')) {
            return $error;
        }
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        try {
            Profession::create($data);
            toast('success', 'Success!');
            return redirect()->route('admin.profession.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('profession-edit')) {
            return $error;
        }
        $profession = Profession::find($id);
        return view('admin.profession.edit', compact('profession'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('profession-edit')) {
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
        if ($error = $this->authorize('profession-delete')) {
            return $error;
        }
        try{
            Profession::find($id)->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }catch (\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }
}
