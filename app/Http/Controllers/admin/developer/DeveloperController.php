<?php

namespace App\Http\Controllers\admin\developer;

use App\Http\Controllers\admin\BaseController;
use App\Models\DeveloperCertification;
use App\Models\DeveloperEducation;
use App\Models\DeveloperExperience;
use App\Models\DeveloperOnboarding;
use App\Models\User;
use Illuminate\Http\Request;
use DB;


class DeveloperController extends BaseController
{

    public function index()
    {
        $menu['menu'] = 'Manage Developer';
        $users = User::select('users.id as id', 'developer_onboardings.*', 'users.*')
            ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
            ->where('role', 3)
            ->get();

        return view('admin.developer.manage_developer', compact('users', 'menu'));
    }

    public function filter(Request $request)
    {
        // Retrieve the filter parameters from the request
        $workingStatus = $request->input('workingStatus', []);
        $skillsArray = $request->input('skills', []);
        $employmentType = $request->input('employementType', []);
        $experience = $request->input('experience', []);
        $salary = $request->input('salary');


        $users = User::query()->select('users.id as id', 'developer_onboardings.*', 'users.*')
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
                $query->where('developer_onboardings.salary', 'LIKE', '%' . $salary . '%');
            })
            ->get();


        // Render the filtered data as JSON response
        return response()->json(['users' => $users]);
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

        return view('admin.developer.developerProfile', compact('user', 'menu', 'experiences', 'certifications', 'educations'));
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

        return view('admin.developer.developerOnboarding', compact('user', 'menu'));
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
        return redirect()->route('admin.developerProfile', $userId)->with('success', 'Developer profile updated successfully.');
    }
}
