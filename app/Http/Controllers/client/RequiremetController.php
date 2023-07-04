<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\ClientRequirement;
use Illuminate\Http\Request;
use Auth;

class RequiremetController extends Controller
{
    public function index()
    {
        $menu['menu'] = 'Post Requirements';
        return view('clients.postRequiremets', compact('menu'));
    }

    public function postRequirement(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $skills = implode(',', $request->skills);
        $input['skills'] = $skills;

        $clientRequirement = ClientRequirement::create($input);

        return redirect()->route('clients.dashboard')
        ->with('success', 'Requirement posted successfully');


    }

}