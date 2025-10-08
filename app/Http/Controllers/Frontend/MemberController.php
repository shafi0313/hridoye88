<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::with('designation')->whereNot('email','dev.admin@shafi95.com')->get();

        return view('frontend.member', compact('members'));
    }
}
