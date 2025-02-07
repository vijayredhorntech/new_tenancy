<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
{
    /** Staff view  **/
    public function hs_staffindex(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $alluser=User::get(); 
        $service=Service::get();
        return view('auth.admin.pages.staff.staff', ['user_data' => $user,'services' => $service,'users'=>$alluser]);
    }

    public function hs_staffcreate(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $alluser=User::get(); 
        $service=Service::get();
        return view('auth.admin.pages.staff.staff_form', ['user_data' => $user,'services' => $service,'users'=>$alluser]);
    }

    public function hs_staffstore(Request $request){
       
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
             
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->email); // Hashing password properly
    
        if ($user->save()) {
            return redirect()->route('superadmin_service')->with('success', 'User created successfully.');
        } else {
            return redirect()->route('superadmin_staffcreate')->with('error', 'Failed to create user.');
        }
    }


    /**** Function for Roles *****/

    public function hs_roleindex(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $alluser=User::get(); 
        $service=Service::get();
        return view('auth.admin.pages.Roles.role', ['user_data' => $user,'services' => $service,'users'=>$alluser]);
    }



    public function hs_rolecreate(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $alluser=User::get(); 
        $service=Service::get();
        return view('auth.admin.pages.Roles.role_form', ['user_data' => $user,'services' => $service,'users'=>$alluser]);
    }

    public function hs_rolestore(Request $request){

        dd($request->all());

    }
    


    
}