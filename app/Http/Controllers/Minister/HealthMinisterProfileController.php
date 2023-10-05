<?php

namespace App\Http\Controllers\Minister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HealthMinisterProfileController extends Controller
{
     //
     public function index(){

        return view('ministry_of_health.pages.profile.profile_index');
    }
    public function edit(){
        return view('ministry_of_health.pages.profile.profile_edit');
    }

    public function update(Request $request){
        //dd($request->all());
        $id=Auth::user()->id;
        $update=User::find($id);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->contact=$request->contact;
        $update->about=$request->about;
      
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('Upload/health_minister/'.$update->image));
            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('Upload/health_minister'),$filename);
            $update['image']=$filename;
        }
        $update->save();
      
         return redirect()->route('minister.profile.index')->with('message','You have updated your profile successfully');
    }
    public function MinisterChangePassword(){
        
        return view('ministry_of_health.pages.profile.password.changepassword');
    }// End Method
    
    public function MinisterUpdatePassword(Request $request){
    
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
