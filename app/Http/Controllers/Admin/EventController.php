<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($error = $this->authorize('event-manage')) {
            return $error;
        }
        $events = Event::all();

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($error = $this->authorize('event-add')) {
            return $error;
        }

        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($error = $this->authorize('event-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'text' => 'required',
            'date' => 'required|date',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data['user_id'] = user()->id;
        if ($request->hasFile('image')) {
            $data['image'] = imageStore($request, 'event', 'uploads/images/events/');
        }

        try {
            Event::create($data);
            toast('Success', 'success');

            return redirect()->route('admin.event.index');
        } catch (\Exception $e) {
            // return $e->getMessage();
            toast('Error', 'error');

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($error = $this->authorize('event-update')) {
            return $error;
        }
        $event = Event::find($id);

        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('event-update')) {
            return $error;
        }
        $data = $this->validate($request, [
            'text' => 'required',
            'status' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $delPath = Event::find($id)->image;
        $data['user_id'] = user()->id;
        if ($request->hasFile('image')) {
            $data['image'] = imageUpdate($request, 'event', 'uploads/images/events/', $delPath);
        }
        try {
            Event::find($id)->update($data);
            toast('Success!', 'success');

            return redirect()->route('admin.event.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('Error', 'error');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($error = $this->authorize('event-delete')) {
            return $error;
        }
        $event = Event::find($id);
        $path = public_path('uploads/images/events/'.$event->image);
        if (file_exists($path)) {
            unlink($path);
            $event->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        } else {
            $event->delete();
            toast('Successfully Deleted', 'success');

            return redirect()->back();
        }
    }
}
