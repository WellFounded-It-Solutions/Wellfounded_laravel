<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ClientOnboarding;
use DB;


class OnboardingController extends Controller
{
    public function index()
    {

        $userId = auth()->user()->id;
            
        // Check if the user ID exists in the agency_onboarding table
        $exists = ClientOnboarding::where('user_id', $userId)->exists();
        
        if ($exists) {
            // Redirect to the onboarding form route if the user ID is not found
            return redirect()->route('client.dashboard')
            ->with('success', 'Onboarding already exists');
        }

        $menu['menu'] = 'Onboarding';
        return view('clients.onboarding');
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

            $user = new ClientOnboarding();
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
            return redirect()->route('clients.dashboard')
            ->with('success', 'Your account has been successfully activated');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
