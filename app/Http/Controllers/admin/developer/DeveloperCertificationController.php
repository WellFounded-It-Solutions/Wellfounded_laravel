<?php

namespace App\Http\Controllers\admin\developer;

use App\Http\Controllers\admin\BaseController;
use Illuminate\Http\Request;
use App\Models\DeveloperCertification;

class DeveloperCertificationController extends BaseController
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
            'name' => 'required',
            'issuing_organisation' => 'required',
            'issuing_date' => 'required',
            'user_id' => 'required',
        ]);


        $input = $request->all();

        DeveloperCertification::create($input);
        return redirect()->route('admin.developerProfile', $request->user_id)->with('success', 'Certification created successfully.');
    }


    public function delete(Request $request)
    {
        $certification_id = $request->id;

        // Find the experience entry to be deleted
        $experience = DeveloperCertification::findOrFail($certification_id);
        $experience->delete();

        return back()->with('danger', 'Certification deleted successfully.');
    }

    public function updateCertification(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'issuing_organisation' => 'required',
            'issuing_date' => 'required',
            'user_id' => 'required',
        ]);

        $input = $request->all();
    

        $certification = DeveloperCertification::findOrFail($request->id);
        $certification->update($input);
        
    
        return redirect()->route('admin.developerProfile', $request->user_id)->with('success', 'Certification updated successfully.');
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
