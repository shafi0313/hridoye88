<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\Notice;
use App\Models\User;
use App\Traits\SummerNoteTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NoticeController extends Controller
{
    use SummerNoteTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $notices = Notice::query()->latest();

            return DataTables::of($notices)
                ->addIndexColumn()
                ->addColumn('content', function ($row) {
                    return '<div>'.$row->content.'</div>';
                })
                ->addColumn('date', function ($row) {
                    return bdDate($row->date);
                })
                // ->addColumn('image', function ($row) {
                //     return '<img src="'.imagePath('humanitarian', $row->image).'" width="80px">';
                // })
                // ->addColumn('is_active', function ($row) {
                //     return view('button', ['type' => 'is_active', 'route' => route('admin.humanitarian_assistance.is_active', $row->id), 'row' => $row->is_active]);
                // })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.notices.edit', $row->id), 'row' => $row]);
                    $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.notices.destroy', $row->id), 'row' => $row, 'src' => 'dt']);

                    return $btn;
                })
                ->rawColumns(['content', 'is_active', 'action'])
                ->make(true);
        }
        $users = User::select('id', 'name')->whereNot('email', 'dev.admin@shafi95.com')->pluck('name', 'id');

        return view('admin.notice.index', compact('users'));
    }

    public function status(Notice $notice)
    {
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
        $data = $request->validated();
        // $data['user_id'] = user()->id;
        $data['content'] = $this->summerNoteStore($request->content, 'notice');

        // if ($request->hasFile('image')) {
        //     $data['image'] = processAndStoreImage($request->image, 'humanitarian');
        // }

        try {
            Notice::create($data);

            return response()->json(['message' => 'The information has been inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);

            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    public function edit(Request $request, Notice $notice)
    {
        if ($request->ajax()) {
            $users = User::select('id', 'name')->whereNot('email', 'dev.admin@shafi95.com')->pluck('name', 'id');
            $modal = view('admin.notice.edit')->with(['notice' => $notice, 'users' => $users])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        $data = $request->validated();
        // $data['content'] = $request->content;
        $data['content'] = $this->summerNoteStore($request->content, 'notice');

        // if ($request->hasFile('image')) {
        //     $data['image'] = processAndStoreImage($request->image, 'humanitarian', [null, null], $notice->image);
        // }

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
        $this->summerNoteAllImageDestroy($notice->content);

        try {
            // imgUnlink('humanitarian', $notice->image);
            $notice->delete();

            return response()->json(['message' => 'The information has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }
}
