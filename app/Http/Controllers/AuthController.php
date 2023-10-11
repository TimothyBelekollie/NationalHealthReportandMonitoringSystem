<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LogoutResponse;
use App\Models\Patient;
use App\Models\HealthCenter;
use App\Models\Encounter;
use App\Models\EncounterDiagnosis;
use App\Models\BirthEvent;
use App\Models\DeathEvent;


class AuthController extends Controller
{
 /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
       
    }



// public function index(){
//     return view('ministry_of_health.dashboard');
// }
    //
    public function index(){
        $role=Auth::user()->role->name;
        if($role=="health_minister"){
            return view('ministry_of_health.dashboard');
        }
        elseif($role=="health_officer"){

            return view('health_officer.dashboard');

        }
        elseif($role=="chief_doctor"){

            return view('chief_doctor.dashboard');

        }
            elseif($role=="data_clerk"){
                  // Get the currently logged-in data clerk
   
                  $dataClerk = Auth::user();
                // Get the hospital assigned to the data clerk
                  $hospital = $dataClerk->healthCenter;

                // Get the total number of patients for the hospital
                  $data['totalPatients'] = Patient::where('health_center_id', $hospital->id)->count();
                // Get the total number of birth events for the hospital
                  $data['todayTotalBirthEvents'] = BirthEvent::where('health_center_id', $hospital->id)->where('created_at',today())->count();
                  
                  // Get the total number of encounters for the hospital
                  $data['totalEncounters']=Encounter::where('health_center_id',$hospital->id)->count();
                   // Get the total number of today encounters for the hospital
                  $data['todayTotalEncounters']=Encounter::where('health_center_id',$hospital->id)->where('created_at',today())->count();

                  $data['totalDeathEvents']=DeathEvent::where('health_center_id',$hospital->id)->count();
                  $data['todayTotalDeathEvents']=DeathEvent::where('health_center_id',$hospital->id)->where('created_at',today())->count();
                 
                 
                  $dataClerk = Auth::user();
                  $healthCenter = $dataClerk->healthCenter;
                  
                  $uniqueDiseases = [];
                  
                  // Get all encounters for the health center
                  $encounters = $healthCenter->encounters;
                  
                  foreach ($encounters as $encounter) {
                      foreach ($encounter->encounterDiagnoses as $encounterDiagnosis) {
                          // Assuming diagnosisDescription is an array or string field
                          if (is_array($encounterDiagnosis->diagnosisDescription)) {
                              // If it's an array, loop through and add each disease
                              foreach ($encounterDiagnosis->diagnosisDescription as $disease) {
                                  $uniqueDiseases[$disease] = true;
                              }
                          } else {
                              // If it's a string, add it directly
                              $uniqueDiseases[$encounterDiagnosis->diagnosisDescription] = true;
                          }
                      }
                  }
                  
                  // Count the unique diseases for this health center
                  $data['totalUniqueDiseases'] = count($uniqueDiseases);

                return view('data_clerk.dashboard',$data,compact('healthCenter','uniqueDiseases'));
    
            }
            
           
    }

    public function userlogout(Request $request){
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
