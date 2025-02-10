<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\AuthController;
use App\Http\Controllers\SuperAdmin\AgencyController;
use App\Http\Controllers\SuperAdmin\SuperadminserviceController;
use App\Http\Controllers\SuperAdmin\SuperadminController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\PermissionController;


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




Route::get('/login',[AuthController::class,'login_form'])->name('login');
Route::post('/login',[AuthController::class,'superadmin_login'])->name("superadmin_login");
Route::get('/logout',[AuthController::class,'superadmin_logout'])->name("superadmin_logout");


Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AuthController::class, 'hs_dashbord'])->name('dashboard');
    /*** Route for staff ***/
    Route::get('/serviceindex', [SuperadminserviceController::class, 'hs_serviceindex'])->name('superadmin_service');
    Route::get('/servicecreate', [SuperadminserviceController::class, 'hs_servicecreate'])->name('superadmin_servicecreate');
    Route::post('/sericestore', [SuperadminserviceController::class, 'hs_servicestore'])->name('superadmin_ servicestore');
    Route::get('/serviceupdate/{id}', [SuperadminserviceController::class, 'hs_serviceupdate'])->name('superadmin_serviceupdate'); // Corrected spelling & added {id}
    Route::get('/servicedelete/{id}', [SuperadminserviceController::class, 'hs_servicedelete'])->name('superadmin_servicedelete'); 


     /*** Route for staff ***/
    Route::get('/staffindex',[SuperadminController::class, 'hs_staffindex'])->name('superadmin.staff');
    Route::get('/staffcreate',[SuperadminController::class, 'hs_staffcreate'])->name('superadmin_staffcreate');
    Route::post('/staffstore',[SuperadminController::class, 'hs_staffstore'])->name('superadmin_staffstore');
    Route::get('/staffupdate/{id}',[SuperadminController::class, 'hs_staff'])->name('superadmin_staffupdate');
    Route::delete('/staffdelete',[SuperadminController::class, 'hs_staffcreate'])->name('superadmin_staffdelete');
    Route::get('/staffDetails',[SuperadminController::class, 'hs_staffDetails'])->name('superadmin_staffDetails');


    /*** Route for Roles ***/
    Route::get('/roleindex',[RoleController::class, 'hs_roleindex'])->name('superadmin.role');
    Route::get('/rolecreate',[RoleController::class, 'hs_rolecreate'])->name('superadmin_rolecreate');
    Route::post('/rolestore',[RoleController::class, 'hs_rolestore'])->name('superadmin_rolestore');
    Route::get('/roledelete/{id}',[RoleController::class, 'hs_roledelete'])->name('superadmin_roledelete');


   /*** Route for permissions ***/
    Route::get('/permission',[PermissionController::class, 'hs_permissionindex'])->name('superadmin.permission');
    Route::get('/permissioncreate',[PermissionController::class, 'hs_permissioncreate'])->name('superadmin_permissioncreate');
    Route::post('/permissionstore',[PermissionController::class, 'hs_permissionstore'])->name('superadmin_permissionstore');
    Route::get('/permissiondelete/{id}',[PermissionController::class, 'hs_permissiondelete'])->name('superadmin_permissiondelete');



});

// route agencies for super admin
Route::group(['prefix' => 'agencies', 'middleware' => 'auth'], function () {
    Route::get('all_agencies', [AgencyController::class, 'him_agency_index'])->name('agencies');
    Route::get('create', [AgencyController::class, 'him_create_agency'])->name('create_agency');
    Route::post('store', [AgencyController::class, 'him_store_agency'])->name('agencies.store');
});


Route::group(['prefix' => 'agents', 'middleware' => 'auth'], function () {
    Route::get('all_agents', [AgentController::class, 'him_agent_index'])->name('agents');
    Route::get('create', [AgentController::class, 'him_create_agent'])->name('create_agent');
});




/*** Route for agencies  admin ***/
Route::group(['prefix' => 'agencies'], function () {
       Route::post('agencies_store', [AgencyController::class, 'him_agencies_store'])->name('agency_login');

});


Route::get('/agencies/dashboard',[AgencyController::class, 'him_agenciesdashboard']);

    /*** Route for agencies  admin ***/


    /*** Route for agencies  admin ***/
    // Route::post('agencies_store', [AgencyController::class, 'him_agencies_store'])->name('agency_login');

// route single agency user
Route::get('/{d}', [AgencyController::class, 'him_agencylogin']);
