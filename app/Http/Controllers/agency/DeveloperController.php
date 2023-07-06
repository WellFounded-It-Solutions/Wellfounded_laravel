<?php

namespace App\Http\Controllers\agency;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\Models\DeveloperOnboarding;


class DeveloperController extends BaseController
{

    public function index()
    {
        $menu['menu'] = 'Manage Developer';

        $users = User::select()
            ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
            ->where('role', 3)
            ->where('users.added_by', Auth::user()->id)
            ->get();
        return view('agency.manage_developer', compact('users', 'menu'));
    }




    public function filter(Request $request)
    {
        // Retrieve the filter parameters from the request
        $workingStatus = $request->input('workingStatus', []);
        $location = $request->input('location', []);



        $users = User::query()
            ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
            ->where('role', 3)
            ->when(!empty($workingStatus), function ($query) use ($workingStatus) {
                $query->whereIn('developer_onboardings.workingStatus', $workingStatus);
            })

            ->when(!empty($location), function ($query) use ($location) {
                $query->whereIn('developer_onboardings.location', $location);
            })
            ->where('users.added_by', Auth::user()->id)
            ->get();


        // Render the filtered data as JSON response
        return response()->json(['users' => $users]);
    }

    public function addDeveloper()
    {
        $menu['menu'] = 'Manage Developer';

        return view('agency.addDeveloper', compact('menu'));
    }

    public function addDeveloperPost(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'resume' => 'required|mimes:pdf|max:2048',
                'portfolio' => 'required|mimes:pdf|max:2048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $input['name'] = $request->name;
            $input['onboarding'] = 1;
            $input['role'] = 3;
            $input['added_by'] = Auth::user()->id;
            $input['email'] = Str::random(7);
            $input['password'] = Str::random(7);
            $input['mobile'] = '';


            $userData = User::create($input);

            $user = new DeveloperOnboarding();
            $user->gender = $request->gender;
            $user->location = $request->location;
            $user->employementType = $request->employementType;
            $user->workingStatus = $request->workingStatus;
            $user->contractJob = $request->contractJob;
            $skils = implode(',', $request->skills);
            $user->skills = $skils;
            $user->experience = $request->experience;
            $user->salary = $request->salary;
            $user->country = $request->country;
            $user->remark = $request->remark;
            if ($request->file('resume')) {
                $resume = time() . '.' . $request->resume->extension();
                $request->resume->move(public_path('resumes'), $resume);
                $user->resume = 'resumes/' . $resume;
            }
            if ($request->file('portfolio')) {
                $portfolio = time() . '.' . $request->portfolio->extension();
                $request->portfolio->move(public_path('portfolio'), $portfolio);
                $user->portfolio = 'portfolio/' . $portfolio;
            }

            if ($request->file('profilePic')) {
                $profilePic = time() . '.' . $request->profilePic->extension();
                $request->profilePic->move(public_path('profilePic'), $profilePic);
                $user->profilePic = 'profilePic/' . $profilePic;
            }
            $user->user_id = $userData->id;
            $user->save();
            DB::commit();



            $id = $userData->id; // Replace with your actual ID
            $prefix = 'W';
            $year = date('Y');
            $number = str_pad($id, 9, '0', STR_PAD_LEFT);
            $w_id = $prefix . $year . $number;
            $user = User::find($id);
            $user->wellfounded_id = $w_id;
            $user->save();

            return redirect()->route('agency.manage_developers')
                ->with('success', 'Developer added successfully');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
