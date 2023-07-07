<?php

namespace App\Http\Controllers\developer;

use App\Models\DeveloperExperience;
use Illuminate\Http\Request;

class DeveloperExperienceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'joining_date' => 'required',
            'resign_date' => 'nullable|date',
            'is_present' => 'boolean',
            'company_logo' => 'nullable|image|max:2048',
            'description' => 'required',
            'user_id' => 'required',
        ]);


        $input = $request->all();

        if ($request->file('company_logo')) {
            $company_logo = time() . '.' . $request->company_logo->extension();
            $request->company_logo->move(public_path('company_logo'), $company_logo);
            $input['company_logo'] = 'company_logo/' . $company_logo;
        }

        if(!$request->is_present){
            $input['is_present'] =0;
        }

        DeveloperExperience::create($input);
        return back()->with('success', 'Experience created successfully.');
    }

    

    public function updateExperience(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'joining_date' => 'required',
            'resign_date' => 'nullable|date',
            'is_present' => 'boolean',
            'company_logo' => 'nullable|image|max:2048',
            'description' => 'required',
            'user_id' => 'required',
        ]);
    
        $input = $request->all();
    
        if ($request->file('company_logo')) {
            $company_logo = time() . '.' . $request->company_logo->extension();
            $request->company_logo->move(public_path('company_logo'), $company_logo);
            $input['company_logo'] = 'company_logo/' . $company_logo;
        }
        if(!$request->is_present){
            $input['is_present'] =0;
        }
        $experience = DeveloperExperience::findOrFail($request->id);
        $experience->update($input);

    
        return back()->with('success', 'Experience updated successfully.');
    }
    

    public function delete(Request $request)
    {
        $experienceId = $request->id;

        // Find the experience entry to be deleted
        $experience = DeveloperExperience::findOrFail($experienceId);
        $experience->delete();

        return back()->with('danger', 'Experience deleted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
