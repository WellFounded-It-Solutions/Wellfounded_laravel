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
use App\Models\DeveloperCertification;
use App\Models\DeveloperEducation;
use App\Models\DeveloperExperience;




class DeveloperController extends BaseController
{

    public function index()
    {
        $menu['menu'] = 'Manage Developer';

        $users = User::select('users.id as id', 'developer_onboardings.*', 'users.*')
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



        $users = User::query()->select('users.id as id', 'developer_onboardings.*', 'users.*')
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
            $user->pinCode = $request->pinCode;
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


    public function developerProfile(Request $request, $userID)
    {
        $menu['menu'] = 'Manage Developer';
        $user = User::select('users.id as id', 'developer_onboardings.*', 'users.*')
            ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
            ->where('role', 3)
            ->find($userID);

        $experiences = DeveloperExperience::where('user_id', $userID)->get();
        $certifications = DeveloperCertification::where('user_id', $userID)->get();
        $educations = DeveloperEducation::where('user_id', $userID)->get();

        return view('agency.developer.developerProfile', compact('user', 'menu', 'experiences', 'certifications', 'educations'));
    }

    public function changeDeveloperWorkingStatus(Request $request)
    {
        // Retrieve the isChecked and userID from the request
        $workingStatus = $request->input('workingStatus');
        $user_id = $request->input('user_id');

        // Update the user's working status based on isChecked

        // Retrieve the user from the database
        $test = DeveloperOnboarding::where('user_id', $user_id)->first();

        if (!$test) {
            return response()->json([
                'status' => 'error',
                'message' => 'First update the user profile'
            ]);
        }


        DB::beginTransaction();

        try {
            DB::table('developer_onboardings')
                ->where('user_id', $user_id)
                ->update(['workingStatus' => $workingStatus]);

            DB::commit();

            // Success message or further actions
        } catch (\Exception $e) {
            DB::rollback();

            // Error handling or error message
        }

        // Return a JSON response with success status and message
        return response()->json([
            'status' => 'success',
            'message' => 'Working status updated successfully'
        ]);
    }


    public function updateDeveloperProfile(Request $request)
    {
        $menu['menu'] = 'Manage Developer';
        $user = User::select('users.id as id', 'developer_onboardings.*', 'users.*')
            ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
            ->where('role', 3)
            ->find($request->id);

        return view('agency.developer.developerOnboarding', compact('user', 'menu'));
    }

    public function developerOnboardingPost(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'mobile' => 'nullable|numeric',
            'employementType' => 'required|string',
            'workingStatus' => 'required|string',
            'contractJob' => 'required|string',
            'skills' => 'required|array',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
            'resume' => 'nullable|file|mimes:pdf',
            'portfolio' => 'nullable|file|mimes:pdf',
            'profilePic' => 'nullable|image|mimes:png,gif,jpeg',
            'remark' => 'required|string',
            'headline' => 'required|string',
            'pinCode' => 'required|string',
            
        ]);

        // Get the user ID from the hidden input field
        $userId = $request->input('id');

        // Retrieve the user from the database
        $user = User::find($userId);

        if (!$user) {
            // Handle the case when the user is not found
            return redirect()->back()->withErrors('User not found.');
        }

        // Update the user's fields
        $user->name = $validatedData['name'];
        if (array_key_exists('mobile', $validatedData)) {
            // 'mobile' key exists in the $user array
            $user->mobile = $validatedData['mobile'];
        }
        $user->save();


        $onboarding = DeveloperOnboarding::where('user_id', $userId)->first();
        $onboarding->gender = $validatedData['gender'];
        $onboarding->employementType = $validatedData['employementType'];
        $onboarding->workingStatus = $validatedData['workingStatus'];
        $onboarding->contractJob = $validatedData['contractJob'];
        $onboarding->skills = implode(',', $validatedData['skills']);
        $onboarding->experience = $validatedData['experience'];
        $onboarding->salary = $validatedData['salary'];
        $onboarding->location = $validatedData['location'];
        $onboarding->country = $validatedData['country'];
        $onboarding->remark = $validatedData['remark'];
        $onboarding->headline = $validatedData['headline'];
        $onboarding->pinCode = $validatedData['pinCode'];
        
        // Handle file uploads if they are present
        if ($request->file('resume')) {
            $resume = time() . '.' . $request->resume->extension();
            $request->resume->move(public_path('resumes'), $resume);
            $onboarding->resume = 'resumes/' . $resume;
        }
        if ($request->file('portfolio')) {
            $portfolio = time() . '.' . $request->portfolio->extension();
            $request->portfolio->move(public_path('portfolio'), $portfolio);
            $onboarding->portfolio = 'portfolio/' . $portfolio;
        }

        if ($request->file('profilePic')) {
            $profilePic = time() . '.' . $request->profilePic->extension();
            $request->profilePic->move(public_path('profilePic'), $profilePic);
            $onboarding->profilePic = 'profilePic/' . $profilePic;
        }
        $onboarding->save();

        // Redirect the user after successful update
        return redirect()->route('agency.developerProfile', $userId)->with('success', 'Developer profile updated successfully.');
    }

}
