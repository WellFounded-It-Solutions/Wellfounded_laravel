<?php

namespace App\Http\Controllers;

use App\Models\DeveloperOnboarding;
use App\Models\AgencyOnboardings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        if (!isOnboarding()) {
            if (isDeveloper())
                return view('developer.onboarding');

            if (isAgency())
                return view('agency.onboarding');

            if (isclient())
                return view('clients.onboarding');
        }
        return view('pages.dashboard');
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
            $user->skills = $request->skills;
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
            return 'Thank You';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function agencyOnboarding(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'document' => 'required',
                'gst' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $auth = auth()->user();
            $auth->name = $request->name;
            $auth->mobile = $request->mobile;
            $auth->onboarding = 1;
            $auth->save();

            $user = new agencyOnboarding();
            $user->website = $request->website;
            $user->designation = $request->designation;
            $user->organizationSize = $request->organizationSize;
            $user->organizationType = $request->organizationType;
            $user->linkedin = $request->linkedin;
            $user->instagram = $request->instagram;
            $user->facebook = $request->facebook;
            $user->skype = $request->skype;
            $user->location = $request->location;
            $user->country = $request->country;
            $user->about = $request->about;

            if ($request->file('logo')) {
                $logo = time() . 'logo.' . $request->logo->extension();
                $request->logo->move(public_path('logo'), $logo);
                $user->logo = 'logo/' . $logo;
            }
            if ($request->file('document')) {
                $document = time() . 'document.' . $request->document->extension();
                $request->document->move(public_path('document'), $document);
                $user->document = 'document/' . $document;
            }
            if ($request->file('gst')) {
                $gst = time() . 'gst.' . $request->gst->extension();
                $request->gst->move(public_path('gst'), $gst);
                $user->gst = 'document/' . $gst;
            }
            $user->user_id = $auth->id;
            $user->save();
            DB::commit();
            return 'Thank You';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function clientOnboarding(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'document' => 'required',
                'gst' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $auth = auth()->user();
            $auth->name = $request->name;
            $auth->mobile = $request->mobile;
            $auth->onboarding = 1;
            $auth->save();

            $user = new clientOnboarding();
            $user->website = $request->website;
            $user->designation = $request->designation;
            $user->organizationSize = $request->organizationSize;
            $user->organizationType = $request->organizationType;
            $user->linkedin = $request->linkedin;
            $user->instagram = $request->instagram;
            $user->facebook = $request->facebook;
            $user->skype = $request->skype;
            $user->location = $request->location;
            $user->country = $request->country;
            $user->about = $request->about;

            if ($request->file('logo')) {
                $logo = time() . 'logo.' . $request->logo->extension();
                $request->logo->move(public_path('logo'), $logo);
                $user->logo = 'logo/' . $logo;
            }
            if ($request->file('document')) {
                $document = time() . 'document.' . $request->document->extension();
                $request->document->move(public_path('document'), $document);
                $user->document = 'document/' . $document;
            }
            if ($request->file('gst')) {
                $gst = time() . 'gst.' . $request->gst->extension();
                $request->gst->move(public_path('gst'), $gst);
                $user->gst = 'document/' . $gst;
            }
            $user->user_id = $auth->id;
            $user->save();
            DB::commit();
            return 'Thank You';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}