<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if ($error = $this->authorize('dashboard-manage')) {
            return $error;
        }
        return view('admin.dashboard');
    }
}
