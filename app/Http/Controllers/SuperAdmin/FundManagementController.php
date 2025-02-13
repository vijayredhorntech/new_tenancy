<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AuthocheckHelper;
use App\Models\User;
use App\Models\Service;
use App\Models\Agency;
use Illuminate\Support\Facades\DB;
use App\Models\AddBalance;
use App\Models\Balance;



class FundManagementController extends Controller
{
    
    /**** Add function for Fund ****/

 public function him_addfund_agency($fid){
    $id = Auth::user()->id;
    $user = User::find($id);
    // $agency=Agency::where('id',$fid)->first();
    $agency=Agency::with('domains','userAssignments.service','balance')->where('id',$fid)->first();
    // dd($agency);
    $service=Service::get();
    
    
    return view('auth.admin.pages.fund.fund_form',[
        'user_data' => $user,
        'services' => $service,
        'agency'=>$agency
       ]);

 }

 /**** Store blanace in the  balance and add table ****/
 public function him_storefund(Request $request)
 {
     $uid = Auth::id(); // Optimized user ID retrieval
 
     // Validate input data
     $validatedData = $request->validate([
         'id' => 'required|integer',
         'add_ammount' => 'required|numeric|min:1',
     ]);
 
     try {
         DB::beginTransaction();
 
         // Add a new balance transaction record
         $addbalance = new AddBalance(); 
         $addbalance->agency_id = $request->id; 
         $addbalance->added_amount = $request->add_ammount; 
         $addbalance->added_date = now(); // Storing the current timestamp
         $addbalance->save();
 
         // Update or create the balance record
         $balance = Balance::where('agency_id', $request->id)->first();
 
         if ($balance) {
             $balance->balance += $request->add_ammount;
             $balance->created_user_id = $uid;
             $message = 'Balance updated successfully.';
         } else {
             $balance = new Balance();
             $balance->agency_id = $request->id;
             $balance->balance = $request->add_ammount;
             $balance->created_user_id = $uid;
             $message = 'Balance created successfully.';
         }
 
         $balance->save();
 
         DB::commit();
          return redirect()->back()->with('success', $message);
  
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update balance: ' . $e->getMessage());
     }
 }
 
}
