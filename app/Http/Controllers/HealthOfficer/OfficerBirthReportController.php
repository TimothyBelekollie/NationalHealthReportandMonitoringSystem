<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\BirthEvent;
use App\Models\Division;



class OfficerBirthReportController extends Controller
{
      //

      public function birthDetail(Request $request){

        $officer = Auth::user();
        $division = $officer->division;
        // Get the selected year from the request (if provided)
// Get the selected year from the request (if provided)
$selectedYear = $request->input('year');

// If no specific year is selected, use the current year as the default
$currentYear = Carbon::now()->year;

// Use the selected year if provided, or use the current year as the default
$year = $selectedYear ?? $currentYear;

// Initialize an array to store Birth Event counts for the division for each month
$birthEventCounts = [];

for ($month = 1; $month <= 12; $month++) {
    $birthEventCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
            return $count + $healthCenter->birthEvents()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();
        }, 0);
    }, 0);

    $birthEventCounts[] = $birthEventCount;
}
        





$officer = Auth::user();
$division = $officer->division;

// Get the selected year from the request (if provided)
$selectedYear = $request->input('year');

// If no specific year is selected, use the current year as the default
$currentYear = Carbon::now()->year;

// Use the selected year if provided, or use the current year as the default
$year = $selectedYear ?? $currentYear;

// Initialize arrays to store Male and Female Birth Event counts for each month
$maleBirthEventCounts = [];
$femaleBirthEventCounts = [];

for ($month = 1; $month <= 12; $month++) {
    $maleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
            return $count + $healthCenter->birthEvents()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('baby_gender', 'Male')
                ->count();
        }, 0);
    }, 0);

    $femaleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month, $year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month, $year) {
            return $count + $healthCenter->birthEvents()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('baby_gender', 'Female')
                ->count();
        }, 0);
    }, 0);

    $maleBirthEventCounts[] = $maleCount;
    $femaleBirthEventCounts[] = $femaleCount;
}







$officer = Auth::user();
$division = $officer->division;
// Get the selected year from the request (if provided)
$selectedYear = $request->input('year');

// If no specific year is selected, use the current year as the default
$currentYear = Carbon::now()->year;

// Use the selected year if provided, or use the current year as the default
$year = $selectedYear ?? $currentYear;
// Initialize arrays to store Male and Female Birth Event counts for each month
$maleBirthEventCounts = [];
$femaleBirthEventCounts = [];

for ($month = 1; $month <= 12; $month++) {
    $maleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month,$year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month,$year) {
            return $count + $healthCenter->birthEvents()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('baby_gender', 'Male')
                ->count();
        }, 0);
    }, 0);

    $femaleCount = $division->subdivisions->reduce(function ($carry, $subdivision) use ($month,$year) {
        return $carry + $subdivision->healthCenters->reduce(function ($count, $healthCenter) use ($month,$year) {
            return $count + $healthCenter->birthEvents()
                ->whereYear('created_at',$year)
                ->whereMonth('created_at', $month)
                ->where('baby_gender', 'Female')
                ->count();
        }, 0);
    }, 0);

    $maleBirthEventCounts[] = $maleCount;
    $femaleBirthEventCounts[] = $femaleCount;
}

// Calculate Male Total, Female Total, and Overall Total
$maleTotal = array_sum($maleBirthEventCounts);
$femaleTotal = array_sum($femaleBirthEventCounts);
$overallTotal = $maleTotal + $femaleTotal;


      
    $femaleBirthEventCounts[] = $femaleCount;
          return view('health_officer.pages.birthReport.index',compact('femaleBirthEventCounts','maleBirthEventCounts','maleTotal','femaleTotal','overallTotal','birthEventCounts','maleBirthEventCounts','femaleBirthEventCounts'));
          
          }

}
