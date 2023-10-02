<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficerProfileController extends Controller
{
     //
     public function index(){

        return view('chief_doctor.pages.profile.profile_index');
    }
    public function edit(){
        return view('chief_doctor.pages.profile.profile_edit');
    }

    public function update(Request $request){
        //dd($request->all());
        $id=Auth::user()->id;
        $update=User::find($id);
        $update->name=$request->name;
        
        $update->email=$request->email;
        $update->contact=$request->contact;
       
        $update->title=$request->title;
        $update->about=$request->about;
        $update->address=$request->address;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('Upload/chief_doctor/'.$update->image));
            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('Upload/chief_doctor'),$filename);
            $update['image']=$filename;
        }
        $update->save();
      
         return redirect()->route('doctor.profile.index')->with('message','You have updated your profile successfully');
    }
    public function OfficerChangePassword(){
        
        return view('chief_doctor.pages.profile.password.changepassword');
    }// End Method
    
    public function OfficerUpdatePassword(Request $request){
    
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
    
        ]);
    
        $hashedPassword = Auth::User()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $id=Auth::User()->id;
            $updatepassword=User::find($id);
            $updatepassword->password = bcrypt($request->newpassword);
            $updatepassword->save();
    
            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }
    
    
    
    }
}
