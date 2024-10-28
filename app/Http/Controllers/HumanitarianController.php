<?php

namespace App\Http\Controllers;

use App\Models\Humanitarian;
use App\Http\Requests\StoreHumanitarianRequest;
use App\Http\Requests\UpdateHumanitarianRequest;

class HumanitarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHumanitarianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHumanitarianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Humanitarian  $humanitarian
     * @return \Illuminate\Http\Response
     */
    public function show(Humanitarian $humanitarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Humanitarian  $humanitarian
     * @return \Illuminate\Http\Response
     */
    public function edit(Humanitarian $humanitarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHumanitarianRequest  $request
     * @param  \App\Models\Humanitarian  $humanitarian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHumanitarianRequest $request, Humanitarian $humanitarian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Humanitarian  $humanitarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Humanitarian $humanitarian)
    {
        //
    }
}
