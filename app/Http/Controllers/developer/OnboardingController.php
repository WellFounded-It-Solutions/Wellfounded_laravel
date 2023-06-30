<?php

namespace App\Http\Controllers\developer;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DeveloperOnboarding;
use DB;


class OnboardingController extends Controller
{
    public function index()
    {

        $userId = auth()->user()->id;
            
        // Check if the user ID exists in the agency_onboarding table
        $exists = DeveloperOnboarding::where('user_id', $userId)->exists();
        
        if ($exists) {
            // Redirect to the onboarding form route if the user ID is not found
            return redirect()->route('developer.dashboard')
            ->with('success', 'Onboarding already exists');
        }

        $menu['menu'] = 'Onboarding';
        return view('developer.onboarding');
    }


  
    public function developerOnboarding(Request $request)
    {
       

        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'resume' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'portfolio' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $auth = auth()->user();
            $auth->name = $request->name;
            $auth->mobile = $request->mobile;
            $auth->onboarding = 1;
            $auth->save();

            $user = new DeveloperOnboarding();
            $user->gender = $request->gender;
            $user->employementType = $request->employementType;
            $user->workingStatus = $request->workingStatus;
            $user->contractJob = $request->contractJob;
            $skils = implode(',',$request->skills);
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
            $user->user_id = $auth->id;
            $user->save();
            DB::commit();
            return redirect()->route('developer.dashboard')
            ->with('success', 'Your account has been successfully activated');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
