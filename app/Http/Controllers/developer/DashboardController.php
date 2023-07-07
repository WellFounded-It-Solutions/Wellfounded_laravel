<?php

namespace App\Http\Controllers\developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeveloperCertification;
use App\Models\DeveloperEducation;
use App\Models\DeveloperExperience;
use App\Models\DeveloperOnboarding;
use App\Models\User;
use DB;
use Auth;

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

    public function profile() {
        $menu['menu'] = 'Profile';
        $userID = Auth::user()->id;
        $user = User::select('users.id as id', 'developer_onboardings.*', 'users.*')
        ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
        ->where('role', 3)
        ->find($userID);

    $experiences = DeveloperExperience::where('user_id', $userID)->get();
    $certifications = DeveloperCertification::where('user_id', $userID)->get();
    $educations = DeveloperEducation::where('user_id', $userID)->get();

    return view('developer.profile', compact('user', 'menu', 'experiences', 'certifications', 'educations'));
}

}
