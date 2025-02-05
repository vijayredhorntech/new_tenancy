<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\AuthController;
use App\Http\Controllers\SuperAdmin\AgencyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login',function (){
//      return view('auth.login');
// });

Route::fallback(function() {
    return redirect('/login');
});

Route::get('/login',[AuthController::class,'login_form']);
Route::post('/login',[AuthController::class,'superadmin_login'])->name("superadmin_login");


Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AuthController::class, 'hs_dashbord'])->name('dashboard');
 
    
   

    
});

Route::group(['prefix' => 'agencies', 'middleware' => 'auth'], function () {
    Route::get('all_agencies', [AgencyController::class, 'him_agency_index'])->name('agencies');
    Route::get('create', [AgencyController::class, 'him_create_agency'])->name('create_agency');
    Route::post('store', [AgencyController::class, 'him_store_agency'])->name('agencies.store');
    
   

    
});