<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHumanitarianRequest;
use App\Http\Requests\UpdateHumanitarianRequest;
use App\Models\Humanitarian;
use App\Traits\SummerNoteTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HumanitarianController extends Controller
{
    use SummerNoteTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($error = $this->authorize('humanitarian-assistance-manage')) {
            return $error;
        }

        if ($request->ajax()) {
            $notices = Humanitarian::query()->latest();

            return DataTables::of($notices)
                ->addIndexColumn()
                ->addColumn('content', function ($row) {
                    return '<div>'.$row->content.'</div>';
                })
                ->addColumn('date', function ($row) {
                    return bdDate($row->date);
                })
                ->addColumn('image', function ($row) {
                    return '<img src="'.imagePath('humanitarian', $row->image).'" width="80px">';
                })
                ->addColumn('is_active', function ($row) {
                    if (userCan('humanitarian-assistance-edit')) {
                        return view('button', ['type' => 'is_active', 'route' => route('admin.humanitarian_assistance.is_active', $row->id), 'row' => $row->is_active]);
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('humanitarian-assistance-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.humanitarian-assistance.edit', $row->id), 'row' => $row]);
                    }
                    if (userCan('humanitarian-assistance-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.humanitarian-assistance.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    }

                    return $btn;
                })
                ->rawColumns(['content', 'image', 'is_active', 'action'])
                ->make(true);
        }

        return view('admin.humanitarian-assistance.index');
    }

    public function status(Humanitarian $humanitarianAssistance)
    {
        if ($error = $this->authorize('humanitarian-assistance-edit')) {
            return $error;
        }
        $humanitarianAssistance->is_active = $humanitarianAssistance->is_active == 1 ? 0 : 1;
        try {
            $humanitarianAssistance->save();

            return response()->json(['message' => 'The status has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHumanitarianRequest $request)
    {
        if ($error = $this->authorize('humanitarian-assistance-add')) {
            return $error;
        }
        $data = $request->validated();
        $data['user_id'] = user()->id;
        $data['content'] = $this->summerNoteStore($request->content, 'content');

        if ($request->hasFile('image')) {
            $data['image'] = imgProcessAndStore($request->image, 'humanitarian');
        }

        try {
            Humanitarian::create($data);

            return response()->json(['message' => 'The information has been inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);

            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    public function edit(Request $request, Humanitarian $humanitarianAssistance)
    {
        if ($error = $this->authorize('humanitarianAssistance-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $modal = view('admin.humanitarian-assistance.edit')->with(['humanitarianAssistance' => $humanitarianAssistance])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHumanitarianRequest $request, Humanitarian $humanitarianAssistance)
    {
        if ($error = $this->authorize('humanitarian-assistance-edit')) {
            return $error;
        }
        $data = $request->validated();
        $data['content'] = $this->summerNoteStore($request->content, 'humanitarian');

        if ($request->hasFile('image')) {
            $data['image'] = imgProcessAndStore($request->image, 'humanitarian', [null, null], $humanitarianAssistance->image);
        }

        // if ($request->hasFile('file')) {
        //     $fileName = uniqid(10).'.'.$request->file->getClientOriginalExtension();
        //     // $type = $request->file->getClientMimeType();
        //     // $size = $request->file->getSize();
        //     $request->file->move(public_path('/uploads/images/humanitarian/'), $fileName);
        //     imgUnlink('notice', $humanitarianAssistance->file);
        //     $data['file'] = $fileName;
        // }

        try {
            $humanitarianAssistance->update($data);

            return response()->json(['message' => 'The information has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Humanitarian $humanitarianAssistance)
    {
        if ($error = $this->authorize('humanitarian-assistance-delete')) {
            return $error;
        }
        $this->summerNoteAllImageDestroy($humanitarianAssistance->content);

        try {
            imgUnlink('humanitarian', $humanitarianAssistance->image);
            $humanitarianAssistance->delete();

            return response()->json(['message' => 'The information has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }
}
