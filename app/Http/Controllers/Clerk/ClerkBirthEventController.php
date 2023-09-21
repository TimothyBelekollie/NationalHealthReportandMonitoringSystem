<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirthEvent;
use App\Models\Patient;
use Carbon\Carbon;


class ClerkBirthEventController extends Controller
{
    //

    public function index(){
        $data['birthEvents']=BirthEvent::latest()->get();
        return view('data_clerk.pages.BirthEvents.index',$data);
    }

    public function add(){
        $data['patients']=Patient::latest()->where('gender','Female')->get();
        return view('data_clerk.pages.BirthEvents.add', $data);
    }


    public function store(Request $request){
        $savebirth= new BirthEvent();
        $savebirth->event_date=$request->event_date;
        
        $savebirth->baby_gender=$request->baby_gender;
        $savebirth->baby_type=$request->baby_type;
        $savebirth->health_center_id=$request->health_center_id;
        $savebirth->patient_id=$request->patient_id;
        $savebirth->save();

        return redirect()->route('clerk.pat.birth.index')->with('message','You have recorded birth record successfully');
    }

    public function edit($id){
        $data['editData']=BirthEvent::find($id);
       //dd($data['editData']);
        $data['patients']=Patient::latest()->where('gender','Female')->get();

        return view('data_clerk.pages.BirthEvents.edit',$data);
    }

    public function update(Request $request, $id){

        $updatebirth=BirthEvent::find($id);
        $updatebirth->event_date=$request->event_date;
        $updatebirth->baby_gender=$request->baby_gender;
        $updatebirth->baby_type=$request->baby_type;
        $updatebirth->patient_id=$request->patient_id;
        $updatebirth->save();
        return redirect()->route('clerk.pat.birth.index')->with('message','You have updated birth record successfully');
    }

    public function destroy($id){
        $destroybirth=BirthEvent::find($id);
        $destroybirth->delete();
        return redirect()->route('clerk.pat.birth.index')->with('message','You have deleted birth record successfully');

    }

}
