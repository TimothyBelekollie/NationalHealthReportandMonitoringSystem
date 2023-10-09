<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LogoutResponse;

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

            return view('chief_doctor.dashboard');

        }
            elseif($role=="data_clerk"){

                return view('data_clerk.dashboard');
    
            }
            
           
    }

    public function userlogout(Request $request){
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
