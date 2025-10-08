<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $datum = User::wherePermission(2)->get();

        return view('admin.member.index', compact('datum'));
    }

    public function create()
    {
        $professions = Profession::all();

        return view('admin.member.create', compact('professions'));
    }

    public function store(Request $request)
    {
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
            User::create($data);
            toast('Success!', 'success');
        } catch (\Exception $ex) {
            toast('error', 'error');
        }

        return back();
    }

    public function edit($id)
    {
        $data = User::find($id);
        $professions = Profession::all();

        return view('admin.member.edit', compact('data', 'professions'));
    }

    public function update(Request $request, $id)
    {
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

        $member = User::find($id);

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'users', [null, null], $member->image);
        }

        if ($request->hasFile('cv')) {
            if (! empty($member->cv) && file_exists(public_path('uploads/images/users/'.$member->cv))) {
                unlink(public_path('uploads/images/users/'.$member->cv));
            }

            $cv = $request->file('cv');
            $cvName = 'cv'.rand(0, 10000).'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path('uploads/images/users'), $cvName);
            $data['cv'] = $cvName;
        }

        try {
            $member->update($data);
            toast('success', 'Success');
        } catch (\Exception $ex) {
            toast('error', 'error');
        }
        return back();
    }
}
