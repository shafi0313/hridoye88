<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// ModelHasRole removed - no longer using spatie/laravel-permission
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        // Authorization removed - implement your own logic if needed
        // if ($error = $this->authorize('member-manage')) {
        //     return $error;
        // }
        $datum = User::wherePermission(2)->get();

        return view('admin.member.index', compact('datum'));
    }

    public function create()
    {
        if ($error = $this->authorize('member-add')) {
            return $error;
        }
        $professions = Profession::all();

        return view('admin.member.create', compact('professions'));
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('member-add')) {
            return $error;
        }
        // return $request;
        $data = $request->validate([
            'name' => 'required|max:100',
            'name_b' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'school' => 'required|max:100',
            'profession' => 'nullable|exists:professions,id',
            'address' => 'required|max:255',
            'pre_address' => 'required|max:255',
            'blood' => 'nullable|max:10',
            'fb' => 'nullable|max:80',
            'image' => 'nullable|file|mimes:jpeg,png,jpg',
            'cv' => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp,svg|max:2048',
            'password' => 'required|confirmed',
        ]);
        $data['permission'] = 2;
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'users', [null, null]);
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = 'cv'.rand(0, 10000).'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path('uploads/images/users'), $cvName);
            $data['cv'] = $cvName;
        }

        try {
            $member = User::create($data);
            // Role assignment removed - no longer using spatie/laravel-permission
            toast('Success!', 'success');
        } catch (\Exception $ex) {
            toast('error', 'error');
        }

        return back();
    }

    public function edit($id)
    {
        if ($error = $this->authorize('member-edit')) {
            return $error;
        }
        $data = User::find($id);
        $professions = Profession::all();

        return view('admin.member.edit', compact('data', 'professions'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('member-edit')) {
            return $error;
        }
        $member = User::find($id);
        // return $request;
        $data = $request->validate([
            'name' => 'required|max:100',
            'name_b' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required',
            'school' => 'required|max:100',
            'profession' => 'nullable|exists:professions,id',
            'address' => 'required|max:255',
            'pre_address' => 'required|max:255',
            'blood' => 'nullable|max:10',
            'fb' => 'nullable|max:80',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,pdf',
            'cv' => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data['permission'] = 2;

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        
        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'users', [null, null], $member->image);
        }

        if ($request->hasFile('cv')) {
            // Delete old CV if exists
            if (! empty($member->cv) && file_exists(public_path('uploads/images/users/'.$member->cv))) {
                unlink(public_path('uploads/images/users/'.$member->cv));
            }

            // Handle new CV upload
            $cv = $request->file('cv');
            $cvName = 'cv'.rand(0, 10000).'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path('uploads/images/users'), $cvName);
            $data['cv'] = $cvName;
        }

        try {
            $member->update($data);
            // Role assignment removed - no longer using spatie/laravel-permission
            toast('success', 'Success');

            // Alert::success('Success!');
            return redirect()->route('admin.member.index');
        } catch (\Exception $ex) {
            return $ex->getMessage();
            toast('error', 'error');

            return redirect()->back();
        }
    }
}
