<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encounter;
use App\Models\Patient;
use App\Models\User;
use App\Models\EncounterDiagnosis;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthCenter;

class ClerkPatientEncounterController extends Controller
{
    //
    public function index(){
        //$data['allData']=Encounter::latest()->get();

           // Get the currently logged-in data clerk
   
             $dataClerk = Auth::user();
           // Get the hospital assigned to the data clerk
             $hospital = $dataClerk->healthCenter;

           // Get the total number of patients for the hospital
            // $data['allPatients'] = Encounter::where('health_center_id', $hospital->id)->latest()->get();

            $data['allPatients'] = Encounter::with('encounterDiagno')
            ->where('health_center_id', $hospital->id)
            ->latest()
            ->get();

        return view('data_clerk.pages.encounters.index',$data);


    }

    public function indexTwo(){
        //$data['allData']=Encounter::latest()->get();

           // Get the currently logged-in data clerk
   
             $dataClerk = Auth::user();
           // Get the hospital assigned to the data clerk
             $hospital = $dataClerk->healthCenter;

           // Get the total number of patients for the hospital
            // $data['allPatients'] = Encounter::where('health_center_id', $hospital->id)->latest()->get();

            $data['allPatients'] = Encounter::with('encounterDiagno')
            ->where('health_center_id', $hospital->id)
            ->latest()
            ->get();

        return view('data_clerk.pages.encounters.indextwo',$data);

        
    }
     public function add(){
        $data['patients']=Patient::latest()->get();
        return view('data_clerk.pages.encounters.add',$data);
        
     }
     public function addTwo(){
        $data['patients']=Patient::latest()->get();
        $data['data_clerks']=User::latest()->where('health_center_id',Auth::user()->health_center_id)->where('usertype','Doctor')->get();
        return view('data_clerk.pages.encounters.addtwo',$data);
        
     }


     public function storeRep(Request $request){
        $patient_id=$request->patient_id;
        $patient = Patient::findOrFail($patient_id);
       // Use the current timestamp as part of the diagnosis code
       $timestamp = now()->format('YmdHis');
       $diagnosisCode = strtoupper(substr($patient->name, 0, 3)) . '_' . $timestamp . '_' . uniqid();
        
       
              




               $encouter = Encounter::create([
                'encounterDate' => $request->input('encounterDate'),
                'health_center_id' => $request->input('health_center_id'),
                'patient_id' => $request->input('patient_id'),
                'user_id' => $request->input('user_id')
             
               
                  ]);
    
    
    
        // // // Create a new address record associated with the patient
        $diagnosis = EncounterDiagnosis::create([
             'diagnosisCode'=>$diagnosisCode,
             'encounter_id' => $encouter->id,
        ]);

        return redirect()->route('clerk.pat.encounter.index')->with('message',' You have successfully assign patient encounter');
        
    }

       public function store(Request $request){
        $patient_id=$request->patient_id;
        $patient = Patient::findOrFail($patient_id);
       // Use the current timestamp as part of the diagnosis code
       $timestamp = now()->format('YmdHis');
       $diagnosisCode = strtoupper(substr($patient->name, 0, 3)) . '_' . $timestamp . '_' . uniqid();

       
              


              
               $encouter = Encounter::create([
                'encounterDate' => $request->input('encounterDate'),
                'health_center_id' => $request->input('health_center_id'),
                'patient_id' => $request->input('patient_id'),
               
            ]);
    
    
    
        // // Create a new address record associated with the patient
        $diagnosis = EncounterDiagnosis::create([
            'diagnosisCode' =>  $diagnosisCode,
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
        $labTechnicians=User::where('usertype','Laboratory-Technician')->where('health_center_id',Auth::user()->health_center_id)->get();
        $patients=Patient::latest()->get();
    
        // Return a view with the data for editing
        return view('data_clerk.pages.encounters.edit', compact('labTechnicians','encounter','diagnosis','patients'));
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
            
            $diagnosis->testConducted = explode(',', $request->input('testConducted'));
            $diagnosis->diagnosisDescription = explode(',', $request->input('diagnosisDescription'));
            $diagnosis->doctor_prescription = $request->input('doctor_prescription');
            $diagnosis->user_id=$request->input('user_id');
            $diagnosis->save();
        }
        $encounter->save();
        return redirect()->route('clerk.pat.encounter.indextwo')->with('message', 'Record updated successfully');
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
