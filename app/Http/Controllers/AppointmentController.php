<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $allData=Appointment::latest()->get();
        return view('data_clerk.pages.Appointment.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_clerk.pages.Appointment.add');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
        $validateData=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'specialization'=>'required',
            'message'=>'health_center_id'
        ],[
            'name.required'=>"Full Name is required",
            'email.required'=>"Email is required",
            'phone.required'=>"Phone is required",
            'specialization.required'=>'Specialization is required',
           
        ]);
        //protected $fillable=['name','email','phone','specialization','message','health_center_id'];
        $saveData=new Appointment();
        $saveData->name=$request->name;
        $saveData->email=$request->email;
        $saveData->phone=$request->phone;
        $saveData->specialization=$request->specialization;
        $saveData->message=$request->message;
        $saveData->save();
        return redirect()->route('clerk.appointment.index')->with('message','Appointment has been made successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     //
    //     $editData=Appointment::find($id);
    //     return view('data_clerk.pages.Appointment.edit',compact('editData')); 
    //   }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     //
        
    // }

    /**
  
    * Remove the specified resource from storage.
     */
    // public function destroy(Appointment $appointment)
    // {
    //     //
    // }
}
