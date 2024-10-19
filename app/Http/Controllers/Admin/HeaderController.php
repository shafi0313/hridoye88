<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HeaderController extends Controller
{
    public function index()
    {
        $headers = Header::all();
        return view('admin.header.index', compact('headers'));
    }

    public function textStore(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        $data['type'] = 'text';

        try {
            Header::create($data);
            Alert::success('The information has been inserted');
        } catch (\Exception $ex) {
            Alert::error('Opps. Something went wrong, please try again');
        }
        return back();
    }

    public function socialStore(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|max:191',
            'link' => 'required|max:191',
        ]);
        $data['type'] = 'social';

        try {
            Header::create($data);
            Alert::success('The information has been inserted successfully');
        } catch (\Exception $ex) {
            Alert::error('Opps. Something went wrong, please try again');
        }
        return back();
    }

    public function edit($id)
    {
        $header = Header::find($id);
        return view('admin.header.edit', compact('header'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'icon' => 'required|max:191',
            'link' => 'nullable|max:191',
            'content' => 'nullable|max:191',
        ]);

        try {
            Header::find($id)->update($data);
            Alert::success('The information has been inserted updated');
            return redirect()->route('admin.header.index');
        } catch (\Exception $ex) {
            Alert::error('Opps. Something went wrong, please try again');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Header::find($id)->delete();
            Alert::success('The information has been deleted');
        } catch (\Exception $ex) {
            Alert::error('Opps. Something went wrong, please try again');
        }
        return back();
    }
}
