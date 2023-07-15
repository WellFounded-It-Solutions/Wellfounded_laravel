<?php

namespace App\Http\Controllers\client\clients;

use App\Http\Controllers\client\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use App\Models\ClientOnboarding;
use App\Models\ClientSkill;
use App\Models\ClientImage;
use App\Models\ClientDocument;
use App\Models\ClientRequirement;
use DB;


class ClientController extends BaseController
{

  



    public function profile(Request $request, )
    {
        $userID = Auth::user()->id;
        $menu['menu'] = 'Manage Client';
        $user = User::select('users.id as id', 'client_onboardings.*', 'users.*')
            ->leftJoin('client_onboardings', 'users.id', '=', 'client_onboardings.user_id')
            ->where('role', 4)
            ->find($userID);

        $skills = ClientSkill::where('user_id', $userID)->get();
        $images = ClientImage::where('user_id', $userID)->get();
        $documents = ClientDocument::where('user_id', $userID)->where('is_portfolio', 0)->get();
        $portfolios = ClientDocument::where('user_id', $userID)->where('is_portfolio', 1)->get();


        return view('clients.profile', compact('user', 'menu', 'skills', 'images', 'documents', 'portfolios',));
    }


    public function updateClientProfile(Request $request)
    {
        $menu['menu'] = 'Manage Client';
        $user = User::select('users.id as id', 'client_onboardings.*', 'users.*')
            ->leftJoin('client_onboardings', 'users.id', '=', 'client_onboardings.user_id')
            ->where('role', 4)
            ->find($request->id);

        return view('clients.onboardingUpdate', compact('user', 'menu'));
    }

    public function viewRequirement(Request $request)
    {
        $menu['menu'] = 'Manage Requirement';
        $requirements = ClientRequirement::where('user_id', Auth::user()->id)->get();
        return view('clients.requirement', compact('requirements', 'menu'));
    }
    

    public function updateClientRequirement(Request $request)
    {
        $menu['menu'] = 'Manage Requirement';

        $requirement = ClientRequirement::find($request->id);

        return view('clients.requirementUpdate', compact('requirement', 'menu'));
    }

    public function requirementData(Request $request)
    {
        // Retrieve the filter parameters from the request
        $status = $request->input('status', []);
        $skillsArray = $request->input('skills', []);

        $users = ClientRequirement::query()
        
            ->where('user_id', Auth::user()->id)
            ->when(!empty($status), function ($query) use ($status) {
                $query->whereIn('status', $status);
            })
            ->when(!empty($skillsArray), function ($query) use ($skillsArray) {
                $query->where(function ($query) use ($skillsArray) {
                    foreach ($skillsArray as $skill) {
                        $query->orWhere('skills', 'LIKE', '%' . $skill . '%');
                    }
                });
            })
            ->get();


        // Render the filtered data as JSON response
        return response()->json(['users' => $users]);
    }

    public function postRequirementSave(Request $request)
    {
        $input = $request->all();

        if($input['status'] == 'Delete Post'){
            $experience = ClientRequirement::findOrFail($request->id);
            $experience->delete();
    
            return redirect()->route('client.viewRequirement')->with('danger', 'Requirement deleted successfully.');
        }
        $input['user_id'] = $request->user_id;
        
        $skills = implode(',', $request->skills);
        $input['skills'] = $skills;

        $secondarySkills = implode(',', $request->secondarySkills);
        $input['secondarySkills'] = $secondarySkills;

        $clientRequirement = ClientRequirement::find($request->id);
        $clientRequirement->update($input);
        
        return redirect()->route('client.viewRequirement')->with('success', 'Requirement updated successfully.');


    }
    


    public function clientOnboardingPost(Request $request)
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


        $onboarding = ClientOnboarding::where('user_id', $userId)->first();
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
        return redirect()->route('client.profile')->with('success', 'Client profile updated successfully.');
    }


    public function storeImages(Request $request)
    {
        
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $image2 = time() . 'image.' . $image->extension();
                $image->move(public_path('image'), $image2);
                $input['image'] = 'image/' . $image2;
                
                
                $newImage = new ClientImage();
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
        $experience = ClientImage::findOrFail($certification_id);
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
                
                
                $newImage = new ClientDocument();
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
        $experience = ClientDocument::findOrFail($certification_id);
        $experience->delete();

        return back()->with('danger', 'Document deleted successfully.');
    }

    


}
