<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseHelper
{
    public static function createDatabaseForUser($databaseName,$agency)
    {
        
   
        // Create a new database for the user
        DB::statement("CREATE DATABASE {$databaseName}");
        config(['database.connections.tenant.database' => $databaseName]);
        // Run migrations for the new database
        Artisan::call('migrate', ['--database' => 'tenant', '--path' => 'database/migrations']);

        DB::connection('tenant')->table('users')->insert([
            'name' => $agency->name,
            'email' => $agency->email,
            'password' => Hash::make('admin@1232'), // You can use a default password or pass one as a parameter
        ]);
    
    }

  
}

?>