<?php

namespace App\Http\Controllers\Minister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Minister\HealthOfficerRequest;
use App\Models\User;
use App\Models\Division;
use App\Models\Role;


class MinisterOfficerRegistryController extends Controller
{
    public function index(){

        $usersWithRole = User::whereHas('role', function ($query) {
            $query->where('name', 'health_officer');
        })->latest()->get();
      
        return view('ministry_of_health.pages.HealthOfficer.index', compact('usersWithRole'));
    }

    public function Add(){
        
        $roles=Role::all()->where('name','health_officer');
        $divisions=Division::latest()->get();
        return view('ministry_of_health.pages.HealthOfficer.add',compact('roles','divisions'));
    }

    public function store(HealthOfficerRequest $request){
       //dd($request->all());
        $saveOfficer=new User();
        $saveOfficer->name=$request->name;
        $saveOfficer->email=$request->email;
        $saveOfficer->role_id=$request->role_id;
        $saveOfficer->division_id=$request->division_id;
        $saveOfficer->password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $saveOfficer->save();

        return redirect()->route('minister.index_officer')->with('message','You have just added a new Health Officer');


    }

    
    public function edit($id){
        $editData=User::find($id);
        $roles=Role::all()->where('name','health_officer');
        $divisions=Division::latest()->get();
        return view('ministry_of_health.pages.HealthOfficer.edit',compact('editData','roles','divisions'));
    }

    public function update(HealthOfficerRequest $request, $id){
        $validatedData=$request->validated();
        $updateData=User::find($id);
           // Update user data
        $updateData->email = $validatedData['email'];
        $updateData->name = $validatedData['name'];
        $updateData->role_id = $validatedData['role_id'];
        $updateData->division_id = $validatedData['division_id'];
        $updateData->save();
        
        return redirect()->route('minister.index_officer')->with('message','You have just updated a Health Officer Information');
    }

    public function destroy($id){
        $deleteData=User::find($id);
        $deleteData->delete();
        return redirect()->back()->with('message','You have succeded in deleting a Health Officer');
        
    }
}
