<?php

namespace App\Http\Controllers\ChiefDoctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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

class ChiefDoctorUniqueDiseasesController extends Controller
{
    //
    public function index(Request $request){
        $Doctor = Auth::user();
        $healthCenter = $Doctor->healthCenter;
        
        $uniqueDiseases = [];
        
        // Get the start and end dates from your request or user input
        // $startDate = '2023-01-01'; // Replace with your start date
        $startDate = $request->input('start_date');
        // $endDate = '2023-12-31';   // Replace with your end date
        $endDate = $request->input('end_date');

        
        // Get all encounters for the health center within the date range
        $encounters = $healthCenter->encounters()->whereBetween('encounterDate', [$startDate, $endDate])->get();
        
        foreach ($encounters as $encounter) {
            foreach ($encounter->encounterDiagnoses as $encounterDiagnosis) {
                if (is_array($encounterDiagnosis->diagnosisDescription)) {
                    foreach ($encounterDiagnosis->diagnosisDescription as $disease) {
                        if (is_string($disease)) {
                            $disease = htmlspecialchars($disease);
                            if (!isset($uniqueDiseases[$disease])) {
                                $uniqueDiseases[$disease] = 1;
                            } else {
                                $uniqueDiseases[$disease]++;
                            }
                        }
                    }
                } else {
                    $disease = $encounterDiagnosis->diagnosisDescription;
                    if (is_string($disease)) {
                        $disease = htmlspecialchars($disease);
                        if (!isset($uniqueDiseases[$disease])) {
                            $uniqueDiseases[$disease] = 1;
                        } else {
                            $uniqueDiseases[$disease]++;
                        }
                    }
                }
            }
        }
        
        $data['totalDiseases'] = $uniqueDiseases;
        
        
return view('chief_doctor.pages.unique diseases.index',$data);
    }
}
