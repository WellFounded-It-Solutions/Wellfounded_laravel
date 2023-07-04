<?php

namespace App\Http\Controllers\agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index()
    {
        $menu['menu'] = 'Dashboard';

        return view('agency.dashboard', compact('menu'));
    }

}
