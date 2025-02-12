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
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\UserServiceAssignment;


class AgencyController extends Controller
{
    
    // code for all superadmin to contenncted with agency
    public function him_agency_index(){
           
            $id = Auth::user()->id;
            $user = User::find($id);
            $agency=Agency::with('domains','userAssignments.service','balance')->get();     
            $service=Service::get();
            return view('auth.admin.pages.agencies', ['user_data' => $user,'agencies'=>$agency,'services' => $service]);

    }


      // code for all agency
    public function him_create_agency(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get();

        $countries = DatabaseHelper::getCountries();
        return view('auth.admin.pages.agencies_form', ['user_data' => $user,'services' => $service,'countries'=>$countries]);
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
                        'domain' => 'required|string|unique:domains,domain_name',
                        'database' => 'required|string|unique:agencies,database_name',
                        'contact_person' => 'nullable|string',
                        'contact_phone' => 'nullable|string',
                        'address' => 'nullable|string',
                        'country' => 'required|string',
                    ]);
                
                    // Get the authenticated user's ID
                    $auth_id = Auth::user()->id;
                
                    // Start a transaction
                    \DB::beginTransaction();

                    // code for images
                    $profile = "";

                    if ($request->hasFile('logo')) {
                        $file = $request->file('logo'); 
                        $destinationPath = public_path('images/agencies/logo/');
                        if (!File::exists($destinationPath)) {
                            File::makeDirectory($destinationPath, 0755, true, true);
                        }
                        $fileName = 'profile_' . auth()->id() . '_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                        $file->move($destinationPath, $fileName);
                        $profile = $fileName;
                    }

                    try {
                        // Insert into the 'agencies' table
                        $agency = Agency::create([
                            'name' => $request->name,
                            'email' => $request->email,  
                            'phone' => $request->phone,
                            'database_name' => $request->database,
                            'contact_person' => $request->contact_person,
                            'contact_phone' => $request->contact_phone,
                            'address' =>       $request->address,
                            'country' =>       $request->country,
                            'user_id' =>       $auth_id,  
                            'profile_picture'=> $profile,
                        ]);
                
                        $full_url=env('DOMAIN')."/".$request->domain;
                
                   
                        // Insert into the 'domains' table
                        $domain = Domain::create([
                            'domain_name' => $request->domain, 
                            'agency_id' => $agency->id,       
                            'user_id' => $auth_id,             
                            'full_url' => $full_url,  
                        ]);


                        // Assign Services if provided
                        if (!empty($request->services) && is_array($request->services)) {

                            $agency_id= $agency->id;
                            foreach ($request->services as $service_id) {
                                $serviceassign=new UserServiceAssignment();
                                $serviceassign->agency_id=$agency_id;
                                $serviceassign->service_id=$service_id;
                                $serviceassign->save(); 
                            }
                        }     
                        // Create database and run migrations         
                        \DB::commit();
                         DatabaseHelper::createDatabaseForUser($request->database,$agency,$profile);
                        return redirect()->route('agencies')->with('success', 'Agency and domain created successfully.');
                
                    } catch (\Exception $e) {
                        // Rollback the transaction if anything fails
                        \DB::rollBack();
                
                        // Delete the agency if domain creation fails
                        if (isset($agency)) {
                            $agency->delete(); 
                        }
                             return redirect()->back()->withInput()->with('error', 'Failed to create agency and domain: ' . $e->getMessage());
                    }
    }


      /*** Function for update****/
      public function him_edit_agency ($eid){

        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get();
        $agency=Agency::with('userAssignments.service')->where('id',$eid)->first();
        // dd($agency);

         $countries = DatabaseHelper::getCountries();
    //   dd($countries);
        // dd($service);

        return view('auth.admin.pages.editagencies_form',[
         'user_data' => $user,
         'services' => $service,
         'countries'=>$countries,
         'edit_agency'=>$agency
        ]);
       

    }


/**** Update function for agency *****/
public function him_editstore(Request $request)
{
    \DB::beginTransaction(); // Start transaction

    try {
        $agency = Agency::where('id', $request->id)->first();
        
        if (!$agency) {
            return response()->json(['error' => 'Agency not found'], 404);
        }

        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->address = $request->address;
        $agency->country = $request->country;
        $agency->save(); // Save agency details

        // Delete existing service assignments for the agency
        UserServiceAssignment::where('agency_id', $request->id)->delete();

        // Assign new services if provided
        if (!empty($request->services) && is_array($request->services)) {
            $agency_id = $request->id;
            // dd($agency_id);
            foreach ($request->services as $service_id) {
                $serviceassign=new UserServiceAssignment();
                $serviceassign->agency_id=$agency_id;
                $serviceassign->service_id=$service_id;
                $serviceassign->save(); 
            }
        }

        \DB::commit(); 
        return redirect()->route('agencies')->with('success', 'Agency and domain created successfully.');
    } catch (\Exception $e) {
        \DB::rollBack(); // Rollback transaction on error
        return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
    }
}





    /*****  Route for agency   ***** */
            public function him_agencylogin($domain)
            {    
                //  dd($domain);  
                $agency = Agency::whereHas('domains', function ($query) use ($domain) {
                    $query->where('domain_name', $domain);
                })->with('domains')->first();
                if ($agency) {
                    return view('agencies.login', ['agency' => $agency]);
                } else {
                    return redirect()->route('superadmin_login')->with('error', 'Domain not found.');
                }
            }
    

    /*** Function for agencies login ** */
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
                                        // return redirect()->route('agency_dashboard');
                                        
                                    }else{
                                        // If authentication fails
                                        
                                    return back()->withErrors(['error' => 'Invalid credentials']);
                                    }
             
                                } catch (\Exception $e) {
                                    dd($e);
                                    // Handle the error if the database doesn't exist or connection fails
                                    return back()->withErrors(['error' => 'Database does not exist or could not be connected']);
                                }
          }

   
         /*
          *
          *
          * Function for dashboard
          *
          *
          **/

              public function him_agenciesdashboard(){
                                $id = Auth::user()->id;
                                // dd($id); 
                                $userData = \session('user_data');
                                DatabaseHelper::setDatabaseConnection($userData['database']);
                                $user = User::on('user_database')->where('id', $id)->first();
                                $agency_record=Agency::where('email',$user->email)->first(); 
                                $agency = Agency::with('userAssignments.service')->find($agency_record->id);
                                $services = $agency->userAssignments->pluck('service.name', 'service.icon');
                                // $services = $agency->userAssignments;
                                // dd($services);
                                // dd($agency);
                            
                                return view('agencies.admin.pages.index', ['user_data' => $user,'services' => $services]);
                 }

 

          

/****logout function for agency***** */
                        public function him_agencies_logout(){    
                            $userData = \session('user_data');
                            dd($userData);
                            DatabaseHelper::setDatabaseConnection($userData['database']);
                            $user = User::on('user_database')->where('id', $id)->first();
                            return view('agencies.admin.pages.index', ['user_data' => $user]);
                    }
    


            




}
