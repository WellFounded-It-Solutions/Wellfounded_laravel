<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    public function index()
    {
        $menu['menu'] = 'Manage Developer';
        $users = User::select()
        ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
        ->where('role', 3)
        ->get();
        return view('admin.manage_developer',compact('users', 'menu'));
    }

}
