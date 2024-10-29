<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit($id)
    {
        if ($error = $this->authorize('about-manage')) {
            return $error;
        }
        $about = About::find($id);

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'text' => 'required',
        ]);

        try {
            About::find($id)->update($data);
            toast('Success', 'success');

            return back();
        } catch (\Exception $e) {
            toast('error', 'Error');

            return back();
        }
    }
}
