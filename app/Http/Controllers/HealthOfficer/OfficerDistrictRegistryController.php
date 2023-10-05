<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Subdivision;
use App\Http\Requests\Officer\SubdivisionRequest;


class OfficerDistrictRegistryController extends Controller
{
   
    public function index(){
        $data['subdivisions']=Subdivision::latest()->get();
      
        return view('health_officer.pages.Subdivision.index',$data);
    }

    public function add(){
        $data['divisionsData']=Division::latest()->get();
       

        return view('health_officer.pages.Subdivision.add',$data);

    }

    public function store(SubdivisionRequest $request){
    //dd($request->all());
    $savesub=new Subdivision();
    $savesub->name=$request->name;
    $savesub->division_id=$request->division_id;
    $savesub->save();
    return redirect()->route('officer.index_subdivision')->with('message','You have added a new Sub division successfully');
    }

    public function edit($id){
        $data['editData']=Subdivision::find($id);
        $data['divisions']=Division::latest()->get();
        return view('health_officer.pages.Subdivision.edit',$data);
    }
    public function update(SubdivisionRequest $request, $id){

        $updatesub=Subdivision::find($id);
        $updatesub->name=$request->name;
        $updatesub->division_id=$request->division_id;
        
        $updatesub->save();

    return redirect()->route('officer.index_subdivision')->with('message','You have updated a Sub division successfully');


    }

    public function destroy($id){
        $deleteCenter=Subdivision::find($id);
        $deleteCenter->delete();
        return redirect()->back()->with('message','You have deleted a Sub division successfully');

    }

}
