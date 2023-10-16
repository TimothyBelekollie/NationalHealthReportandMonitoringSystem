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
use Carbon\Carbon;

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
            //Generic Code
            $chiefDoctor = Auth::user();
            $hospital = $chiefDoctor->healthCenter;


// compare death event and birth event

$year = date('Y'); // Get the current year

    $monthlyCounts = [];
    $months = [];

    for ($month = 1; $month <= 12; $month++) {
        $startOfMonth = Carbon::create($year, $month, 1, 0, 0, 0);
        $endOfMonth = Carbon::create($year, $month, 1, 0, 0, 0)->endOfMonth();

        $birthEventsCount = BirthEvent::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('health_center_id', $hospital->id)->count();
        $deathEventsCount = DeathEvent::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('health_center_id', $hospital->id)->count();

        $monthlyCounts['Birth Events'][] = $birthEventsCount;
        $monthlyCounts['Death Events'][] = $deathEventsCount;

        $months[] = date("F", strtotime("$year-$month-01"));

    }


















           //Death Event Code
         
           $deaths = DeathEvent::where('health_center_id', $hospital->id)->selectRaw('Month(created_at) as month, COUNT(*) as count')
            
           ->whereYear('created_at',date('Y'))->groupBy('month')->orderBy('month')->get();

           $deathlabels=[];
           $data=[];
           $colors=['#FF6384','#36A2EB','#FFCE56','#8BC34A','#FF5722','#009688','#795548','#9C27B0','#2196F3','#FF9800','#CDDC39','#607D8B'];

           for($i=1;$i<=12;$i++){
               $month=date('F',mktime(0,0,0,$i,1));
               $count=0;

               foreach($deaths as $death){
                   if($death->month==$i){
                       $count=$death->count;
                       break;
                   }
               }
               array_push($deathlabels,$month);
               array_push($data,$count);
           }
$deathdatasets=[
   [
       'label'=>'Death Events',
       'data'=>$data,
       'backgroundColor'=>$colors

   ]
   ];
 
           






// Birth Bar Chart Code

            $births = BirthEvent::where('health_center_id', $hospital->id)->selectRaw('Month(created_at) as month, COUNT(*) as count')
            
            ->whereYear('created_at',date('Y'))->groupBy('month')->orderBy('month')->get();

            $labels=[];
            $data=[];
            $colors=['#FF6384','#36A2EB','#FFCE56','#8BC34A','#FF5722','#009688','#795548','#9C27B0','#2196F3','#FF9800','#CDDC39','#607D8B'];

            for($i=1;$i<=12;$i++){
                $month=date('F',mktime(0,0,0,$i,1));
                $count=0;

                foreach($births as $birth){
                    if($birth->month==$i){
                        $count=$birth->count;
                        break;
                    }
                }
                array_push($labels,$month);
                array_push($data,$count);
            }
$datasets=[
    [
        'label'=>'Birth Events',
        'data'=>$data,
        'backgroundColor'=>$colors

    ]
    ];


















              // Get the currently logged-in data clerk
   
              $chiefDoctor = Auth::user();
              // Get the hospital assigned to the data clerk
                $hospital = $chiefDoctor->healthCenter;

              // Get the total number of patients for the hospital
                $data['totalPatients'] = Patient::where('health_center_id', $hospital->id)->count();
                $data['todayTotalPatients'] = Patient::where('health_center_id', $hospital->id)->where('created_at',today())->count();
              // Get the total number of birth events for the hospital
                $data['totalBirthEvents'] = BirthEvent::where('health_center_id', $hospital->id)->count();
                $data['todayTotalBirthEvents'] = BirthEvent::where('health_center_id', $hospital->id)->where('created_at',today())->count();
                
                // Get the total number of encounters for the hospital
                $data['totalEncounters']=Encounter::where('health_center_id',$hospital->id)->count();
                 // Get the total number of today encounters for the hospital
                $data['todayTotalEncounters']=Encounter::where('health_center_id',$hospital->id)->where('created_at',today())->count();

                $data['totalDeathEvents']=DeathEvent::where('health_center_id',$hospital->id)->count();
                $data['todayTotalDeathEvents']=DeathEvent::where('health_center_id',$hospital->id)->where('created_at',today())->count();
               
               
                $chiefDoctor = Auth::user();
                $healthCenter = $chiefDoctor->healthCenter;
                
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

            return view('chief_doctor.dashboard',$data,compact('datasets','labels','deathdatasets','deathlabels','monthlyCounts', 'months'));

        }
//*********************************ASHBOARD FOR DATA CLERK*********************************
            elseif($role=="data_clerk"){
                  // Get the currently logged-in data clerk
   
                  $chiefDoctor = Auth::user();
                // Get the hospital assigned to the data clerk
                  $hospital = $chiefDoctor->healthCenter;

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
                 
                 
                  $chiefDoctor = Auth::user();
                  $healthCenter = $chiefDoctor->healthCenter;
                  
                  $uniqueDiseases = [];
                  
                  // Get all encounters for the health center
                  $encounters = $healthCenter->encounters;
                  
                  foreach ($encounters as $encounter) {
                      foreach($encounter->encounterDiagnoses as $encounterDiagnosis) {
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
