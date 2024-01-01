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

class LabTechnicianEncounterController extends Controller
{
    //
    // public function index(){
       

    //        // Get the currently logged-in data clerk
   
    //          $dataClerk = Auth::user();
    //        // Get the hospital assigned to the data clerk
    //          $hospital = $dataClerk->healthCenter;

    //        // Get the total number of patients for the hospital
    //         // $data['allPatients'] = Encounter::where('health_center_id', $hospital->id)->latest()->get();

    //         $data['allPatients'] = Encounter::with('encounterDiagno')
    //         ->where('health_center_id', $hospital->id)
    //         ->where('encounterDiagno.user_id', Auth::user()->id)
    //         ->latest()
    //         ->get();

    //     return view('data_clerk.pages.encounters.technicianEncounter.index',$data);


    // }
    public function index() {
        // Get the currently logged-in data clerk
        $dataClerk = Auth::user();
    
        // Get the hospital assigned to the data clerk
        $hospital = $dataClerk->healthCenter;
    
        $data['allPatients'] = Encounter::with('encounterDiagno')
            ->where('health_center_id', $hospital->id)
            ->whereHas('encounterDiagno', function ($query) use ($dataClerk) {
                $query->where('user_id', $dataClerk->id);
            })
            ->latest()
            ->get();
    
        return view('data_clerk.pages.encounters.technicianEncounter.index', $data);
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
        return view('data_clerk.pages.encounters.technicianEncounter.edit', compact('encounter','diagnosis','patients'));
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
            $diagnosis->user_id=Auth::user()->id;
            $diagnosis->save();
        }
        $encounter->save();
        return redirect()->route('clerk-technician.pat.encounter.index')->with('message', 'Record updated successfully');
    }
    
    
}
