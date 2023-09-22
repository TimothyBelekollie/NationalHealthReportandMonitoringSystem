<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeathEvent;
use App\Models\Patient;

class ClerkDeathEventController extends Controller
{
    //
    public function index(){
        $data['deathEvents']=DeathEvent::latest()->get();
        return view('data_clerk.pages.DeathEvents.index',$data);
    }

    public function add(){
        $data['patients']=Patient::latest()->get();
        return view('data_clerk.pages.DeathEvents.add',$data);
    }

    public function store(Request $request){
        
        $saveDeath=new DeathEvent();
        $saveDeath->event_date=$request->event_date;
        $saveDeath->health_center_id=$request->health_center_id;
        $saveDeath->patient_id=$request->patient_id;
        $saveDeath->save();

        return redirect()->route('clerk.pat.death.index')->with('message','You have recorded death record successfully');
    }
    public function edit($id){
        $data['editData']=DeathEvent::find($id);
        $data['patients']=Patient::latest()->get();

        return view('data_clerk.pages.DeathEvents.edit',$data);
        }

        public function update(Request $request, $id){
          
            $updateDeath=DeathEvent::find($id);
            $updateDeath->event_date=$request->event_date;
            $updateDeath->patient_id=$request->patient_id;
            $updateDeath->save();
            return redirect()->route('clerk.pat.death.index')->with('message','You have updated death record successfully');

        }
        public function destroy($id){
            $destroy=DeathEvent::find($id);
            $destroy->delete();
            return redirect()->route('clerk.pat.death.index')->with('message','You have deleted death record successfully');

        }
}
