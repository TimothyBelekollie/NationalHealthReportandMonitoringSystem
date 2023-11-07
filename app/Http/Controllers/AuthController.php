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
use App\Models\Subdivision;
use App\Models\Division;

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

            $today = Carbon::today();
   // Retrieve divisions with their related data
   $divisions = Division::with('subdivisions.healthCenters.encounters')->get();

   // Calculate the overall total encounters for each division
   $divisions->each(function ($division) use ($today) {
       $totalEncounters = 0;

       $division->subdivisions->each(function ($subdivision) use (&$totalEncounters,$today) {
           $subdivision->healthCenters->each(function ($healthCenter) use (&$totalEncounters,$today) {
           $totalEncounters += $healthCenter->encounters()->whereDate('created_at', $today)->count();
           });
       });

       $division->totalEncounters = $totalEncounters;
   });


   //Birth Events

    // Retrieve divisions with their related data
    $birthdivisions = Division::with('subdivisions.healthCenters.birthEvents')->get();

    // Calculate the overall total birth events for each division
    $birthdivisions->each(function ($birthdivision) use ($today) {
        $totalBirthEvents = 0;

        $birthdivision->subdivisions->each(function ($subdivision) use (&$totalBirthEvents,$today) {
            $subdivision->healthCenters->each(function ($healthCenter) use (&$totalBirthEvents,$today) {
                $totalBirthEvents += $healthCenter->birthEvents()->whereDate('created_at', $today)->count();
            });
        });

        $birthdivision->totalBirthEvents = $totalBirthEvents;
    });

   //dd($divisions);


   // Retrieve divisions with their related data
   $deathdivisions = Division::with('subdivisions.healthCenters.deathEvents')->get();

   // Calculate the overall total death events for each division
   $deathdivisions->each(function ($deathdivision) use ($today) {
       $totalDeathEvents = 0;

           $deathdivision->subdivisions->each(function ($subdivision) use (&$totalDeathEvents,$today) {
           $subdivision->healthCenters->each(function ($healthCenter) use (&$totalDeathEvents,$today) {
           $totalDeathEvents += $healthCenter->deathEvents()->whereDate('created_at', $today)->count();
           });
       });

       $deathdivision->totalDeathEvents = $totalDeathEvents;
   });






            return view('ministry_of_health.dashboard',compact('divisions','birthdivisions','deathdivisions'));
        }
        elseif($role=="health_officer"){
            $today = Carbon::now()->toDateString();
            $authenticatedUser = Auth::user(); // Assuming the authenticated user has a relationship to Division
            $division = $authenticatedUser->division; // Get the user's division
            $healthCentersCount = 0;
            // Start by counting health centers in the division's subdivisions
            $subdivision = $division->subdivision;
            
            foreach ($subdivision as $subdivision) {
                    $healthCentersCount += $subdivision->healthCenters()->count();
                    //$todayhealthCentersCount += $subdivision->healthCenters()->whereDate('created_at', $today)->count();
                }
 //**************************Today Register Health Center****************************** */               
                $todayhealthCentersCount = 0;
                $subdivisions = $division->subdivision;
                foreach ($subdivisions as $currentSubdivision) {
                    if ($currentSubdivision) {
                        $todayhealthCentersCount += $currentSubdivision->healthCenters()->whereDate('created_at', $today)->count();
                    }
                }


//**********************************TOTAL PATIENTS PER DIVISION********************* */
                $officer = Auth::user();
                $division = $officer->division;
                $subdivisions = $division->subdivisions;
                $patientEncounters = 0;
                $todaypatientEncounters = 0;
                 
                
                foreach ($subdivisions as $subdivision) {
                    $healthCenters = $subdivision->healthCenters;
                    
                    foreach ($healthCenters as $healthCenter) {
                        $patientEncounters += $healthCenter->encounters()->count();
                    }
                }

//**********************************TODAY TOTAL PATIENTS PER DIVISION********************* */
                $todaypatientEncounters = 0; 
                                
                foreach ($subdivisions as $subdivision) {
                    $healthCenters = $subdivision->healthCenters;
                    
                    foreach ($healthCenters as $healthCenter) {
                        $todaypatientEncounters += $healthCenter->encounters()->whereDate('created_at', $today)->count();
                    }
                }
        

//**********************************TOTAL BIRTH EVENTS PER DIVISION********************* */

            $birthEvents = 0;

          foreach ($subdivisions as $subdivision) {
            $healthCenters = $subdivision->healthCenters;
            
            foreach ($healthCenters as $healthCenter) {
             $birthEvents += $healthCenter->birthEvents()->count();
            }
        }

//**********************************TODAY TOTAL BIRTH EVENTS PER DIVISION********************* */
$todaybirthEvents = 0;

foreach ($subdivisions as $subdivision) {
  $healthCenters = $subdivision->healthCenters;
  
  foreach ($healthCenters as $healthCenter) {
      $todaybirthEvents += $healthCenter->birthEvents()->whereDate('created_at', $today)->count();
  }
}





//**********************************TOTAL DEATH EVENTS PER DIVISION********************* */
       
$deathEvents = 0;

foreach ($subdivisions as $subdivision) {
  $healthCenters = $subdivision->healthCenters;
  
  foreach ($healthCenters as $healthCenter) {
      $deathEvents += $healthCenter->deathEvents()->count();
  }
}
//dd($deathEvents);

//**********************************TODAY TOTAL DEATH EVENTS PER DIVISION********************* */
$todaydeathEvents = 0;

foreach ($subdivisions as $subdivision) {
  $healthCenters = $subdivision->healthCenters;
  
  foreach ($healthCenters as $healthCenter) {
      $todaydeathEvents += $healthCenter->deathEvents()->whereDate('created_at', $today)->count();
  }
}
     

//***********************************************************CARD DYNAMIC DATA END*************************************************** */



//*********************************************************** Bar chart of Patients Encounters Per Month *************************************************** */
$officer = Auth::user();
$division = $officer->division;
$subdivisions = $division->subdivisions;

// Initialize an array to store encounter counts for each month
$encounterCounts = array_fill(1, 12, 0);

foreach ($subdivisions as $subdivision) {
    $healthCenters = $subdivision->healthCenters;

    foreach ($healthCenters as $healthCenter) {
        $encounters = $healthCenter->encounters()
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        // Iterate through encounters and add counts to corresponding months
        foreach ($encounters as $encounter) {
            $month = $encounter->created_at->month;
            $encounterCounts[$month]++;
        }
    }
}


//*********************************************************** Bar chart of Patients BirthEvents Per Month *************************************************** */
$birthEventsCounts = array_fill(1, 12, 0);

foreach ($subdivisions as $subdivision) {
    $healthCenters = $subdivision->healthCenters;

    foreach ($healthCenters as $healthCenter) {
        $birthEvents = $healthCenter->birthEvents()
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        // Iterate through encounters and add counts to corresponding months
        foreach ($birthEvents as $birthEvent) {
            $month = $birthEvent->created_at->month;
            $birthEventsCounts[$month]++;
        }
    }
}


//*********************************************************** Bar chart of Patients DeathEvents Per Month *************************************************** */
$deathEventsCounts = array_fill(1, 12, 0);

foreach ($subdivisions as $subdivision) {
    $healthCenters = $subdivision->healthCenters;

    foreach ($healthCenters as $healthCenter) {
        $deathEvents = $healthCenter->deathEvents()
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        // Iterate through encounters and add counts to corresponding months
        foreach ($deathEvents as $deathEvent) {
            $month = $deathEvent->created_at->month;
            $deathEventsCounts[$month]++;
        }
    }
}
 

//*********************************************************** HealthCenters Per Subdivision *************************************************** */


$officer = Auth::user();
$division = $officer->division;
$subdivisions = $division->subdivisions;

// Initialize an array to store health center counts per subdivision
$healthCenterCounts = [];

foreach ($subdivisions as $subdivision) {
    $healthCenterCounts[$subdivision->name] = $subdivision->healthCenters()->count();
}


//*********************************************************** Patient Encounters Per Subdivision *************************************************** */

$officer = Auth::user();
$division = $officer->division;
$subdivisions = $division->subdivisions;

// Initialize an array to store encounter counts per subdivision for each month
$encounterCountsBySubdivision = [];

foreach ($subdivisions as $subdivision) {
    $subdivisionName = $subdivision->name;
    
    $encounterCountsBySubdivision[$subdivisionName] = [];

    for ($month = 1; $month <= 12; $month++) {
        $encounterCount = $subdivision->healthCenters->reduce(function ($carry, $healthCenter) use ($month) {
            return $carry + $healthCenter->encounters()
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        }, 0);

        $encounterCountsBySubdivision[$subdivisionName][$month] = $encounterCount;
    }
}
               

            
            

            return view('health_officer.dashboard', compact('encounterCountsBySubdivision','healthCenterCounts','encounterCounts','birthEventsCounts','deathEventsCounts','healthCentersCount','todayhealthCentersCount','patientEncounters','todaypatientEncounters','birthEvents','todaybirthEvents','deathEvents','todaydeathEvents'));

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
   
                  $Doctor = Auth::user();
                // Get the hospital assigned to the data clerk
                  $hospital = $Doctor->healthCenter;

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
                 
                 
                  $Doctor = Auth::user();
                  $healthCenter = $Doctor->healthCenter;
                  
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
