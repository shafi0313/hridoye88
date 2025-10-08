<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::whereIn('permission', ['0', '1', '2']);

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('permission', function ($row) {
                    $permission = (int) $row->permission;

                    return config('var.permissions')[$permission] ?? 'N/A';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('image', function ($row) {
                    $src = imagePath('users', $row->image);

                    return '<img src="'.$src.'" height="60px" style="border-radius: 5px;">';
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
        $professions = Profession::select('id', 'name')->get();

        return view('admin.user.index', compact('professions'));
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'users', [300, 300]);
        }

        try {
            User::create($data);

            return response()->json(['message' => 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
        }
    }

    public function edit(Request $request, User $user)
    {
        if ($request->ajax()) {
            $professions = Profession::select('id', 'name')->get();
            $modal = view('admin.user.edit')->with(['user' => $user, 'professions' => $professions])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'users', [300, 300], $user->image);
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
        try {
            imgUnlink('users', $user->image);
            $user->delete();

            return response()->json(['message' => 'Data Successfully Deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('app.oops')], 500);
        }
    }
}

