<?php

namespace App\Http\Controllers\Admin;

use App\Models\Literature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreLiteratureRequest;
use App\Http\Requests\UpdateLiteratureRequest;

class LiteratureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($error = $this->authorize('literature-manage')) {
            return $error;
        }

        if ($request->ajax()) {
            $literatures = Literature::query();
            return DataTables::of($literatures)
                ->addIndexColumn()
                ->addColumn('cover_img', function ($row) {
                    $path = imagePath('book', $row->cover_img);
                    return '<img src="' . $path . '" width="70px" alt="image">';
                })
                ->addColumn('back_cover_img', function ($row) {
                    $path = imagePath('book', $row->back_cover_img);
                    return '<img src="' . $path . '" width="70px" alt="image">';
                })
                ->addColumn('published_at', function ($row) {
                    return bdDate($row->published_at);
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('literature-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.literatures.edit', $row->id), 'row' => $row]);
                    }
                    if (userCan('literature-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.literatures.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['cover_img', 'back_cover_img', 'action'])
                ->make(true);
        }
        return view('admin.literature.index');
    }

    function status(Literature $literature)
    {
        if ($error = $this->authorize('literature-edit')) {
            return $error;
        }
        $literature->is_active = $literature->is_active  == 1 ? 0 : 1;
        try {
            $literature->save();
            return response()->json(['message' => 'The status has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLiteratureRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('cover_img')) {
            $data['cover_img'] = imgProcessAndStore($request->cover_img, 'book', [null, null]);
        }
        if ($request->hasFile('back_cover_img')) {
            $data['back_cover_img'] = imgProcessAndStore($request->back_cover_img, 'book', [null, null]);
        }

        try {
            Literature::create($data);
            return response()->json(['message' => 'The information has been inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Literature $literature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Literature $literature)
    {
        if ($request->ajax()) {
            $modal = view('admin.literature.edit')->with(['literature' => $literature])->render();
            return response()->json(['modal' => $modal], 200);
        }
        return abort(500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLiteratureRequest $request, Literature $literature)
    {
        $data = $request->validated();
        $image = $literature->image;
        if ($request->hasFile('image')) {
            $data['image'] = imgProcessAndStore($request->image, 'slider', [680, 548], $image);
        }

        $image2 = $literature->image2;
        if ($request->hasFile('image2')) {
            $data['image2'] = imgProcessAndStore($request->image2, 'slider', [562, 453], $image2);
        }

        try {
            $literature->update($data);
            return response()->json(['message' => 'The information has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Literature $literature)
    {
        try {
            imgUnlink('book', $literature->cover_img);
            imgUnlink('book', $literature->back_cover_img);
            $literature->delete();
            return response()->json(['message' => 'The information has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }
}
