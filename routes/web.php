<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//Data Clerk
use App\Http\Controllers\Clerk\ProfileController as ClerkProfile;
use App\Http\Controllers\Clerk\ClerkPatientController;
use App\Http\Controllers\Clerk\ClerkPatientEncounterController;
use App\Http\Controllers\Clerk\ClerkBirthEventController;
use App\Http\Controllers\Clerk\ClerkDeathEventController;


// Chief Doctor Controllers
use App\Http\Controllers\ChiefDoctor\ChiefDoctorProfileController;
use App\Http\Controllers\ChiefDoctor\DoctorDataClerkController;


// Health Officer Controllers
use App\Http\Controllers\HealthOfficer\OfficerProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('redirects-dashboard',[AuthController::class,'index'])->name("dashboard");
    Route::get('/logout',[AuthController::class,'userlogout'])->name('user.logout');

});



// Route::middleware([
//     'auth:sanctum','role:health_minister',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/min/dashboard', function () {
//         return view('ministry_of_health.dashboard');
//     })->name('min.dashboard');
// });

// Route::middleware([
//     'auth:sanctum','role:health_officer',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/county/officer/dashboard', function () {
//         return view('health_officer.dashboard');
//     })->name('off.dashboard');
// });

// Route::middleware([
//     'auth:sanctum','role:chief_doctor',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/doctor/dashboard', function () {
//         return view('chief_doctor.dashboard');
//     })->name('doctor.dashboard');
// });

// Route::middleware([
//     'auth:sanctum','role:health_minister',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/clerk-data/dashboard', function () {
//         return view('data_clerk.dashboard');
//     })->name('clerk.dashboard');
// });


// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::middleware(['role:health_minister'])->group(function () {
//         Route::get('/min/dashboard', function () {
//             return view('ministry_of_health.dashboard');
//         })->name('min.dashboard');
//     });

//     Route::middleware(['role:health_officer'])->group(function () {
//         Route::get('/county/officer/dashboard', function () {
//             return view('health_officer.dashboard');
//         })->name('off.dashboard');
//     });

//     Route::middleware(['role:chief_doctor'])->group(function () {
//         Route::get('/doctor/dashboard', function () {
//             return view('chief_doctor.dashboard');
//         })->name('doctor.dashboard');
//     });

//     Route::middleware(['role:data_clerk'])->group(function () {
//         Route::get('/clerk-data/dashboard', function () {
//             return view('data_clerk.dashboard');
//         })->name('clerk.dashboard');
//     });
// });

// SESSION OF  Health Minister
Route::middleware(['auth:sanctum','verified','role:health_minister'])->group(function (){
    Route::get('/health-minister/profile',[OfficerProfileController::class,'index'])->name('officer.profile.index');
    Route::get('/health-minister/profile/edit',[OfficerProfileController::class,'edit'])->name('officer.profile.edit');
    Route::post('/health-minister/profile/update',[OfficerProfileController::class,'update'])->name('officer.profile.update');

     // Health Officer Change of Password
     Route::get('/health-officer/password/change',[OfficerProfileController::class,'OfficerChangePassword'])->name('officer.change.password');
     Route::post('/health-officer/password/update',[OfficerProfileController::class,'OfficerUpdatePassword'])->name('officer.update.password');

});

Route::middleware(['auth:sanctum','verified','role:health_officer'])->group(function (){
    Route::get('/health-officer/profile',[OfficerProfileController::class,'index'])->name('officer.profile.index');
    Route::get('/health-officer/profile/edit',[OfficerProfileController::class,'edit'])->name('officer.profile.edit');
    Route::post('/health-officer/profile/update',[OfficerProfileController::class,'update'])->name('officer.profile.update');

     // Health Officer Change of Password
     Route::get('/health-officer/password/change',[OfficerProfileController::class,'OfficerChangePassword'])->name('officer.change.password');
     Route::post('/health-officer/password/update',[OfficerProfileController::class,'OfficerUpdatePassword'])->name('officer.update.password');


});







// SESSION OF  CHIEF_DOCTOR
Route::middleware(['auth:sanctum','verified','role:chief_doctor'])->group(function (){
    Route::get('/chief-doctor/profile',[ChiefDoctorProfileController::class,'index'])->name('doctor.profile.index');
    Route::get('/chief-doctor/profile/edit',[ChiefDoctorProfileController::class,'edit'])->name('doctor.profile.edit');
    Route::post('/chief-doctor/profile/update',[ChiefDoctorProfileController::class,'update'])->name('doctor.profile.update');

     // Chief Doctor Change of Password
     Route::get('/chief-doctor/password/change',[ChiefDoctorProfileController::class,'DoctorChangePassword'])->name('doctor.change.password');
     Route::post('/chief-doctor/password/update',[ChiefDoctorProfileController::class,'DoctorUpdatePassword'])->name('doctor.update.password');

     // Add new Data Clerk
     Route::get('/chief-doctor/all-clerk',[DoctorDataClerkController::class,'Index'])->name('doctor.index_clerk');
     Route::get('/chief-doctor/add-clerk',[DoctorDataClerkController::class,'Add'])->name('doctor.add_clerk');
     Route::post('/chief-doctor/store-clerk',[DoctorDataClerkController::class,'Store'])->name('doctor.store_clerk');
     Route::get('/chief-doctor/edit-clerk/{id}',[DoctorDataClerkController::class,'Edit'])->name('doctor.edit_clerk');
     Route::post('/chief-doctor/update-clerk/{id}',[DoctorDataClerkController::class,'Update'])->name('doctor.update_clerk');
     Route::get('/chief-doctor/delete-clerk/{id}',[DoctorDataClerkController::class,'Destroy'])->name('doctor.destroy_clerk');
  

});


