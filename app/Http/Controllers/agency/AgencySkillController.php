<?php

namespace App\Http\Controllers\agency;

use Illuminate\Http\Request;
use App\Models\AgencySkill;

class AgencySkillController extends BaseController
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
            'skill_name' => 'required',
            'noOfDevelopers' => 'required',
            'user_id' => 'required',
        ]);


        $input = $request->all();

        AgencySkill::create($input);
        return back()->with('success', 'Skill set created successfully.');
    }


    public function delete(Request $request)
    {
        $certification_id = $request->id;

        // Find the experience entry to be deleted
        $experience = AgencySkill::findOrFail($certification_id);
        $experience->delete();

        return back()->with('danger', 'Skill set deleted successfully.');
    }

    public function updateSkills(Request $request)
    {
        $request->validate([
            'skill_name' => 'required',
            'noOfDevelopers' => 'required',
            'user_id' => 'required',
        ]);

        $input = $request->all();
    

        $certification = AgencySkill::findOrFail($request->id);
        $certification->update($input);
        
        return back()->with('success', 'Skill set updated successfully.');
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
