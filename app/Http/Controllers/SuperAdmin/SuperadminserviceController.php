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
                    
                ]);

                $service = new Service();
                $service->name = $request->service_name;
                $service->icon = $request->icon; // Corrected from $request->service_name to $request->icon
                $service->description = $request->description;

                if ($service->save()) {
                    return redirect()->route('superadmin_service')->with('success', 'Service created successfully.');
                } else {
                    return redirect()->route('superadmin_service')->with('error', 'Failed to create service.');
                }
            }

    /** Store update **/
    public function hs_serviceupdate($id)
        {
             $service = Service::find($id);
             $all_service=Service::get();
            if (!$service) {
               return redirect()->route('superadmin_service')->with('error', 'Service not found.');
                }              
                        return view('auth.admin.pages.service.service_form',['services'=>$all_service,'service'=>$service]);
                    }


        /** Store Delete **/              
                    public function hs_servicedelete($id)
                         {
                            $service = Service::find($id);
                                if ($service) {
                                    $service->delete();
                                    return redirect()->route('superadmin_service')->with('success', 'Service deleted successfully.');
                                } else {
                                    return redirect()->route('superadmin_service')->with('error', 'Service not found.');
                                }}
           

}