Route::middleware(['auth:sanctum', 'verified','role:data_clerk'])->group(function () {
    // Route::get('/', function () {
    //     // Uses first & second middleware...
    // });
 
    Route::get('/data-clerk/profile',[ClerkProfile::class,'index'])->name('clerk.profile.index');
    Route::get('/data-clerk/profile/edit',[ClerkProfile::class,'edit'])->name('clerk.profile.edit');
    Route::post('/data-clerk/profile/update',[ClerkProfile::class,'update'])->name('clerk.profile.update');

     // Clerk Change of Password
     Route::get('/password/change',[ClerkProfile::class,'ClerkChangePassword'])->name('clerk.change.password');
     Route::post('/password/update',[ClerkProfile::class,'ClerkUpdatePassword'])->name('clerk.update.password');

     //Patients
     Route::get('/clerk/patients',[ClerkPatientController::class,'index'])->name('clerk.patient.index');
     Route::get('/clerk/patients/add',[ClerkPatientController::class,'add'])->name('clerk.patient.add');
     Route::post('/clerk/patients/store',[ClerkPatientController::class,'store'])->name('clerk.patient.store');
     Route::get('/clerk/patients/edit/{id}',[ClerkPatientController::class,'edit'])->name('clerk.patient.edit');
     Route::post('/clerk/patients/update/{id}',[ClerkPatientController::class,'update'])->name('clerk.patient.update');
     Route::get('/clerk/patients/destroy/{id}',[ClerkPatientController::class,'destroy'])->name('clerk.patient.destroy');

     // Encounters and Encounter Diagnosis
     Route::get('/clerk/patients/encounter',[ClerkPatientEncounterController::class,'index'])->name('clerk.pat.encounter.index');
     Route::get('/clerk/patients/encounter/add',[ClerkPatientEncounterController::class,'add'])->name('clerk.pat.encounter.add');
     Route::post('/clerk/patients/encounter/store',[ClerkPatientEncounterController::class,'store'])->name('clerk.pat.encounter.store');
     Route::get('/clerk/patients/encounter/edit/{id}',[ClerkPatientEncounterController::class,'edit'])->name('clerk.pat.encounter.edit');
     Route::post('/clerk/patients/encounter/update/{id}',[ClerkPatientEncounterController::class,'update'])->name('clerk.pat.encounter.update');
     Route::get('/clerk/patients/encounter/destroy/{id}',[ClerkPatientEncounterController::class,'destroy'])->name('clerk.pat.encounter.destroy');



     //Birth Events 
     Route::get('/clerk/patients/birth',[ClerkBirthEventController::class,'index'])->name('clerk.pat.birth.index');
     Route::get('/clerk/patients/birth/add',[ClerkBirthEventController::class,'add'])->name('clerk.pat.birth.add');
     Route::post('/clerk/patients/birth/store',[ClerkBirthEventController::class,'store'])->name('clerk.pat.birth.store');
     Route::get('/clerk/patients/birth/edit/{id}',[ClerkBirthEventController::class,'edit'])->name('clerk.pat.birth.edit');
     Route::post('/clerk/patients/birth/update/{id}',[ClerkBirthEventController::class,'update'])->name('clerk.pat.birth.update');
     Route::get('/clerk/patients/birth/destroy/{id}',[ClerkBirthEventController::class,'destroy'])->name('clerk.pat.birth.destroy');

      //Death Events 
      Route::get('/clerk/patients/death',[ClerkDeathEventController::class,'index'])->name('clerk.pat.death.index');
      Route::get('/clerk/patients/death/add',[ClerkDeathEventController::class,'add'])->name('clerk.pat.death.add');
      Route::post('/clerk/patients/death/store',[ClerkDeathEventController::class,'store'])->name('clerk.pat.death.store');
      Route::get('/clerk/patients/death/edit/{id}',[ClerkDeathEventController::class,'edit'])->name('clerk.pat.death.edit');
      Route::post('/clerk/patients/death/update/{id}',[ClerkDeathEventController::class,'update'])->name('clerk.pat.death.update');
      Route::get('/clerk/patients/death/destroy/{id}',[ClerkDeathEventController::class,'destroy'])->name('clerk.pat.death.destroy');

});


