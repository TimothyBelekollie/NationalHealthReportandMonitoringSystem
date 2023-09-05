<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(){

        return view('data_clerk.pages.profile.profile_index');
    }
    public function edit(){
        return view('data_clerk.pages.profile.profile_edit');
    }

    public function update(Request $request, $id){

        $update=User::find($id);
        $update->name=$request->name;
       // $update-



    }
}
