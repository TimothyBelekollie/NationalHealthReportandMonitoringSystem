<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\HealthCenter;
use App\Models\Division;
use App\Models\Patient;
use App\Models\Encounter;


class OfficerPatientReportController extends Controller
{
   
    public function patientDetail(Request $request){
        $selectedYear = $request->input('year');

        // If no specific year is selected, use the current year as the default
        $currentYear = Carbon::now()->year;
        
        // Use the selected year if provided, or use the current year as the default
        $year = $selectedYear ?? $currentYear;
       
        $officer = Auth::user();
        $division = $officer->division;
        
        // // Get the current year
        // $currentYear = now()->year;
        
        // Initialize arrays to store data for the graph
        $labels = []; // Subdivision names
        $data = []; // Patients count for each subdivision
        
        $subdivisions = $division->subdivisions;
        
        foreach ($subdivisions as $subdivision) {
            $labels[] = $subdivision->name;
            $patientsCount = $subdivision->healthCenters->reduce(function ($carry, $healthCenter) use ($year) {
                return $carry + $healthCenter->encounters()
                    ->whereYear('encounterDate',$year)
                    ->count();
            }, 0);
            $data[] = $patientsCount;
        }




  // Get the authenticated user's division
  $officer = Auth::user();
  $division = $officer->division;

//   // Get the current year
//   $currentYear = now()->year;


    // Query the database to get the male and female encounter counts for the division's subdivisions in the current year
    $piemaleCount = Encounter::whereHas('patient', function ($query) {
        $query->where('gender', 'Male');
    })->whereHas('healthCenter', function ($query) use ($division, $year) {
        $query->whereHas('subdivision', function ($subquery) use ($division) {
            $subquery->where('division_id', $division->id);
        })->whereYear('encounterDate', $year);
    })->count();

    $piefemaleCount = Encounter::whereHas('patient', function ($query) {
        $query->where('gender', 'Female');
    })->whereHas('healthCenter', function ($query) use ($division, $year) {
        $query->whereHas('subdivision', function ($subquery) use ($division) {
            $subquery->where('division_id', $division->id);
        })->whereYear('encounterDate', $year);
    })->count();







    $officer = Auth::user();
    $division = $officer->division;

    // Get the current year
    $currentYear = now()->year;

    
    // Initialize arrays to store the table data
    $tableData = [];

    // Loop through months
    for ($month = 1; $month <= 12; $month++) {
        $rowData = [];
        $monthName = date('F', mktime(0, 0, 0, $month, 1));

        // Loop through subdivisions
        foreach ($division->subdivisions as $subdivision) {
            $maleCount = Encounter::whereHas('patient', function ($query) {
                $query->where('gender', 'Male');
            })->whereHas('healthCenter', function ($query) use ($subdivision) {
                $query->where('subdivision_id', $subdivision->id);
            })->whereYear('encounterDate', $year)
              ->whereMonth('encounterDate', $month)
              ->count();

            $femaleCount = Encounter::whereHas('patient', function ($query) {
                $query->where('gender', 'Female');
            })->whereHas('healthCenter', function ($query) use ($subdivision) {
                $query->where('subdivision_id', $subdivision->id);
            })->whereYear('encounterDate', $year)
              ->whereMonth('encounterDate', $month)
              ->count();

            $subtotal = $maleCount + $femaleCount;

            $rowData[] = [
                'month' => $monthName,
                'subdivision' => $subdivision->name,
                'male' => $maleCount,
                'female' => $femaleCount,
                'subtotal' => $subtotal,
            ];
        }

        $tableData[] = $rowData;
    }

    // Calculate male subtotal, female subtotal, and overall total
    $maleSubtotal = 0;
    $femaleSubtotal = 0;

    foreach ($tableData as $rowData) {
        foreach ($rowData as $row) {
            $maleSubtotal += $row['male'];
            $femaleSubtotal += $row['female'];
        }
    }

    $overallTotal = $maleSubtotal + $femaleSubtotal;

















         // return view('health_officer.pages.patientReport.index',compact('femaleBirthEventCounts','maleBirthEventCounts','maleTotal','femaleTotal','overallTotal','birthEventCounts','maleBirthEventCounts','femaleBirthEventCounts'));
          return view('health_officer.pages.patientReport.index',compact('labels','data','piefemaleCount','piemaleCount','tableData', 'maleSubtotal', 'femaleSubtotal', 'overallTotal'));
          
          }

}
