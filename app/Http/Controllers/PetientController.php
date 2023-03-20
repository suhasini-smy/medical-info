<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $procedure = "getPetientData()";
            $data['petientdata']  = CommonController::callMasterProcedure($procedure);

            $procedure = "getActivePetientData()";
            $data['activedata']  = CommonController::callMasterProcedure($procedure);

            $procedure = "getInActivePetientData()";
            $data['inactivedata']  = CommonController::callMasterProcedure($procedure);

            $data['total_petient'] = $data['activedata'][0]->records+$data['inactivedata'][0]->records;

            return view('dashboard',compact("data"));
            //return view('dashboard')->with('data',$data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('petient.add-petient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'petient_fname' => 'required|unique:petient|max:25',
            'petient_lname' => 'required|max:25',
            'petient_dob' => 'required|date_format:d/m/Y|after:today',
            'patient_gender'=>'required',
            'category_id'=>'required',
            'patient_number'=>'required|numeric|digits_between:9,11',
        ],
        [
            'petient_fname.required' => 'The petient fname field is required.',
            'petient_lname.required' => 'The petient lname field is required.',
            'petient_dob.required' => 'The petient dob field is required.',
            'patient_gender.required' => 'The petient gender field is required.',
            'category_id.required' => 'The petient category Id field is required.',
            'patient_number.required' => 'The petient number field is required.',
        ]);

        // The blog post is valid...

        return redirect('/posts');

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
