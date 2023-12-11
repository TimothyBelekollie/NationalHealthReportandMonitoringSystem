<?php

namespace App\Http\Controllers\HealthOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthCenter;
use App\Models\HealthCenterType;
use  Illuminate\Support\Facades\Auth;
use App\Models\Subdivision;
use App\Http\Requests\Officer\HealthCenterRequest;


class OfficerHealthCenterRegistryController extends Controller
{
    //

    public function index(){
        $allHealthCenter=HealthCenter::latest()->get();
// // Assuming you have a HealthOfficer model with a subdivisions relationship
// $healthOfficer = Auth::user(); // Assuming the logged-in user is a health officer
// $subdivisions = $healthOfficer->subdivisions;

//$healthCenters = HealthCenter::whereIn('subdivision_id', $subdivisions->pluck('id'))->latest()->get();
        return view('health_officer.pages.healthCenters.index',compact('allHealthCenter'));
    }

    public function add(){
        $data['healthcentertypes']=HealthCenterType::latest()->get();
        $data['subdivisions']=Subdivision::latest()->where('division_id',Auth::user()->division->id)->get();
        
        return view('health_officer.pages.healthCenters.add',$data);

    }

    public function store(HealthCenterRequest $request){
    //dd($request->all());
    $savecenter=new HealthCenter();
    $savecenter->name=$request->name;
    
    $savecenter->subdivision_id=$request->subdivision_id;
    $savecenter->health_center_type_id=$request->health_center_type_id;
    $savecenter->save();
    return redirect()->route('officer.index_center')->with('message','You have added a new Health Center successfully');
    }

    public function edit($id){
        $data['editData']=HealthCenter::find($id);
        $data['healthcentertypes']=HealthCenterType::latest()->get();
        $data['subdivisions']=Subdivision::latest()->get();
        return view('health_officer.pages.healthCenters.edit',$data);
    }
    public function update(HealthCenterRequest $request, $id){

        $updateCenter=HealthCenter::find($id);
        $updateCenter->name=$request->name;
        $updateCenter->subdivision_id=$request->subdivision_id;
        $updateCenter->health_center_type_id=$request->health_center_type_id;
        $updateCenter->save();

    return redirect()->route('officer.index_center')->with('message','You have updated a Health Center successfully');


    }

    public function destroy($id){
        $deleteCenter=HealthCenter::find($id);
        $deleteCenter->delete();
        return redirect()->back()->with('message','You have deleted a Health Center successfully');

    }

}
