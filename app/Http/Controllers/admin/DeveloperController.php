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
        return view('admin.manage_developer', compact('users', 'menu'));
    }

    public function filter(Request $request)
    {
        // Retrieve the filter parameters from the request
        $workingStatus = $request->input('workingStatus', []);
        $skillsArray = $request->input('skills', []);
        $employmentType = $request->input('employementType', []);
        $experience = $request->input('experience', []);
        $salary = $request->input('salary', []);


        $users = User::query()
            ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
            ->where('role', 3)
            ->when(!empty($workingStatus), function ($query) use ($workingStatus) {
                $query->whereIn('developer_onboardings.workingStatus', $workingStatus);
            })
            ->when(!empty($skillsArray), function ($query) use ($skillsArray) {
                $query->where(function ($query) use ($skillsArray) {
                    foreach ($skillsArray as $skill) {
                        $query->orWhere('developer_onboardings.skills', 'LIKE', '%' . $skill . '%');
                    }
                });
            })
            ->when(!empty($employmentType), function ($query) use ($employmentType) {
                $query->whereIn('developer_onboardings.employementType', $employmentType);
            })
            ->when(!empty($experience), function ($query) use ($experience) {
                $query->whereIn('developer_onboardings.experience', $experience);
            })
            ->when(!empty($salary), function ($query) use ($salary) {
                $query->whereIn('developer_onboardings.salary', $salary);
            })
            ->get();


        // Render the filtered data as JSON response
        return response()->json(['users' => $users]);
    }
}
