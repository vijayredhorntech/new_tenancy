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
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class AgencyController extends Controller
{
    
    // code for all agency
    public function him_agency_index(){
           
            $id = Auth::user()->id;
            $user = User::find($id);
            $agency=Agency::with('domains')->get();
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

                    // dd($request->all());
                    // Validate the incoming data
                    $validated = $request->validate([
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:agencies,email',
                        'phone' => 'required|string',
                        'domain' => 'required|string|max:255|unique:domains,domain_name',
                        'database' => 'required|string|max:255|unique:agencies,database_name',
                        'contact_person' => 'nullable|string|max:255',
                        'contact_phone' => 'nullable|string|max:20',
                        'address' => 'nullable|string',
                        'country' => 'required|string|max:255',
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
                
                        $full_url=env('DOMAIN')."/".$request->domain;
                
                   
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
                        return redirect()->route('agencies')->with('success', 'Agency and domain created successfully.');
                
                    } catch (\Exception $e) {
                        // Rollback the transaction if anything fails
                        \DB::rollBack();
                
                        // Delete the agency if domain creation fails
                        if (isset($agency)) {
                            $agency->delete(); // Delete agency if domain creation fails
                        }
                             return redirect()->back()->withInput()->with('error', 'Failed to create agency and domain: ' . $e->getMessage());
                    }
    }


    public function him_agencylogin($domain)
    {    
        // $domain = Domain::where('domain_name', $domain)->first(); 
        $agency = Agency::whereHas('domains', function ($query) use ($domain) {
            $query->where('domain_name', $domain);
        })->with('domains')->first();

        if ($agency) {
            return view('agencies.login', ['agency' => $agency]);
        } else {
            return redirect()->route('superadmin_login')->with('error', 'Domain not found.');
        }
    }
    

        public function him_agencies_store(Request $request){
            
            // Validate input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'domain'=>'required',
            'database'=>'required',
        ]);

        $databaseName = $validatedData['database'];

                try {
                // Set the dynamic connection config using the helper function
                DatabaseHelper::setDatabaseConnection($databaseName);

                    // Check if user exists in the specified database

                    $user = User::on('user_database')->where('email', $validatedData['email'])->first();
                 

                    if ($user && Hash::check($validatedData['password'], $user->password)) {
                        // Log the user in if the password matches
                        // Store validated data in the session
                        \session(['user_data' => $validatedData]);
                        Auth::login($user);
                        
                        return redirect('/agencies/dashboard');
                    }else{
                         // If authentication fails
                        
                    return back()->withErrors(['error' => 'Invalid credentials']);
                    }
            
                   
                    
                } catch (\Exception $e) {
                    // Handle the error if the database doesn't exist or connection fails
                    return back()->withErrors(['error' => 'Database does not exist or could not be connected']);
                }
      }


        public function him_agenciesdashboard(){
            $id = Auth::user()->id;
            // dd($id); 
            $userData = \session('user_data');
            DatabaseHelper::setDatabaseConnection($userData['database']);
            $user = User::on('user_database')->where('id', $id)->first();
            dd($user);

      }



}
