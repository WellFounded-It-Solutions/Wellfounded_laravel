<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AgencyController extends Controller
{


    public function index()
    {
        $menu['menu'] = 'Manage Agencies';
        $users = User::select()
        ->leftJoin('agency_onboardings', 'users.id', '=', 'agency_onboardings.user_id')
        ->where('role', 2)
        ->get();
        return view('admin.manage_agency',compact('users', 'menu'));
    }

}
