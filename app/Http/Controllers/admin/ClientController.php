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

    public function filter(Request $request)
    {
        // Retrieve the filter parameters from the request
        $location = $request->input('location', []);
        $organizationSize = $request->input('organizationSize', []);
        $organizationType = $request->input('organizationType', []);
        $designation = $request->input('designation', []);
        

        $users = User::query()
            ->leftJoin('client_onboardings', 'users.id', '=', 'client_onboardings.user_id')
            ->where('role', 4)
            ->when(!empty($location), function ($query) use ($location) {
                $query->whereIn('client_onboardings.location', $location);
            })
            ->when(!empty($organizationSize), function ($query) use ($organizationSize) {
                $query->whereIn('client_onboardings.organizationSize', $organizationSize);
            })
            ->when(!empty($organizationType), function ($query) use ($organizationType) {
                $query->whereIn('client_onboardings.organizationType', $organizationType);
            })
            ->when(!empty($designation), function ($query) use ($designation) {
                $query->whereIn('client_onboardings.designation', $designation);
            })
            ->get();


        // Render the filtered data as JSON response
        return response()->json(['users' => $users]);
    }

}
