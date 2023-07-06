<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AgencyController extends BaseController
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

    public function filter(Request $request)
    {
        // Retrieve the filter parameters from the request
        $location = $request->input('location', []);
        $organizationSize = $request->input('organizationSize', []);
        $organizationType = $request->input('organizationType', []);


        $users = User::query()
            ->leftJoin('agency_onboardings', 'users.id', '=', 'agency_onboardings.user_id')
            ->where('role', 2)
            ->when(!empty($location), function ($query) use ($location) {
                $query->whereIn('agency_onboardings.location', $location);
            })
            ->when(!empty($organizationSize), function ($query) use ($organizationSize) {
                $query->whereIn('agency_onboardings.organizationSize', $organizationSize);
            })
            ->when(!empty($organizationType), function ($query) use ($organizationType) {
                $query->whereIn('agency_onboardings.organizationType', $organizationType);
            })
            ->get();


        // Render the filtered data as JSON response
        return response()->json(['users' => $users]);
    }

}
