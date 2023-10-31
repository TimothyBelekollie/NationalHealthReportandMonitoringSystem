<?php

namespace App\Http\Controllers\Minister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index(){
        $allcontacts=Contact::latest()->get();
        return view('ministry_of_health.pages.contact.index',compact('allcontacts'));
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ]);
        $saveContact=new Contact();
        $saveContact->name=$request->name;
        $saveContact->email=$request->email;
        $saveContact->phone=$request->phone;
        $saveContact->websiteurl=$request->websiteurl;
        $saveContact->message=$request->message;
        $saveContact->save();
        return redirect()->route('contact.index')->with('message',"Your message has been sent successfully, we will reach out to you soon");
    }

    public function destroy($id){
        $destroyContact=Contact::find($id);
        $destroyContact->delete();
        return redirect()->back()->with('message','You have deleted a message successfully');
    }
}
