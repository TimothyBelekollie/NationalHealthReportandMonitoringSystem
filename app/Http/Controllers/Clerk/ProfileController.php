<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index(){

        return view('data_clerk.pages.profile.profile_index');
    }
    public function edit(){
        return view('data_clerk.pages.profile.profile_edit');
    }

    public function update(Request $request){
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
            @unlink(public_path('Upload/data_clerk/'.$update->image));
            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('Upload/data_clerk'),$filename);
            $update['image']=$filename;
        }
        $update->save();
      
         return redirect()->route('clerk.profile.index')->with('message','You have updated your profile successfully ');
    }
    public function ClerkChangePassword(){
        return view('data_clerk.pages.profile.password.changepassword');
    }// End Method
    public function ClerkUpdatePassword(Request $request){
    
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

