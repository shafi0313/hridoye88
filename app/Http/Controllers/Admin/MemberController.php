<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('member-manage')) {
            return $error;
        }
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
            'profession' => 'nullable|max:80',
            'address' => 'required|max:255',
            'pre_address' => 'required|max:255',
            'blood' => 'nullable|max:10',
            'fb' => 'nullable|max:80',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'cv' => 'nullable|max:1024',
            'password' => ['required', 'confirmed', Password::min(6),
                // ->letters()
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised()
            ],
        ]);
        $data['permission'] = 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'user'.rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/users/'.$imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = 'user'.rand(0, 10000).'.'.$cv->getClientOriginalExtension();
            $request->cv->move('uploads/images/users/'.$cvName);
            $data['cv'] = $cvName;
        }

        try {
            User::create($data);
            toast('Success!', 'success');

            // Alert::success('Success!');
            return redirect()->route('admin.member.index');
        } catch (\Exception $ex) {
            return $ex->getMessage();
            toast('error', 'error');

            return redirect()->back();
        }
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
        // return $request;
        $data = $request->validate([
            'name' => 'required|max:100',
            'name_b' => 'required|max:100',
            // 'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'school' => 'required|max:100',
            'profession' => 'nullable|max:80',
            'address' => 'required|max:255',
            'pre_address' => 'required|max:255',
            'blood' => 'nullable|max:10',
            'fb' => 'nullable|max:80',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'cv' => 'nullable|max:1024',
            // 'password' => ['required', 'confirmed', Password::min(6)
            // ->letters()
            // ->mixedCase()
            // ->numbers()
            // ->symbols()
            // ->uncompromised()
            // ],
        ]);
        // $data['password'] = bcrypt($request->password);
        $data['permission'] = 2;
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'user'.rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/users/'.$imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = 'user'.rand(0, 10000).'.'.$cv->getClientOriginalExtension();
            $request->cv->move('uploads/images/users/'.$cvName);
            $data['cv'] = $cvName;
        }

        try {
            User::find($id)->update($data);
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
