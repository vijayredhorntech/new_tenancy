<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;

class SuperadminserviceController extends Controller
{

    public function hs_serviceindex(){
        
        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get();
        return view('auth.admin.pages.service.service', ['user_data' => $user,'services' => $service]);
    }

      /** Form create for serice **/
    public function hs_servicecreate(){
       
        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get();
        return view('auth.admin.pages.service.service_form', ['user_data' => $user,'services' => $service]);
    }


     /** Store Service **/
    public function hs_servicestore(Request $request)
            {
                $validated = $request->validate([
                    'service_name' => 'required|string|max:255',
                    'icon' => 'required',
                ]);

                $service = new Service();
                $service->name = $request->service_name;
                $service->icon = $request->icon; // Corrected from $request->service_name to $request->icon
                $service->description = $request->description;

                if ($service->save()) {
                    return redirect()->route('superadmin.staff')->with('success', 'Service created successfully.');
                } else {
                    return redirect()->route('superadmin_servicecreate')->with('error', 'Failed to create service.');
                }
            }

          

}


