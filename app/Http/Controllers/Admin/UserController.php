<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Remove role-based authorization - implement your own logic if needed
        if ($request->ajax()) {
            $users = User::whereIn('permission', ['0', '1', '2']);

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('permission', function ($row) {
                    $permission = (int) $row->permission;

                    return match ($permission) {
                        0 => 'No Login',
                        1 => 'Super Admin',
                        2 => 'Admin',
                        3 => 'User',
                        default => 'N/A',
                    };
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('image', function ($row) {
                    $src = imagePath('user', $row->image);

                    return '<img src="' . $src . '" width="80px">';
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.user.edit', $row->id), 'row' => $row]);
                    $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.user.destroy', $row->id), 'row' => $row, 'src' => 'dt']);

                    return $btn;
                })
                ->rawColumns(['action', 'image', 'created_at'])
                ->make(true);
        }

        return view('admin.user.index');
    }

    public function store(UserStoreRequest $request)
    {
        // Remove role-based authorization - implement your own logic if needed
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = imgProcessAndStore($request->image, 'user', [300, 300]);
        }

        try {
            $user = User::create($data);
            return response()->json(['message' => 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
        }
    }

    public function edit(Request $request, User $user)
    {
        // Remove role-based authorization - implement your own logic if needed
        if ($request->ajax()) {
            $modal = view('admin.user.edit')->with(['user' => $user])->render();
            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        // Remove role-based authorization - implement your own logic if needed
        $data = $request->validated();
        if (isset($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $image = User::find($user->id)->image;
        if ($request->hasFile('image')) {
            $data['image'] = imgProcessAndStore($request->image, 'user', [300, 300],  $image);
        }

        try {
            $user->update($data);
            return response()->json(['message' => 'Data Successfully Updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
        }
    }

    public function destroy(User $user)
    {
        // Remove role-based authorization - implement your own logic if needed
        try {
            $user->delete();
            return response()->json(['message' => 'Data Successfully Deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
        }
    }
}
