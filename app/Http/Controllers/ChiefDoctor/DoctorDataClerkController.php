<?php

namespace App\Http\Controllers\ChiefDoctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\Doctor\DataClerkRequest;
class DoctorDataClerkController extends Controller
{
    public function Index(){

        $usersWithRole = User::whereHas('role', function ($query) {
            $query->where('name', 'data_clerk');
        })->latest()->get();
      
        return view('chief_doctor.pages.dataClerk.index', compact('usersWithRole'));
    }

    public function Add(){
        
        $roles=Role::all()->where('name','data_clerk');
        return view('chief_doctor.pages.dataClerk.add',compact('roles'));
    }

    public function Store(DataClerkRequest $request){
        $validatedData=$request->validated();
        $saveDataClerk=new User();
        $saveDataClerk->name=$request->name;
        $saveDataClerk->email=$request->email;
        $saveDataClerk->role_id=$request->role_id;
        $saveDataClerk->usertype=$request->usertype;
        $saveDataClerk->health_center_id=$request->health_center_id;
        $saveDataClerk->password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $saveDataClerk->save();

        return redirect()->route('doctor.index_clerk')->with('message','You have just added a new Data Clerk');


    }

    
    public function Edit($id){
        $editData=User::find($id);
        $roles=Role::all()->where('name','data_clerk');
        return view('chief_doctor.pages.dataClerk.edit',compact('editData','roles'));
    }

    public function Update(DataClerkRequest $request, $id){
        $validatedData=$request->validated();
        $updateData=User::find($id);
           // Update user data
    $updateData->email = $validatedData['email'];
    $updateData->name = $validatedData['name'];
    $updateData->role_id = $validatedData['role_id'];
    $saveDataClerk->usertype=$request->usertype;
    $updateData->health_center_id = $validatedData['health_center_id'];
    $updateData->save();
        
        return redirect()->route('doctor.index_clerk')->with('message','You have just updated a Data Clerk Information');
    }

    public function Destroy($id){
        $deleteData=User::find($id);
        $deleteData->delete();
        return redirect()->back()->with('message','You have succeded in delete Data Clerk');
        
    }
}
