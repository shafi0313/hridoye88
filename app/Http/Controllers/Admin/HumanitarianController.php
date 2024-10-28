<?php

namespace App\Http\Controllers\Admin;

use App\Models\Humanitarian;
use Illuminate\Http\Request;
use App\Traits\SummerNoteTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHumanitarianRequest;
use App\Http\Requests\UpdateHumanitarianRequest;

class HumanitarianController extends Controller
{
    use SummerNoteTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($error = $this->authorize('notice-manage')) {
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
                ->addColumn('file', function ($row) {
                    return '<a href="'.asset('uploads/images/notice/'.$row->file).'" download="'.$row->file.'">Download File</a>';
                })
                ->addColumn('is_active', function ($row) {
                    if (userCan('notice-edit')) {
                        return view('button', ['type' => 'is_active', 'route' => route('admin.notices.is_active', $row->id), 'row' => $row->is_active]);
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= view('button', ['type' => 'ajax-show', 'route' => route('admin.notices.show', $row->id), 'row' => $row]);

                    if (userCan('notice-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.notices.edit', $row->id), 'row' => $row]);
                    }
                    if (userCan('notice-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.notices.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    }

                    return $btn;
                })
                ->rawColumns(['content', 'file', 'is_active', 'action'])
                ->make(true);
        }

        return view('admin.notice.index');
    }

    public function status(Notice $notice)
    {
        if ($error = $this->authorize('notice-edit')) {
            return $error;
        }
        $notice->is_active = $notice->is_active == 1 ? 0 : 1;
        try {
            $notice->save();

            return response()->json(['message' => 'The status has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeRequest $request)
    {
        if ($error = $this->authorize('notice-add')) {
            return $error;
        }
        $data = $request->validated();
        $data['content'] = $this->summerNoteStore($request->content, 'notice');

        if ($request->file('file')) {
            $fileName = uniqid(10).'.'.$request->file->getClientOriginalExtension();
            // $type = $request->file->getClientMimeType();
            // $size = $request->file->getSize();
            $request->file->move(public_path('/uploads/images/notice/'), $fileName);
            $data['file'] = $fileName;
        }

        try {
            Notice::create($data);

            return response()->json(['message' => 'The information has been inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);

            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    public function show(Request $request, Notice $notice)
    {
        if ($request->ajax()) {
            $modal = view('admin.notice.show')->with(['notice' => $notice])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    public function edit(Request $request, Notice $notice)
    {
        if ($error = $this->authorize('notice-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $modal = view('admin.notice.edit')->with(['notice' => $notice])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        if ($error = $this->authorize('notice-edit')) {
            return $error;
        }
        $data = $request->validated();
        $data['content'] = $this->summerNoteStore($request->content, 'notice');

        if ($request->hasFile('file')) {
            $fileName = uniqid(10).'.'.$request->file->getClientOriginalExtension();
            // $type = $request->file->getClientMimeType();
            // $size = $request->file->getSize();
            $request->file->move(public_path('/uploads/images/notice/'), $fileName);
            imgUnlink('notice', $notice->file);
            $data['file'] = $fileName;
        }

        try {
            $notice->update($data);

            return response()->json(['message' => 'The information has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        if ($error = $this->authorize('notice-delete')) {
            return $error;
        }
        $this->summerNoteAllImageDestroy($notice->content);

        try {
            imgUnlink('notice', $notice->file);
            $notice->delete();

            return response()->json(['message' => 'The information has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }

    public function noticePdfView($noticeId)
    {
        $notice = Notice::findOrFail($noticeId);
        $path = public_path('uploads/images/notice/'.$notice->file);
        if (! file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
