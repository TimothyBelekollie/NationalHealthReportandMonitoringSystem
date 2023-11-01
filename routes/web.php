<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
//Data Clerk
use App\Http\Controllers\Clerk\ProfileController as ClerkProfile;
use App\Http\Controllers\Clerk\ClerkPatientController;
use App\Http\Controllers\Clerk\ClerkPatientEncounterController;
use App\Http\Controllers\Clerk\ClerkBirthEventController;
use App\Http\Controllers\Clerk\ClerkDeathEventController;


// Chief Doctor Controllers
use App\Http\Controllers\ChiefDoctor\ChiefDoctorProfileController;
use App\Http\Controllers\ChiefDoctor\DoctorDataClerkController;
//Reports
use App\Http\Controllers\ChiefDoctor\DoctorBirthReportController;
use App\Http\Controllers\ChiefDoctor\DoctorDeathReportController;
use App\Http\Controllers\ChiefDoctor\DoctorPatientReportController;
use App\Http\Controllers\ChiefDoctor\ServicesController;


// Health Officer Controllers
use App\Http\Controllers\HealthOfficer\OfficerProfileController;
use App\Http\Controllers\HealthOfficer\OfficerDoctorRegistryController;
use App\Http\Controllers\HealthOfficer\OfficerHealthCenterRegistryController;
use App\Http\Controllers\HealthOfficer\OfficerDistrictRegistryController;

//Reports
use App\Http\Controllers\HealthOfficer\OfficerBirthReportController;
use App\Http\Controllers\HealthOfficer\OfficerDeathReportController;
use App\Http\Controllers\HealthOfficer\OfficerPatientReportController;



//Health Minister Controllers
use App\Http\Controllers\Minister\HealthMinisterProfileController;
use App\Http\Controllers\Minister\MinisterDivisionRegistryController;
use App\Http\Controllers\Minister\MinisterOfficerRegistryController;
use App\Http\Controllers\Minister\ContactController;


//Reports



//------------------------------------frontend-----------------------------------------
use App\Http\Controllers\frontend\FrontendController;





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
    return view('frontend.index');
});

Route::get('/contact',[FrontendController::class,'contactIndex'])->name('contact.index');
Route::post('/contact/send',[Contactcontroller::class,'store'])->name('contact.store');
Route::get('/heath-centers',[FrontendController::class,'HealthIndex'])->name('health.index');
Route::post('/heath-centers/book',[FrontendController::class,'Appoint'])->name('send.appointment');
Route::get('/heath-centers/show/{id}',[FrontendController::class,'HealthShow'])->name('health.show');
Route::get('/patient-history',[FrontendController::class,'patientHistory'])->name('frontend.patient.index');
Route::get('/patient-history/show',[FrontendController::class,'showPatient'])->name('frontend.patient.show');




Route::middleware([
     'auth:sanctum',
     
     'verified',
 ])->group(function () {
    Route::get('redirects-dashboard',[AuthController::class,'index'])->name("dashboard");
    Route::get('/logout',[AuthController::class,'userlogout'])->name('user.logout');

});




      
//************************************SECTION OF  Health Minister************************************
Route::middleware(['auth:sanctum','verified','role:health_minister'])->group(function (){
    Route::get('/health-minister/profile',[HealthMinisterProfileController::class,'index'])->name('minister.profile.index');
    Route::get('/health-minister/profile/edit',[HealthMinisterProfileController::class,'edit'])->name('minister.profile.edit');
    Route::post('/health-minister/profile/update',[HealthMinisterProfileController::class,'update'])->name('minister.profile.update');

     // Health Minister Change of Password
     Route::get('/health-minister/password/change',[HealthMinisterProfileController::class,'MinisterChangePassword'])->name('minister.change.password');
     Route::post('/health-minister/password/update',[HealthMinisterProfileController::class,'MinisterUpdatePassword'])->name('minister.update.password');

    //  // Divsion 
     Route::get('/health-minister/all-division',[MinisterDivisionRegistryController::class,'index'])->name('minister.index_division');
     Route::get('/health-minister/add-division',[MinisterDivisionRegistryController::class,'add'])->name('minister.add_division');
     Route::post('/health-minister/store-division',[MinisterDivisionRegistryController::class,'store'])->name('minister.store_division');
     Route::get('/health-minister/edit-division/{id}',[MinisterDivisionRegistryController::class,'edit'])->name('minister.edit_division');
     Route::post('/health-minister/update-division/{id}',[MinisterDivisionRegistryController::class,'update'])->name('minister.update_division');
     Route::get('/health-minister/delete-division/{id}',[MinisterDivisionRegistryController::class,'destroy'])->name('minister.destroy_division');

    // Add new health officer
      Route::get('/health-minister/all-officer',[MinisterOfficerRegistryController::class,'index'])->name('minister.index_officer');
      Route::get('/health-minister/add-officer',[MinisterOfficerRegistryController::class,'add'])->name('minister.add_officer');
      Route::post('/health-minister/store-officer',[MinisterOfficerRegistryController::class,'store'])->name('minister.store_officer');
      Route::get('/health-minister/edit-officer/{id}',[MinisterOfficerRegistryController::class,'edit'])->name('minister.edit_officer');
      Route::post('/health-minister/update-officer/{id}',[MinisterOfficerRegistryController::class,'update'])->name('minister.update_officer');
      Route::get('/health-minister/delete-officer/{id}',[MinisterOfficerRegistryController::class,'destroy'])->name('minister.destroy_officer');

      

//Visitors's Messages
Route::get('/health-minister/visitormessages',[ContactController::class,'index'])->name('minister.contact.index');
Route::get('/health-minister/visitormessages/destroy/{id}',[ContactController::class,'destroy'])->name('contact.destroy');


});


