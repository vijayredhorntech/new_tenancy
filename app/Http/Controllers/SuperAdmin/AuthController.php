<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function login_form(){
        return view('auth.login');
    }
    // function for login
    public function superadmin_login(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        // Attempt authentication
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect("/superadmin/dashboard");
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }


    public function hs_dashbord(){

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('auth.admin.pages.index', ['user_data' => $user]);
    }


   public function superadmin_logout(){
            Auth::logout(); 
            return redirect('/');
   }
}

