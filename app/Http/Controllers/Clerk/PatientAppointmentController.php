<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\User;
use App\Notifications\AppointmentStatusNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientAppointmentMail; 
;
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


    public function Doindex(){
        $appointments=Appointment::latest()->where('health_center_id',Auth::user()->health_center_id)->where('user_id',Auth::user()->id)->get();
        return view('data_clerk.pages.Appointment.doctor_asigned_appointment',compact('appointments'));
    }

  
    public function Doedit($id){
        $assignAppointment=Appointment::find($id);
        // $data_clerks=User::latest()->where('health_center_id',Auth::user()->health_center_id)->where('usertype','Doctor')->get();


        return view('data_clerk.pages.Appointment.doctor_asigned_appointment_edit',compact('assignAppointment'));
    }
    public function Doupdate(Request $request, $id){
        $update=Appointment::find($id);
        $patientName=$update->name;
        $patientEmail=$update->email;
      
        $update->status=$request->status;
        $update->confirm_date=$request->confirm_date;
        $status=$request->status;
        $appointmentDate=$request->confirm_date;
        $hospitalName=Auth::user()->healthCenter->name;

        $update->save();
        Mail::to($patientEmail)->send(new PatientAppointmentMail($patientName,$status, $appointmentDate,$hospitalName));
       
        
        return redirect()->route('clerk.doc.appointment.index')->with("message","You have scheduled Appointment");




    }

}
