<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
