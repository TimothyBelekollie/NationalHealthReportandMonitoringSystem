<?php

namespace App\Http\Controllers\Minister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Http\Requests\Minister\DivisionRequest;
class MinisterDivisionRegistryController extends Controller
{
    public function index(){
        $data['divisions']=Division::latest()->get();
      
        return view('ministry_of_health.pages.Division.index',$data);
    }

    public function add(){
        // $data['divisionsData']=Division::latest()->get();
       

        return view('ministry_of_health.pages.Division.add');

    }

    public function store(DivisionRequest $request){
    
    $savesub=new Division();
    $savesub->name=$request->name;
    
    $savesub->save();
    return redirect()->route('minister.index_division')->with('message','You have added a new division successfully');
    }

    public function edit($id){
        $data['editData']=Division::find($id);
        
        return view('ministry_of_health.pages.Division.edit',$data);
    }
    public function update(DivisionRequest $request, $id){

        $updatediv=Division::find($id);
        $updatediv->name=$request->name;
      
        
        $updatediv->save();

    return redirect()->route('minister.index_division')->with('message','You have updated a division successfully');


    }

    public function destroy($id){
        $deleteDiv=Division::find($id);
        $deleteDiv->delete();
        return redirect()->back()->with('message','You have deleted a division successfully');

    }
} 
