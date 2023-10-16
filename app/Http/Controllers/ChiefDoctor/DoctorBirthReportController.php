<?php

namespace App\Http\Controllers\ChiefDoctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\BirthEvent;

class DoctorBirthReportController extends Controller
{
    //

    public function birthDetail(Request $request){

  // Retrieve the authenticated chief doctor and their assigned hospital
$chiefDoctor = Auth::user();
$hospital = $chiefDoctor->healthCenter;
 
// Get the selected year from the request (if provided)
$selectedYear = $request->input('year');

// If no specific year is selected, use the current year as the default
$currentYear = Carbon::now()->year;

// Use the selected year if provided, or use the current year as the default
$year = $selectedYear ?? $currentYear;
// Retrieve data grouped by month and gender
$monthlyData = BirthEvent::where('health_center_id', $hospital->id)
    ->selectRaw('MONTH(event_date) as month, baby_gender, COUNT(*) as count')
    ->whereYear('event_date', $year)
    ->whereIn('baby_gender', ['Male', 'Female'])
    ->groupBy('month', 'baby_gender')
    ->orderBy('month')
    ->get();

// Initialize an array to store data for each month
$monthlySummary = [];

// Initialize total counters
$totalMale = 0;
$totalFemale = 0;

foreach ($monthlyData as $data) {
    $month = $data->month;
    $gender = $data->baby_gender;
    $count = $data->count;

    if (!isset($monthlySummary[$month])) {
        $monthlySummary[$month] = [
            'Month' => date("F", mktime(0, 0, 0, $month, 1)),
            'Male' => 0,
            'Female' => 0,
        ];
    }

    // Update the summary data for each month
    $monthlySummary[$month][$gender] = $count;

    // Calculate Subtotal
    $monthlySummary[$month]['Subtotal'] = $monthlySummary[$month]['Male'] + $monthlySummary[$month]['Female'];

    // Update total counters
    $totalMale += ($gender === 'Male' ? $count : 0);
    $totalFemale += ($gender === 'Female' ? $count : 0);
}

// Calculate Total Children
$totalChildren = $totalMale + $totalFemale;




// Get the selected year from the request (if provided)
$selectedYear = $request->input('year');

// If no specific year is selected, use the current year as the default
$currentYear = Carbon::now()->year;

// Use the selected year if provided, or use the current year as the default
$year = $selectedYear ?? $currentYear;

// Query the BirthEvent model to get counts of 'Male' and 'Female' births for the selected year
$piebirths = BirthEvent::where('health_center_id', $hospital->id)
    ->whereYear('event_date', $year)
    ->whereIn('baby_gender', ['Male', 'Female'])
    ->select('baby_gender', \DB::raw('COUNT(*) as count'))
    ->groupBy('baby_gender')
    ->get();

$pielabels = $piebirths->pluck('baby_gender')->toArray(); // Labels for male and female
$data = $piebirths->pluck('count')->toArray(); // Data for male and female
$colors = ['#007bff', '#ff69b4']; // Colors for male and female

$piedatasets = [
    [
        'data' => $data,
        'backgroundColor' => $colors,
    ],
];













// Query the BirthEvent model to get counts of 'Male' and 'Female' births for the selected year
$births = BirthEvent::where('health_center_id', $hospital->id)
    ->selectRaw('Month(event_date) as month, baby_gender, COUNT(*) as count')
    ->whereYear('event_date', $year)
    ->whereIn('baby_gender', ['Male', 'Female'])
    ->groupBy('month', 'baby_gender')
    ->orderBy('month')
    ->get();


$months = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

$labels = $months; // Use the month names as labels

$data = [
    'Male' => [], // Data for male births
    'Female' => [], // Data for female births
];

$colors = ['#007bff', '#ff69b4']; // Colors for male and female

// Initialize data arrays
foreach ($months as $month) {
    foreach (['Male', 'Female'] as $gender) {
        $data[$gender][] = 0;
    }
}

// Populate data arrays with counts
foreach ($births as $birth) {
    $monthIndex = $birth->month - 1; // Convert month number to array index
    $gender = $birth->baby_gender;
    $data[$gender][$monthIndex] = $birth->count;
}

$datasets = [
    [
        'label' => 'Male',
        'data' => $data['Male'],
        'backgroundColor' => $colors[0],
    ],
    [
        'label' => 'Female',
        'data' => $data['Female'],
        'backgroundColor' => $colors[1],
    ],
];


    return view('chief_doctor.pages.birthReport.index', compact('datasets','labels','pielabels','piedatasets','monthlySummary','totalChildren','totalFemale','totalMale'));
    
    }
}
