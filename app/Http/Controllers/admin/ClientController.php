<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{

    public function index()
    {
        $menu['menu'] = 'Manage Client';
        $users = User::select()
        ->leftJoin('client_onboardings', 'users.id', '=', 'client_onboardings.user_id')
        ->where('role', 4)
        ->get();
        return view('admin.manage_client',compact('users', 'menu'));

    }

}
