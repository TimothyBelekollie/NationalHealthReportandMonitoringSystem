<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\HealthCenter;
use App\Http\Requests\Officer\DoctorCreationRequest;
use  Illuminate\Support\Facades\Auth;
class OfficerDoctorRegistryController extends Controller
{
    public function index(){

        // $usersWithRole = User::whereHas('role', function ($query) {
        //     $query->where('name', 'chief_doctor');
        // })->latest()->get();


       // Get the authenticated user's division
        $divisionId = Auth::user()->division->id;
        //Retrieve users with the "chief_doctor" role assigned to health centers
        $usersWithRole = User::whereHas('role', function ($query) {
            $query->where('name', 'chief_doctor');
        })->whereHas('healthCenter.subdivision.division', function ($query) use ($divisionId) {
            $query->where('id', $divisionId);
        })->latest()->get();

        return view('health_officer.pages.chiefDoctor.index', compact('usersWithRole'));
    }

    public function Add(){
        
        $roles=Role::all()->where('name','chief_doctor');
        //$healthCenter=HealthCenter::latest()->get();


        $divisionId = Auth::user()->division->id;
        $healthCenter = HealthCenter::whereHas('subdivision', function ($query) use ($divisionId) {
            $query->where('division_id', $divisionId);
        })->latest()->get();
        return view('health_officer.pages.chiefDoctor.add',compact('roles','healthCenter'));
    }

    public function store(DoctorCreationRequest $request){
       
        $saveDocotor=new User();
        $saveDocotor->name=$request->name;
        $saveDocotor->email=$request->email;
        $saveDocotor->role_id=$request->role_id;
        $saveDocotor->health_center_id=$request->health_center_id;
        $saveDocotor->password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $saveDocotor->save();

        return redirect()->route('officer.index_doctor')->with('message','You have just added a new Data Clerk');


    }

    
    public function edit($id){
        $editData=User::find($id);
        $roles=Role::all()->where('name','chief_doctor');
        $healthCenter=HealthCenter::latest()->get();
        return view('health_officer.pages.chiefDoctor.edit',compact('editData','roles','healthCenter'));
    }

    public function update(DoctorCreationRequest $request, $id){
        $validatedData=$request->validated();
        $updateData=User::find($id);
           // Update user data
        $updateData->email = $validatedData['email'];
        $updateData->name = $validatedData['name'];
        $updateData->role_id = $validatedData['role_id'];
        $updateData->health_center_id = $validatedData['health_center_id'];
        $updateData->save();
        
        return redirect()->route('officer.index_doctor')->with('message','You have just updated a doctor Information');
    }

    public function destroy($id){
        $deleteData=User::find($id);
        $deleteData->delete();
        return redirect()->back()->with('message','You have succeded in deleting Doctor');
        
    }
}
