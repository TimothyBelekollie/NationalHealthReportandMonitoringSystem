<?php

namespace App\Http\Controllers\ChiefDoctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ServicesController extends Controller
{
    //
    public function index(){
$allServices=Service::latest()->get();
return view('chief_doctor.pages.Services.index',compact('allServices'));

    }

    public function add(){
      
        return view('chief_doctor.pages.Services.add');
        
            }



            public function store(Request $request){
                $validatd=$request->validate([
                    'name'=>'required|unique:services,name',
                
                ]);
                $saveServices=new Service();
                $saveServices->name=$request->name;
                $saveServices->health_center_id=Auth::user()->healthCenter->id;
               
                $saveServices->save();
      
                return redirect()->route('service.index')->with('message','You have successfully added a service');
                
                
                    }

                    public function edit($id){
                        $editData=Service::find($id);

      
                        return view('chief_doctor.pages.Services.edit',compact('editData'));
                        
                        
                            }

                            public function update(Request $request, $id){
                                $validated = $request->validate([
                                    'name' => 'required|unique:services,name,' . $id,
                                ]);
                                 $updateServices=Service::find($id);
                                 $updateServices->name=$request->name;
                                 $updateServices->health_center_id=Auth::user()->healthCenter->id;            
                                 $updateServices->save();
      
                                return redirect()->route('service.index')->with('message','You have successfully updated a service');
                                    }  
                            public function destroy($id){
                                $destroy=Service::find($id);
                                $destroy->delete();
                                return redirect()->back()->with('message','You have successfullly deleted a service/specialization');
                            }       
        }

