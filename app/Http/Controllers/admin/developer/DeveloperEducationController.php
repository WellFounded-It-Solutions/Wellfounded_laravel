<?php

namespace App\Http\Controllers\admin\developer;

use App\Http\Controllers\admin\BaseController;
use Illuminate\Http\Request;
use App\Models\DeveloperEducation;

class DeveloperEducationController extends BaseController
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
            'education_title' => 'required',
            'institute_name' => 'required',
            'course_name' => 'required',
            'is_present' => 'boolean',
            'joining_date' => 'required',
            'completion_date' => 'nullable|date',
            'institute_logo' => 'nullable|image|max:2048',
            'user_id' => 'required',
        ]);


        $input = $request->all();

        if ($request->file('institute_logo')) {
            $institute_logo = time() . '.' . $request->institute_logo->extension();
            $request->institute_logo->move(public_path('institute_logo'), $institute_logo);
            $input['institute_logo'] = 'institute_logo/' . $institute_logo;
        }
        if(!$request->is_present){
            $input['is_present'] =0;
        }
        DeveloperEducation::create($input);

        return redirect()->route('admin.developerProfile', $request->user_id)->with('success', 'Education created successfully.');
    }

    public function delete(Request $request)
    {
        $experienceId = $request->id;

        // Find the experience entry to be deleted
        $experience = DeveloperEducation::findOrFail($experienceId);
        $experience->delete();

        return back()->with('danger', 'Education deleted successfully.');
    }

    public function updateEducation(Request $request)
    {
        $request->validate([
            'education_title' => 'required',
            'institute_name' => 'required',
            'course_name' => 'required',
            'is_present' => 'boolean',
            'joining_date' => 'required',
            'completion_date' => 'nullable|date',
            'institute_logo' => 'nullable|image|max:2048',
            'user_id' => 'required',
        ]);

    
        $input = $request->all();
    
        if ($request->file('institute_logo')) {
            $institute_logo = time() . '.' . $request->institute_logo->extension();
            $request->institute_logo->move(public_path('institute_logo'), $institute_logo);
            $input['institute_logo'] = 'institute_logo/' . $institute_logo;
        }
        if(!$request->is_present){
            $input['is_present'] =0;
        }
        $experience = DeveloperEducation::findOrFail($request->id);
        $experience->update($input);

    
        return redirect()->route('admin.developerProfile', $request->user_id)->with('success', 'Education updated successfully.');
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