//************************************SECTION OF  Health Officer*************************************************************

Route::middleware(['auth:sanctum','verified','role:health_officer'])->group(function (){
    Route::get('/health-officer/profile',[OfficerProfileController::class,'index'])->name('officer.profile.index');
    Route::get('/health-officer/profile/edit',[OfficerProfileController::class,'edit'])->name('officer.profile.edit');
    Route::post('/health-officer/profile/update',[OfficerProfileController::class,'update'])->name('officer.profile.update');

     // Health Officer Change of Password
     Route::get('/health-officer/password/change',[OfficerProfileController::class,'OfficerChangePassword'])->name('officer.change.password');
     Route::post('/health-officer/password/update',[OfficerProfileController::class,'OfficerUpdatePassword'])->name('officer.update.password');


       // Add new Chief Doctor
       Route::get('/health-officer/all-doctor',[OfficerDoctorRegistryController::class,'Index'])->name('officer.index_doctor');
       Route::get('/health-officer/add-doctor',[OfficerDoctorRegistryController::class,'Add'])->name('officer.add_doctor');
       Route::post('/health-officer/store-doctor',[OfficerDoctorRegistryController::class,'Store'])->name('officer.store_doctor');
       Route::get('/health-officer/edit-doctor/{id}',[OfficerDoctorRegistryController::class,'Edit'])->name('officer.edit_doctor');
       Route::post('/health-officer/update-doctor/{id}',[OfficerDoctorRegistryController::class,'Update'])->name('officer.update_doctor');
       Route::get('/health-officer/delete-doctor/{id}',[OfficerDoctorRegistryController::class,'Destroy'])->name('officer.destroy_doctor');

         // Add new Health Center
       Route::get('/health-officer/all-health-center',[OfficerHealthCenterRegistryController::class,'index'])->name('officer.index_center');
       Route::get('/health-officer/add-health-center',[OfficerHealthCenterRegistryController::class,'add'])->name('officer.add_center');
       Route::post('/health-officer/store-health-center',[OfficerHealthCenterRegistryController::class,'store'])->name('officer.store_center');
       Route::get('/health-officer/edit-health-center/{id}',[OfficerHealthCenterRegistryController::class,'edit'])->name('officer.edit_center');
       Route::post('/health-officer/update-health-center/{id}',[OfficerHealthCenterRegistryController::class,'update'])->name('officer.update_center');
       Route::get('/health-officer/delete-health-center/{id}',[OfficerHealthCenterRegistryController::class,'destroy'])->name('officer.destroy_center');

       //Add new Subdivision
       Route::get('/health-officer/all-sub-division',[OfficerDistrictRegistryController::class,'index'])->name('officer.index_subdivision');
       Route::get('/health-officer/add-sub-division',[OfficerDistrictRegistryController::class,'add'])->name('officer.add_subdivision');
       Route::post('/health-officer/store-sub-division',[OfficerDistrictRegistryController::class,'store'])->name('officer.store_subdivision');
       Route::get('/health-officer/edit-sub-division/{id}',[OfficerDistrictRegistryController::class,'edit'])->name('officer.edit_subdivision');
       Route::post('/health-officer/update-sub-division/{id}',[OfficerDistrictRegistryController::class,'update'])->name('officer.update_subdivision');
       Route::get('/health-officer/delete-sub-division/{id}',[OfficerDistrictRegistryController::class,'destroy'])->name('officer.destroy_subdivision');


        //Reports
      //Birth Report
        Route::get('/health-officer/birth-report',[OfficerBirthReportController::class,'birthDetail'])->name('officer.detail_birth');
        //Death Report 
        Route::get('/health-officer/death-report',[OfficerDeathReportController::class,'deathDetail'])->name('officer.detail_death');
        //Patient Report
        Route::get('/health-officer/patient-report',[OfficerPatientReportController::class,'patientDetail'])->name('officer.detail_patient');

        

       



});




