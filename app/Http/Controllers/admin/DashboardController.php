<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    public function index()
    {
        $menu['menu'] = 'Dashboard';

        return view('admin.dashboard', compact('menu'));
    }

    public function manage_developers()
    {
        $menu['menu'] = 'Products';

        return view('admin.dashboard');
    }
}
