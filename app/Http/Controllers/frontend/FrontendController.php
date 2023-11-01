<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Patient;
use App\models\Division;
use App\Models\HealthCenter;
use App\models\Subdivision;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    //
    public function contactIndex(){
return view('frontend.pages.contactus.index');
    }

    
    // public function HealthIndex(){
    //     return view('frontend.pages.healthcenters.index');
    // }
    public function HealthIndex(){
        $divisions=Division::all();
        $subdivisions=Subdivision::all();
        $healthcenters=HealthCenter::all();
        return view('frontend.pages.healthcenters.index',compact('divisions','subdivisions','healthcenters'));
    }
   public function HealthShow($id){
    $healthCenter=HealthCenter::find($id);
    return view('frontend.pages.healthcenters.show',compact('healthCenter'));

   }

    public function patientHistory(){
return view('frontend.pages.patientsrecord.index');
        
    }

    public function showPatient(Request $request){
        $patientUniqueIdentifier =$request->unicode;
        $patientDOB = $request->dob;
        $patient = Patient::where('unique_patient_identifier', $patientUniqueIdentifier)
        ->where('dob', $patientDOB)
        ->with('encounters.encounterDiagnoses.user')
        ->first();

 
      
    
    if ($patient) {
        return view('data_clerk.medicalHistory.index', ['patient' => $patient]);
    } else {
        // Handle the case when the patient is not found
        return view('frontend.pages.patientsrecord.index')->with('message',"Data not found");
    }


                
            }

            
}