//************************************SECTION OF  CHIEF_DOCTOR************************************************************

Route::middleware(['auth:sanctum','verified','role:chief_doctor'])->group(function (){
    Route::get('/chief-doctor/profile',[ChiefDoctorProfileController::class,'index'])->name('doctor.profile.index');
    Route::get('/chief-doctor/profile/edit',[ChiefDoctorProfileController::class,'edit'])->name('doctor.profile.edit');
    Route::post('/chief-doctor/profile/update',[ChiefDoctorProfileController::class,'update'])->name('doctor.profile.update');

     // Chief Doctor Change of Password
     Route::get('/chief-doctor/password/change',[ChiefDoctorProfileController::class,'DoctorChangePassword'])->name('doctor.change.password');
     Route::post('/chief-doctor/password/update',[ChiefDoctorProfileController::class,'DoctorUpdatePassword'])->name('doctor.update.password');

     // Add new Data Clerk
     Route::get('/chief-doctor/all-emp',[DoctorDataClerkController::class,'Index'])->name('doctor.index_clerk');
     Route::get('/chief-doctor/add-emp',[DoctorDataClerkController::class,'Add'])->name('doctor.add_clerk');
     Route::post('/chief-doctor/store-emp',[DoctorDataClerkController::class,'Store'])->name('doctor.store_clerk');
     Route::get('/chief-doctor/edit-emp/{id}',[DoctorDataClerkController::class,'Edit'])->name('doctor.edit_clerk');
     Route::post('/chief-doctor/update-emp/{id}',[DoctorDataClerkController::class,'Update'])->name('doctor.update_clerk');
     Route::get('/chief-doctor/delete-emp/{id}',[DoctorDataClerkController::class,'Destroy'])->name('doctor.destroy_clerk');

     //Report
  //Birth Report
     Route::get('/chief-doctor/birth-report',[DoctorBirthReportController::class,'birthDetail'])->name('doctor.detail_birth');

     //Death Report
     Route::get('/chief-doctor/death-report',[DoctorDeathReportController::class,'deathDetail'])->name('doctor.detail_death');
    //Patient Report
     Route::get('/chief-doctor/patient-report',[DoctorPatientReportController::class,'patientDetail'])->name('doctor.detail_patient');







      //Services
      Route::get('/chief-doctor/all-service',[ServicesController::class,'index'])->name('service.index');
      Route::get('/chief-doctor/add-service',[ServicesController::class,'add'])->name('service.add');
      Route::post('/chief-doctor/store-service',[ServicesController::class,'store'])->name('service.store');
      Route::get('/chief-doctor/edit-service/{id}',[ServicesController::class,'edit'])->name('service.edit');
      Route::post('/chief-doctor/update-service/{id}',[ServicesController::class,'update'])->name('service.update');
      Route::get('/chief-doctor/destroy-service/{id}',[ServicesController::class,'destroy'])->name('service.destroy');

});


//************************************ SECTION OF Data Clerk ************************************************************************
Route::middleware(['auth:sanctum', 'verified','role:data_clerk'])->group(function () {
   
 
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


      //Appointment
      Route::get('/clerk/appointment',[ClerkDeathEventController::class,'index'])->name('clerk.appointment.index');
      Route::get('/clerk/appointment/add',[ClerkDeathEventController::class,'add'])->name('clerk.appointment.add');
      Route::post('/clerk/appointment/store',[ClerkDeathEventController::class,'store'])->name('clerk.appointment.store');
      Route::get('/clerk/appointment/edit/{id}',[ClerkDeathEventController::class,'edit'])->name('clerk.appointment.edit');
      Route::post('/clerk/appointment/update/{id}',[ClerkDeathEventController::class,'update'])->name('clerk.appointment.update');
      Route::get('/clerk/appointment/destroy/{id}',[AppointmentController::class,'destroy'])->name('clerk.appointment.destroy');

});


