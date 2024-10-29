<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\ModelHasRole;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('user-manage')) {
            return $error;
        }
        if ($request->ajax()) {
            $users = User::whereIn('permission', ['0', '1', '2']);

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('permission', function ($row) {
                    $permission = (int) $row->permission;

                    return match ($permission) {
                        0 => 'No Login',
                        1 => 'Admin',
                        2 => 'User',
                        default => 'N/A',
                    };
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('image', function ($row) {
                    $src = asset('uploads/images/users/'.$row->image);

                    return '<img src="'.$src.'" width="100px">';
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
        $roles = Role::all();

        return view('admin.user.index', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        if ($error = $this->authorize('user-add')) {
            return $error;
        }
        $data = $request->validated();
        $data['type'] = '1';
        $data['image'] = imageStore($request, 'user', 'uploads/images/users/');

        try {
            $user = User::create($data);
            if ($request->permission) {
                $permission = [
                    'role_id' => $request->permission,
                    'model_type' => "App\Models\User",
                    'model_id' => $user->id,
                ];
                ModelHasRole::create($permission);
            }

            return response()->json(['message' => 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function edit(Request $request, User $user)
    {
        if ($error = $this->authorize('user-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $roles = Role::all();
            $modelHasRole = ModelHasRole::whereModel_id($user->id)->first()->role_id;
            $modal = view('admin.user.edit')->with(['user' => $user, 'roles' => $roles, 'modelHasRole' => $modelHasRole])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if ($error = $this->authorize('user-add')) {
            return $error;
        }
        $data = $request->validated();
        if (isset($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $image = User::find($user->id)->image;
        if ($request->hasFile('image')) {
            $data['image'] = imageUpdate($request, 'user', 'uploads/images/users/', $image);
        }

        try {
            $user->update($data);
            if ($request->permission) {
                $permission = [
                    'role_id' => $request->permission,
                    'model_type' => "App\Models\User",
                    'model_id' => $user->id,
                ];
                ModelHasRole::whereModel_id($user->id)->update($permission);
            }

            return response()->json(['message' => 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }

        // if($request->hasFile('image')){
        //     $files = User::where('id', $id)->first();
        //     $path =  public_path('uploads/images/users/'.$files->image);
        //     file_exists($path) ? unlink($path) : false;

        //     $path = public_path().'/uploads/images/users/';
        //     !file_exists($path) ?? File::makeDirectory($path, 0777, true, true);

        //     $image = $request->file('image');
        //     $image_name = "admin_user_".rand(0,1000).'.'.$image->getClientOriginalExtension();
        //     $request->image->move('uploads/images/users/',$image_name);

        //     $data['image'] = $image_name;
        // }
    }

    public function destroy(User $user)
    {
        if ($error = $this->authorize('user-delete')) {
            return $error;
        }
        try {
            $user->delete();

            return response()->json(['message' => 'Data Successfully Deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}
