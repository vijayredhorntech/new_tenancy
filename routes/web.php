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

        /*** Service Routes ***/
        Route::controller(SuperadminserviceController::class)->group(function () {
            Route::get('/serviceindex', 'hs_serviceindex')->name('superadmin_service');
            Route::post('/sericestore', 'hs_servicestore')->name('superadmin_ servicestore'); // Fixed extra space in name
            Route::get('/servicecreate', 'hs_servicecreate')->middleware('can:service create')->name('superadmin_servicecreate');
            Route::get('/serviceupdate/{id}', 'hs_serviceupdate')->middleware('can:service update')->name('superadmin_serviceupdate');
            Route::get('/servicedelete/{id}', 'hs_servicedelete')->middleware('can:service delete')->name('superadmin_servicedelete');
        });



        /*** Route for staff ***/
        Route::controller(SuperadminController::class)->group(function () {
            Route::get('/staffindex', 'hs_staffindex')->middleware('can:staff view')->name('superadmin.staff');
            Route::get('/staffcreate', 'hs_staffcreate')->middleware('can:staff create')->name('superadmin_staffcreate');
            Route::post('/staffstore', 'hs_staffstore')->name('superadmin_staffstore');
            Route::get('/staffupdate/{id}', 'hs_staffupdate')->middleware('can:staff update')->name('superadmin_staffupdate');
            Route::get('/staffdelete/{id}', 'hs_staffdelete')->middleware('can:staff delete')->name('superadmin_staffdelete'); // Fixed incorrect controller method
            Route::get('/staffDetails', 'hs_staffDetails')->middleware('can:view staffdetails')->name('superadmin_staffDetails');          
        });


        /*** Route for Roles ***/
        Route::controller(RoleController::class)->group(function () {
            Route::get('/roleindex', 'hs_roleindex')->middleware('can:role view')->name('superadmin.role');
            Route::get('/rolecreate', 'hs_rolecreate')->middleware('can:role create')->name('superadmin_rolecreate');
            Route::post('/rolestore', 'hs_rolestore')->name('superadmin_rolestore');
            Route::get('/roledelete/{id}', 'hs_roledelete')->middleware('can:staff view')->name('superadmin_roledelete');
            Route::get('/permissionassign/{id}', 'hs_permissionassign')->middleware('can:role delete')->name('superadmin_permissionassign');
            Route::post('/permissionassign', 'hs_permissioned')->name('superadmin_assignpermission');
        });
    
 
        /*** Route for permissions ***/
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/permission', 'hs_permissionindex')->middleware('can:permission view')->name('superadmin.permission');
            Route::get('/permissioncreate', 'hs_permissioncreate')->middleware('can:permission create')->name('superadmin_permissioncreate');
            Route::post('/permissionstore', 'hs_permissionstore')->name('superadmin_permissionstore');
            Route::get('/permissiondelete/{id}', 'hs_permissiondelete')->middleware('can:permission delete')->name('superadmin_permissiondelete');
        });
});

/*
*end gourp route super admin
*/ 

// route agencies for super admin
Route::group(['prefix' => 'agencies', 'middleware' => 'auth'], function () {
     Route::controller(AgencyController::class)->group(function () {
        Route::get('all_agencies', 'him_agency_index')->middleware('can:agency view')->name('agencies');
        Route::get('create', 'him_create_agency')->middleware('can:agency create')->name('create_agency');
        Route::post('store', 'him_store_agency')->name('agencies.store');
        Route::get('delete/{id}', 'him_delete_agency')->name('agencies.delete');
    });
});



/*** Route for agencies  admin ***/
Route::group(['prefix' => 'agencies'], function () {
       Route::post('agencies_store', [AgencyController::class, 'him_agencies_store'])->name('agency_login');
    //    Route::get('dashboard', [AgencyController::class, 'him_agencies_store'])->name('agency_dashboard');

});


Route::get('/agencies/dashboard',[AgencyController::class, 'him_agenciesdashboard']);

    /*** Route for agencies  admin ***/


    /*** Route for agencies  admin ***/
    // Route::post('agencies_store', [AgencyController::class, 'him_agencies_store'])->name('agency_login');

// route single agency user
Route::get('/{d}', [AgencyController::class, 'him_agencylogin']);
