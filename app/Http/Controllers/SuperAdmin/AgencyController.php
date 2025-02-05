<?php

namespace App\Http\Controllers\SuperAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Agency;
use App\Models\Domain;
use Illuminate\Support\Facades\DB;
use App\Helpers\DatabaseHelper;

class AgencyController extends Controller
{
    
    // code for all agency
    public function him_agency_index(){
           
            $id = Auth::user()->id;
            $user = User::find($id);
            $agency=Agency::with('domains')->get();
            // $domains = $agency->domains;
            return view('auth.admin.pages.agencies', ['user_data' => $user,'agencies'=>$agency]);

    }


      // code for all agency
    public function him_create_agency(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('auth.admin.pages.agencies_form', ['user_data' => $user]);
    }


    // code for store agency
   
    public function him_store_agency(Request $request)
                {
                    
                    // Validate the incoming data
                    $validated = $request->validate([
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:agencies,email',
                        'phone' => 'required|string',
                        'domain' => 'required|string|max:255',
                        'database' => 'required|string|max:255',
                        'contact_person' => 'nullable|string|max:255',
                        'contact_phone' => 'nullable|string|max:20',
                        'address' => 'nullable|string',
                        'country' => 'nullable|string|max:255',
                    ]);
                
                    // Get the authenticated user's ID
                    $auth_id = Auth::user()->id;
                
                    // Start a transaction
                    \DB::beginTransaction();
                
                    try {
                        // Insert into the 'agencies' table
                        $agency = Agency::create([
                            'name' => $request->name,
                            'email' => $request->email,  
                            'phone' => $request->phone,
                            'database_name' => $request->database,
                            'contact_person' => $request->contact_person,
                            'contact_phone' => $request->contact_phone,
                            'address' => $request->address,
                            'country' => $request->country,
                            'user_id' => $auth_id,  
                        ]);
                
                        $full_url=env('DOMAIN')."/".$domain_name;
                   
                        // Insert into the 'domains' table
                        $domain = Domain::create([
                            'domain_name' => $request->domain, 
                            'agency_id' => $agency->id,       
                            'user_id' => $auth_id,             
                            'full_url' => $full_url,  
                        ]);
                
                     
                        // Create database and run migrations
                    
                        \DB::commit();
                    DatabaseHelper::createDatabaseForUser($request->database,$agency);
                        // Return success response
                        return response()->json([
                            'message' => 'Agency and domain created successfully.',
                            'agency' => $agency,
                            'domain' => $domain,
                        ], 200);
                
                    } catch (\Exception $e) {
                        // Rollback the transaction if anything fails
                        \DB::rollBack();
                
                        // Delete the agency if domain creation fails
                        if (isset($agency)) {
                            $agency->delete(); // Delete agency if domain creation fails
                        }
                
                        // Return error response
                        return response()->json([
                            'message' => 'Failed to create agency and domain.',
                            'error' => $e->getMessage(),
                        ], 500);
                    }
    }


    public function him_agencylogin($id){
   dd("heelo");

    }
    



}
