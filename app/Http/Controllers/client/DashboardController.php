<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ClientRequirement;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends BaseController
{
    public function index()
    {
        $menu['menu'] = 'Dashboard';
        $clientRequirements = ClientRequirement::where('user_id', Auth::user()->id)->get();
        return view('clients.dashboard', compact('menu', 'clientRequirements'));
    }
}
