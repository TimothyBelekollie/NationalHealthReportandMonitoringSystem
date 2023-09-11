<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clerk\ProfileController as ClerkProfile;

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



Route::middleware(['auth:sanctum', 'verified','role:data_clerk'])->group(function () {
    // Route::get('/', function () {
    //     // Uses first & second middleware...
    // });
 
    Route::get('/data-clerk/profile',[ClerkProfile::class,'index'])->name('clerk.profile.index');
    Route::get('/data-clerk/profile/edit',[ClerkProfile::class,'edit'])->name('clerk.profile.edit');
    Route::get('/data-clerk/profile/update/{id}',[ClerkProfile::class,'update'])->name('clerk.profile.update');
});