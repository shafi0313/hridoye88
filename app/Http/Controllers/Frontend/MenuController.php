<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('frontend.menu', compact('menu'));
    }
    public function subShow($id)
    {
        $menu = SubMenu::find($id);
        return view('frontend.menu', compact('menu'));
    }
}
