<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::with('designation')->wherePermission(2)->get();
        return view('frontend.member', compact('members'));
    }
}
