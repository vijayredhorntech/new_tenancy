<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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


    /***Staff Form ***/
    public function hs_staffcreate(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $alluser=User::get();
        $service=Service::get();
        return view('auth.admin.pages.staff.staff_form', ['user_data' => $user,'services' => $service,'users'=>$alluser]);
    }


 /***Staff Store ***/
    public function hs_staffstore(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ensuring only images are uploaded
            ]);

            $profile = null;

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $destinationPath = public_path('user/profile/');

                // Ensure the directory exists
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                // Generate a unique file name
                $fileName = 'profile_' . auth()->id() . '_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                
                // Move the uploaded file
                $file->move($destinationPath, $fileName);
                $profile = $fileName;
            }

            DB::beginTransaction();

            try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->email); // Change this to a strong default password or generate one
                $user->profile = $profile;
                $user->assignRole('simple user');

                if (!$user->save()) {
                    throw new \Exception("User creation failed");
                }

                $usermeta = new UserMeta();
                $usermeta->user_id = $user->id;
                $usermeta->phone_number = $request->contact_phone;
                $usermeta->phone_code = $user->id;
                $usermeta->address = $request->address;
                $usermeta->state = $request->state;
                $usermeta->country = $request->country;

                if (!$usermeta->save()) {
                    throw new \Exception("User meta creation failed");
                }

                DB::commit();

                return redirect()->route('superadmin.staff')->with('success', 'User created successfully.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('superadmin_staffcreate')->with('error', 'Failed to create user: ' . $e->getMessage());
            }
        }


 /**View detials **/
    public function hs_staffDetails()
    {
        return view('auth.admin.pages.staff.details');
    }


    /** function for Delete saff **/
    public function hs_staffdelete($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('superadmin.staff')->with('success', 'Staff deleted successfully.');
        } else {
            return redirect()->route('superadmin.staff')->with('error', 'Service not found.');
        }
    }

/***Update function ***/
   public function hs_staffupdate($eid){
   
    $id = Auth::user()->id;
    $user = User::find($id);
    $edit_user = User::with('userdetails')->find($eid);
    // dd($edit_user);
    $service=Service::get();
    $roles = Role::all();

    return view('auth.admin.pages.staff.staff_form', [
        'user_data' => $user,
        'services' => $service,
        'edit_user' => $edit_user,
        'roles' => $roles
    ]); 

   }


}
