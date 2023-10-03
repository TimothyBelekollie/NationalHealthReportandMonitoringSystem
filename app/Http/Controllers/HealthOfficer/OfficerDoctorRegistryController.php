<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\HealthCenter;
class OfficerDoctorRegistryController extends Controller
{
    public function Index(){

        $usersWithRole = User::whereHas('role', function ($query) {
            $query->where('name', 'chief_doctor');
        })->latest()->get();
      
        return view('health_officer.pages.chiefDoctor.index', compact('usersWithRole'));
    }

    public function Add(){
        
        $roles=Role::all()->where('name','data_clerk');
        $healthCenter=HealthCenter::latest()->get();
        return view('health_officer.pages.chiefDoctor.add',compact('roles','healthCenter'));
    }

    public function Store(DataClerkRequest $request){
        $validatedData=$request->validated();
        $saveDataClerk=new User();
        $saveDataClerk->name=$request->name;
        $saveDataClerk->email=$request->email;
        $saveDataClerk->role_id=$request->role_id;
        $saveDataClerk->health_center_id=$request->health_center_id;
        $saveDataClerk->password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $saveDataClerk->save();

        return redirect()->route('officer.index_clerk')->with('message','You have just added a new Data Clerk');


    }

    
    public function Edit($id){
        $editData=User::find($id);
        $roles=Role::all()->where('name','chief_doctor');
        return view('health_officer.pages.chiefDoctor.edit',compact('editData','roles'));
    }

    public function Update(DataClerkRequest $request, $id){
        $validatedData=$request->validated();
        $updateData=User::find($id);
           // Update user data
        $updateData->email = $validatedData['email'];
        $updateData->name = $validatedData['name'];
        $updateData->role_id = $validatedData['role_id'];
        $updateData->health_center_id = $validatedData['health_center_id'];
        $updateData->save();
        
        return redirect()->route('officer.index_clerk')->with('message','You have just updated a doctor Information');
    }

    public function Destroy($id){
        $deleteData=User::find($id);
        $deleteData->delete();
        return redirect()->back()->with('message','You have succeded in deleting Doctor');
        
    }
}
