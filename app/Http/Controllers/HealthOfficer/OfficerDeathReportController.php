<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\DeathEvent;
use App\Models\Division;

class OfficerDeathReportController extends Controller
{
      //

      public function deathDetail(Request $request){

        $officer = Auth::user();
        $division = $officer->division;
        // Get the selected year from the request (if provided)
// Get the selected year from the request (if provided)
$selectedYear = $request->input('year');

// If no specific year is selected, use the current year as the default
$currentYear = Carbon::now()->year;

// Use the selected year if provided, or use the current year as the default
$year = $selectedYear ?? $currentYear;

// Initialize an array to store death Event counts for the division for each month
$deathEventCounts = [];

for ($month = 1; $month <= 12; $month++) {
    $deathEventCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
            return $count + $healthCenter->deathEvents()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();
        }, 0);
    }, 0);

    $deathEventCounts[] = $deathEventCount;
}
        





$officer = Auth::user();
$division = $officer->division;

// Initialize arrays to store Female and Male Death Event counts for each month
$femaleDeathEventCounts = [];
$maleDeathEventCounts = [];

for ($month = 1; $month <= 12; $month++) {
    $femaleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
            return $count + $healthCenter->deathEvents()
                ->whereYear('event_date', $year)
                ->whereMonth('event_date', $month)
                ->whereHas('patient', function ($query) {
                    $query->where('gender', 'Female');
                })
                ->count();
        }, 0);
    }, 0);

    $maleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
            return $count + $healthCenter->deathEvents()
                ->whereYear('event_date', $year)
                ->whereMonth('event_date', $month)
                ->whereHas('patient', function ($query) {
                    $query->where('gender', 'Male');
                })
                ->count();
        }, 0);
    }, 0);

    $femaleDeathEventCounts[] = $femaleCount;
    $maleDeathEventCounts[] = $maleCount;
}

// Now you have arrays $femaleDeathEventCounts and $maleDeathEventCounts containing counts of female and male death events for each month.







    $officer = Auth::user();
    $division = $officer->division;

    // Get the selected year from the request (if provided)
    $selectedYear = $request->input('year');

    // If no specific year is selected, use the current year as the default
    $currentYear = Carbon::now()->year;

    // Use the selected year if provided, or use the current year as the default
    $year = $selectedYear ?? $currentYear;

    // Initialize arrays to store Male and Female death event counts for each month
    $tabmaleDeathEventCounts = [];
    $tabfemaleDeathEventCounts = [];

    for ($month = 1; $month <= 12; $month++) {
        $maleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
            return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
                return $count + $healthCenter->deathEvents()
                    ->whereYear('event_date', $year)
                    ->whereMonth('event_date', $month)
                    ->whereHas('patient', function ($query) {
                        $query->where('gender', 'Male');
                    })
                    ->count();
            }, 0);
        }, 0);

        $femaleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
            return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
                return $count + $healthCenter->deathEvents()
                    ->whereYear('event_date', $year)
                    ->whereMonth('event_date', $month)
                    ->whereHas('patient', function ($query) {
                        $query->where('gender', 'Female');
                    })
                    ->count();
            }, 0);
        }, 0);

        $tabmaleDeathEventCounts[] = $maleCount;
        $tabfemaleDeathEventCounts[] = $femaleCount;
    }

    // Calculate Male Total, Female Total, and Overall Total
    $tabmaleTotal = array_sum($tabmaleDeathEventCounts);
    $tabfemaleTotal = array_sum($tabfemaleDeathEventCounts);
    $taboverallTotal = $tabmaleTotal + $tabfemaleTotal;
      
    $tabfemaledeathEventCounts[] = $femaleCount;
          //return view('health_officer.pages.deathReport.index',compact('femaledeathEventCounts','maledeathEventCounts','maleTotal','femaleTotal','overallTotal','deathEventCounts','maledeathEventCounts','femaledeathEventCounts'));
          return view('health_officer.pages.deathReport.death_report',compact('deathEventCounts','maleDeathEventCounts','femaleDeathEventCounts','tabmaleDeathEventCounts', 'tabfemaleDeathEventCounts', 'tabmaleTotal', 'tabfemaleTotal', 'taboverallTotal'));
          
          }

}
