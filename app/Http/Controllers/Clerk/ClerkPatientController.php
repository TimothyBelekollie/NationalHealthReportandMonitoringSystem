<?php

namespace App\Http\Controllers\Clerk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Address;
use App\Models\Subdivision;
use App\Http\Requests\PatientRequest;


class ClerkPatientController extends Controller
{
    //
    public function index(){
        $data['allPatient']=Patient::latest()->get();

        return view('data_clerk.pages.patients.index',$data);
    }
    public function add(){
       $data['subdivisions']=Subdivision::all();

        return view('data_clerk.pages.patients.add',$data);
    }
    public function store(PatientRequest $request){
        #dd($request->all());
        $validated=$request->validated();
           // Create a new patient record
          
        $patient = Patient::create([
        'name' => $request->input('name'),
        'dob' => $request->input('dob'),
        'contact' => $request->input('contact'),
        'emmergency_contact' => $request->input('emmergency_contact'),
        'gender' => $request->input('gender'),
        'health_center_id' => $request->input('health_center_id'),
        'email' => $request->input('email'),
        
        'nationality' => $request->input('nationality'),
       ]);
  
    // // Create a new address record associated with the patient
       $address=Address::create([
        'community' => $request->input('community'),
        'subdivision_id' => $request->input('subdivision_id'),
        'city' => $request->input('city'),
        'patient_id' => $patient->id,
       ]);

        return redirect()->route('clerk.patient.index')->with('message','Patient save sucessfully');
    }

    

// public function store(PatientRequest $request)
// {
//     try {
//         // Start a database transaction
//         DB::beginTransaction();

//         // Validate the incoming data
//        $validated = $request->validated();
//        dd($validated);

//         // Create a new patient record
//         $patient = Patient::create([
//             'name' => $validated['name'],
//             'dob' => $validated['dob'],
//             'contact' => $validated['contact'],
//             'emmergency_contact' => $validated['emmergency_contact'],
//             'gender' => $validated['gender'],
//             'health_center_id' => $validated['health_center_id'],
//             'email' => $validated['email'],
//             'nationality' => $validated['nationality'],
//         ]);

//         // Create a new address record associated with the patient
//         $address=Address::create([
//             'community' => $validated['community'],
//             'subdivision_id' => $validated['subdivision_id'],
//             'city' => $validated['city'],
//             'patient_id' => $patient->id,
//         ]);

//         // Commit the database transaction if everything is successful
//         DB::commit();

//         return redirect()->route('clerk.patient.index')->with('message', 'Patient saved successfully');
//     } catch (\Exception $e) {
//         // Rollback the transaction in case of an error
//         DB::rollBack();

//         // Log the exception for debugging
//         \Log::error($e);

//         return redirect()->back()->with('error', 'An error occurred while saving the patient.');
//     }
// }


    public function edit($id){
       
        $data['editPatient']=Patient::find($id);

        return view('data_clerk.pages.patients.add',$data);
    }
    public function update(PatientRequest $request, $id){
        $validated = $request->validated();
        $update=Patient::find($id);
        $update->name=$request->name;
        $update->address=$request->address;
        $update->dob=$request->dob;
        $update->gender=$request->gender;
        $update->health_center_id=$request->health_center_id;
        $update->save();

        return view('data_clerk.pages.patients.add',$data);
    }
    public function destroy($id){
        $destroy=Patient::find($id);
        $destroy->delete();
        return redirect()->back()->with('message','Patient deleted successfully');
    }

}
