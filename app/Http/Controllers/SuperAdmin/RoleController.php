<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
       /**** Function for Roles *****/

       public function hs_roleindex(){

        $roles = Role::all();
         $id = Auth::user()->id;
        $user = User::find($id);
        $permissions = Permission::all();
        $alluser=User::get();
        $service=Service::get();
        return view('auth.admin.pages.Roles.role', ['user_data' => $user,'services' => $service,'roles'=>$roles,'permissions'=>$permissions]);
    }


 /** Register  role  **/
    public function hs_rolecreate(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $alluser=User::get();
        $service=Service::get();
        return view('auth.admin.pages.Roles.role_form', ['user_data' => $user,'services' => $service,'users'=>$alluser]);
    }

    /** Store role  **/
    public function hs_rolestore(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
         ]);
         Role::create(['name' => $request->name]);
         return redirect()->route('superadmin.role')->with('success', 'Role created successfully.');
    }



    /*** Delete Role ***/
    public function hs_roledelete($id){

        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }


}
