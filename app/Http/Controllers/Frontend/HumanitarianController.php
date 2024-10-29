<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Humanitarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HumanitarianController extends Controller
{
    public function index()
    {
        $humanitarians = Humanitarian::with('user:id,name,image')->whereIsActive(1)->paginate(12);

        return view('frontend.humanitarian', compact('humanitarians'));
    }

    public function show($id)
    {
        $humanitarian = Humanitarian::with('user:id,name,image')->findOrFail($id);

        return view('frontend.humanitarian_show', compact('humanitarian'));
    }
}
