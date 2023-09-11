<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $update->name=$request->name;
        $update->email=$request->email;
        $update->phone_one=$request->phone_one;
        $update->phone_two=$request->phone_two;
        $update->gender=$request->gender;
        $update->about=$request->about;
        $update->dob=$request->dob;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/Admin/'.$update->image));
            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('upload/Admin'),$filename);
            $update['image']=$filename;
        }
        $update->save();
        $notification=array(
            'message'=>'You have updated your profile successfully ',
            'alert-type'=>'info',
        );
         return redirect()->route('view.profile')->with($notification);
    }



    }

