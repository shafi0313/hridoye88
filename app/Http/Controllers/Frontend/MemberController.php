<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::with('designation')->wherePermission(2)->get();

        return view('frontend.member', compact('members'));
    }
}
