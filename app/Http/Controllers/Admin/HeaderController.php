<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use App\Models\Layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('header-manage')) {
            return $error;
        }
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
        DB::beginTransaction();

        try{
            Header::create($data);
            DB::commit();
            toast('success','Success');
            return back();
        }catch(\Exception $ex){
            return $ex->getMessage();
            DB::rollBack();
            toast('error','Error');
            return redirect()->back();
        }
    }

    public function socialStore(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|max:191',
            'link' => 'required|max:191',
        ]);
        $data['type'] = 'social';
        DB::beginTransaction();

        try{
            Header::create($data);
            DB::commit();
            toast('success','Success');
            return back();
        }catch(\Exception $ex){
            return $ex->getMessage();
            DB::rollBack();
            toast('error','Error');
            return redirect()->back();
        }
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
        DB::beginTransaction();

        try{
            Header::find($id)->update($data);
            DB::commit();
            toast('success','Success');
            return redirect()->route('admin.header.index');
        }catch(\Exception $ex){
            return $ex->getMessage();
            DB::rollBack();
            toast('error','Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try{
            Header::find($id)->delete();
            toast('Success!','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }
}
