<?php

namespace App\Http\Controllers\Clerk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Address;
use App\Models\HealthCenter;
use App\Models\Subdivision;
use App\Models\Country;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ClerkPatientController extends Controller
{
    //
    public function index(){

           // Get the currently logged-in data clerk
           $dataClerk = Auth::user();
           // Get the hospital assigned to the data clerk
             $hospital = $dataClerk->healthCenter;
           // Get the total number of patients for the hospital
             $patients = Patient::where('health_center_id', $hospital->id)->get();
             $patients->load('address');
             $data['allPatient'] = $patients;

        return view('data_clerk.pages.patients.index',$data);
        
    }
    public function add(){
       $data['subdivisions']=Subdivision::all();
       $data['countries']=Country::all();

        return view('data_clerk.pages.patients.add',$data);
    }

    



    public function store(PatientRequest $request){
      
       $validatedData=$request->validated();
    // Generate a random alphanumeric identifier
    $identifier = Str::random(8); // Adjust the length as needed
    
    // Check if the identifier is already in use
    while (Patient::where('unique_patient_identifier', $identifier)->exists()) {
        $identifier = Str::random(8); // Regenerate until unique
    }

           // Create a new patient record
          
           $patient = Patient::create([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'contact' => $request->input('contact'),
            'emmergency_contact' => $request->input('emmergency_contact'),
            'gender' => $request->input('gender'),
            'health_center_id' => $request->input('health_center_id'),
            'email' => $request->input('email'),
            'unique_patient_identifier' =>$identifier, // Use = instead of ->
            'nationality' => $request->input('nationality'),
        ]);



    // // Create a new address record associated with the patient
       $address=Address::create([
        'community' => $request->input('community'),
        'subdivision_id' => $request->input('subdivision_id'),
        'city' => $request->input('city'),
        'patient_id' => $patient->id,
       ]);

        return redirect()->route('clerk.patient.index')->with('message','Patient recorded sucessfully');
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
        #dd($data['editPatient']);
        $data['subdivisions']=Subdivision::all();
        $data['healthCenters']=HealthCenter::all();
        $data['countries']=Country::all();
        return view('data_clerk.pages.patients.edit',$data);
    }

//    public function update(PatientRequest $request, $id)
// {
//     $validated = $request->validated();
    
//     $patient = Patient::findOrFail($id);
    
//     // Update patient attributes
   
//     $patient->update([
//         'name' => $validated['name'],
//         'dob' => $validated['dob'],
//         'contact' => $validated['contact'],
//         'emmergency_contact' => $validated['emmergency_contact'],
//         'gender' => $validated['gender'],
//         'health_center_id' => $validated['health_center_id'],
//         'email' => $validated['email'],
//         'nationality' => $validated['nationality'],
//     ]);

//     // Check if the patient has an associated address
    
//         // Update address attributes
//         $patient->address->update([
//             'community' => $validated['community'],
//             'subdivision_id' => $validated['subdivision_id'],
//             'city' => $validated['city'],
//         ]);
    
   
//     return redirect()->route('clerk.patient.index')->with('message', 'Patient updated successfully');
// }

public function update(Request $validated, $id)
{
    // Validate the request data
    //$validated = $request->validated();
    
    // Find the patient by ID
    $patient = Patient::findOrFail($id);
    //dd($patient->address);
    
    // Update patient attributes
    $patient->name = $validated['name'];
    $patient->dob = $validated['dob'];
    $patient->contact = $validated['contact'];
    $patient->emmergency_contact = $validated['emmergency_contact'];
    $patient->gender = $validated['gender'];
    // $patient->health_center_id = $validated['health_center_id'];
    $patient->email = $validated['email'];
    $patient->nationality = $validated['nationality'];

    // Check if the patient has an associated address
    if ($patient->address) {
        // Update address attributes
        $patient->address->community = $validated['community'];
        $patient->address->subdivision_id = $validated['subdivision_id'];
        $patient->address->city = $validated['city'];

        // Save the updated address
        $patient->address->save();
    }

    // Save the updated patient
    $patient->save();

    return redirect()->route('clerk.patient.index')->with('message', 'Patient record updated successfully');
}

public function destroy($id)
{
    $patient = Patient::findOrFail($id);

    // Delete the associated address record
    if ($patient->address) {
        $patient->address->delete();
    }

    // Delete the patient record
    $patient->delete();

    return redirect()->route('clerk.patient.index')->with('message', 'Patient and associated address deleted successfully');
}

}
