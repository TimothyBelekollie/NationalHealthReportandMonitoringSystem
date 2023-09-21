<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encounter;
use App\Models\Patient;
use App\Models\EncounterDiagnosis;
use Illuminate\Support\Facades\Auth;

class ClerkPatientEncounterController extends Controller
{
    //
    public function index(){
        $data['allData']=Encounter::latest()->get();
        return view('data_clerk.pages.encounters.index',$data);
    }
    public function add(){
        $data['patients']=Patient::latest()->get();
        return view('data_clerk.pages.encounters.add',$data);
        
    }

    public function store(Request $request){
        //dd($request->all());
       // $validatedData=$request->validated();
               // Create a new patient record
              
               $encouter = Encounter::create([
                'encounterDate' => $request->input('encounterDate'),
                'health_center_id' => $request->input('health_center_id'),
                'patient_id' => $request->input('patient_id'),
               
            ]);
    
    
    
        // // Create a new address record associated with the patient
        $diagnosis = EncounterDiagnosis::create([
            'diagnosisCode' => $request->input('diagnosisCode'),
            'testConducted' => explode(',', $request->input('testConducted')), // Convert to an array
            'diagnosisDescription' =>explode(',',$request->input('diagnosisDescription')), // Use the correct field name
            'encounter_id' => $encouter->id,
            'doctor_prescription' => $request->input('doctor_prescription'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('clerk.pat.encounter.index')->with('message',' You have recorded Patient Encounter Successfully');
        
    }

    public function edit($id)
    {
        // Retrieve the existing record by its ID
        $encounter = Encounter::findOrFail($id);
      //  dd($encounter);
    
        // You can similarly retrieve the associated diagnosis record if needed
        $diagnosis = EncounterDiagnosis::where('encounter_id', $encounter->id)->first();
        $patients=Patient::latest()->get();
    
        // Return a view with the data for editing
        return view('data_clerk.pages.encounters.edit', compact('encounter','diagnosis','patients'));
    }

    
    public function update(Request $request, $id)
    {
        // Retrieve the existing record by its ID
        $encounter = Encounter::findOrFail($id);
    
        // Update the fields with the new values from the form
        $encounter->encounterDate = $request->input('encounterDate');
        $encounter->health_center_id = $request->input('health_center_id');
        $encounter->patient_id = $request->input('patient_id');
       
    
        // Similarly, update the associated diagnosis record if needed
        $diagnosis = EncounterDiagnosis::where('encounter_id', $encounter->id)->first();
        if ($diagnosis) {
            $diagnosis->diagnosisCode = $request->input('diagnosisCode');
            $diagnosis->testConducted = explode(',', $request->input('testConducted'));
            $diagnosis->diagnosisDescription = explode(',', $request->input('diagnosisDescription'));
            $diagnosis->doctor_prescription = $request->input('doctor_prescription');
            $diagnosis->save();
        }
        $encounter->save();
        return redirect()->route('clerk.pat.encounter.index')->with('message', 'Record updated successfully');
    }
    

    public function destroy($id)
    {
        // Retrieve the encounter record by its ID
        $encounter = Encounter::findOrFail($id);
    
        // Retrieve and delete the associated diagnosis record (if it exists)
        $diagnosis = EncounterDiagnosis::where('encounter_id', $encounter->id)->first();
        if ($diagnosis) {
            $diagnosis->delete();
        }
    
        // Delete the encounter record
        $encounter->delete();
    
        return redirect()->route('clerk.pat.encounter.index')->with('message', 'Record deleted successfully');
    }
    

}
