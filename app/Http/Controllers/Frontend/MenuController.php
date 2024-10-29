<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SubMenu;

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
