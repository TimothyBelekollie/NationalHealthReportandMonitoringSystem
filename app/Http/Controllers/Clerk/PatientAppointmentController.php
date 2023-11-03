<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\User;



class PatientAppointmentController extends Controller
{
   
    public function index(){
        //$id=Auth::user()->id;
        $appointments=Appointment::latest()->where('health_center_id',Auth::user()->health_center_id)->get();
        

        return view('data_clerk.pages.Appointment.index',compact('appointments'));
    }
    public function edit($id){
        $assignAppointment=Appointment::find($id);
        $data_clerks=User::latest()->where('health_center_id',Auth::user()->health_center_id)->where('usertype','Doctor')->get();

        return view('data_clerk.pages.Appointment.edit',compact('assignAppointment','data_clerks'));
    }

    public function update(Request $request, $id){
        $update=Appointment::find($id);
        $update->user_id=$request->user_id;
        $update->save();
        return redirect()->route('clerk.appointment.index')->with("message","Appointment has been assigned");
    }


    public function destroy($id){
        $destroyAppointment=Appointment::find($id);
        $destroyAppointment->delete();
        return redirect()->route('clerk.appointment.index')->with("message","Appointment has been deleted");

    }
}
