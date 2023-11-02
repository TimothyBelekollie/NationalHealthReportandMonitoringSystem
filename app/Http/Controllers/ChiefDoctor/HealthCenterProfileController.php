<?php

namespace App\Http\Controllers\ChiefDoctor;

use App\Http\Controllers\Controller;
use App\Models\HealthCenter;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class HealthCenterProfileController extends Controller
{
    //
    public function edit(){
    $id=Auth::user()->healthCenter->id;
    $healthcenter=HealthCenter::find($id);
   // dd($healthcenter);
        return view('chief_doctor.pages.HealthCenterProfile.edit',compact('healthcenter'));
    }

    public function update(Request $request){
        $id=Auth::user()->healthCenter->id;
        $healthcenterupdate=HealthCenter::find($id);
        $healthcenterupdate->name=$request->name;
        $healthcenterupdate->emailOne=$request->emailOne;
        $healthcenterupdate->emailTwo=$request->emailTwo;
        $healthcenterupdate->contactOne=$request->contactOne;
        $healthcenterupdate->contactTwo=$request->contactTwo;
        $healthcenterupdate->description=$request->description;

        if($request->file('profileImage')){
            $file=$request->file('profileImage');
            @unlink(public_path('Upload/healthCenter/'.$healthcenterupdate->profileImage));
            $filename=date('YmdHi').$file->getClientOriginalName();// 2223222.png
            $file->move(public_path('Upload/healthCenter'),$filename);
            $healthcenterupdate['profileImage']=$filename;
        }
        $healthcenterupdate->save();
        return redirect()->back()->with("message","You have successfully updated Your healthcenter Profile");
    }
}
