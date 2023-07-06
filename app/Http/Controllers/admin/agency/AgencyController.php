<?php

namespace App\Http\Controllers\admin\agency;

use App\Http\Controllers\admin\BaseController;
use App\Models\AgencyOnboarding;
use App\Models\AgencySkill;
use App\Models\AgencyImage;
use App\Models\AgencyDocument;

use Illuminate\Http\Request;
use App\Models\User;

class AgencyController extends BaseController
{


    public function index()
    {
        $menu['menu'] = 'Manage Agencies';
        $users = User::select('users.id as id', 'agency_onboardings.*', 'users.*')
            ->leftJoin('agency_onboardings', 'users.id', '=', 'agency_onboardings.user_id')
            ->where('role', 2)
            ->get();
        return view('admin.agency.manage_agency', compact('users', 'menu'));
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

    public function agencyProfile(Request $request, $userID)
    {
        $menu['menu'] = 'Manage Agencies';
        $user = User::select('users.id as id', 'agency_onboardings.*', 'users.*')
            ->leftJoin('agency_onboardings', 'users.id', '=', 'agency_onboardings.user_id')
            ->where('role', 2)
            ->find($userID);

        $skills = AgencySkill::where('user_id', $userID)->get();
        $images = AgencyImage::where('user_id', $userID)->get();
        $documents = AgencyDocument::where('user_id', $userID)->where('is_portfolio', 0)->get();
        $portfolios = AgencyDocument::where('user_id', $userID)->where('is_portfolio', 1)->get();
        
        $developers =User::select('users.id as id', 'developer_onboardings.*', 'users.*')
        ->leftJoin('developer_onboardings', 'users.id', '=', 'developer_onboardings.user_id')
        ->where('role', 3)
        ->where('users.added_by', $userID)
        ->get();

        return view('admin.agency.profile', compact('user', 'menu', 'skills','images','documents','portfolios','developers'));
    }



    public function updateAgencyProfile(Request $request)
    {
        $menu['menu'] = 'Manage Agencies';
        $user = User::select('users.id as id', 'agency_onboardings.*', 'users.*')
            ->leftJoin('agency_onboardings', 'users.id', '=', 'agency_onboardings.user_id')
            ->where('role', 2)
            ->find($request->id);

        return view('admin.agency.onboarding', compact('user', 'menu'));
    }

    public function agencyOnboardingPost(Request $request)
    {
        // Get the user ID from the hidden input field
        $userId = $request->input('id');

        // Retrieve the user from the database
        $user = User::find($userId);

        if (!$user) {
            // Handle the case when the user is not found
            return redirect()->back()->withErrors('User not found.');
        }
        $validatedData = $request->all();
        // Update the user's fields
        $user->name = $validatedData['name'];
        if (array_key_exists('mobile', $validatedData)) {
            // 'mobile' key exists in the $user array
            $user->mobile = $validatedData['mobile'];
        }
        $user->save();


        $onboarding = AgencyOnboarding::where('user_id', $userId)->first();
        $onboarding->website = $validatedData['website'];
        $user->website = $request->website;
        $onboarding->designation = $request->designation;
        $onboarding->organizationSize = $request->organizationSize;
        $onboarding->organizationType = $request->organizationType;
        $onboarding->linkedin = $request->linkedin;
        $onboarding->instagram = $request->instagram;
        $onboarding->facebook = $request->facebook;
        $onboarding->skype = $request->skype;
        $onboarding->location = $request->location;
        $onboarding->country = $request->country;
        $onboarding->about = $request->about;
        $onboarding->tagline = $request->tagline;

        if ($request->file('logo')) {
            $logo = time() . 'logo.' . $request->logo->extension();
            $request->logo->move(public_path('logo'), $logo);
            $onboarding->logo = 'logo/' . $logo;
        }
        if ($request->file('document')) {
            $document = time() . 'document.' . $request->document->extension();
            $request->document->move(public_path('document'), $document);
            $onboarding->document = 'document/' . $document;
        }
        if ($request->file('gst')) {
            $gst = time() . 'gst.' . $request->gst->extension();
            $request->gst->move(public_path('gst'), $gst);
            $onboarding->gst = 'document/' . $gst;
        }


        $onboarding->save();
        return redirect()->route('admin.agencyProfile', $userId)->with('success', 'Agency profile updated successfully.');
    }

    public function storeImages(Request $request)
    {
        
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $image2 = time() . 'image.' . $image->extension();
                $image->move(public_path('image'), $image2);
                $input['image'] = 'image/' . $image2;
                
                
                $newImage = new AgencyImage();
                $newImage->image = $input['image'];
                $newImage->user_id = $request->user_id;
                $newImage->save();
            }

            // Redirect or return a success response
            return redirect()->back()->with('success', 'Images uploaded successfully!');
        }

        // If no images were uploaded, redirect or return an error response
        return redirect()->back()->with('error', 'No images selected!');
    }

    public function deleteImages(Request $request){
        $certification_id = $request->id;

        // Find the experience entry to be deleted
        $experience = AgencyImage::findOrFail($certification_id);
        $experience->delete();

        return back()->with('danger', 'Image deleted successfully.');
    }
    

    public function storeDocuments(Request $request)
    {
        
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $image2 = time() . 'document.' . $image->extension();
                $image->move(public_path('document'), $image2);
                $input['image'] = 'document/' . $image2;
                
                
                $newImage = new AgencyDocument();
                $newImage->image = $input['image'];
                $newImage->user_id = $request->user_id;
                $newImage->is_portfolio = $request->is_portfolio;
                $newImage->name = $request->name;
                $newImage->save();
            }

            // Redirect or return a success response
            return redirect()->back()->with('success', 'Document uploaded successfully!');
        }

        // If no images were uploaded, redirect or return an error response
        return redirect()->back()->with('error', 'No Documents selected!');
    }

    public function deleteDocuments(Request $request){
        $certification_id = $request->id;

        // Find the experience entry to be deleted
        $experience = AgencyDocument::findOrFail($certification_id);
        $experience->delete();

        return back()->with('danger', 'Document deleted successfully.');
    }

}
