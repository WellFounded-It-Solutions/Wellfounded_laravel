<?php

namespace App\Http\Controllers\developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index()
    {
        $menu['menu'] = 'Dashboard';
        return view('developer.dashboard');
    }

    public function taskboard()
    {
        $menu['menu'] = 'Taskboard';
        return view('developer.taskboard');
    }
}
