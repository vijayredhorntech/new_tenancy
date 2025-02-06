<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseHelper
{
    public static function createDatabaseForUser($databaseName,$agency)
    {
        
     /**
     * Create a new database for the user.
     */
        DB::statement("CREATE DATABASE {$databaseName}");
        config(['database.connections.tenant.database' => $databaseName]);

        // Run migrations for the new database
        Artisan::call('migrate', ['--database' => 'tenant', '--path' => 'database/migrations']);

        // insert database
        DB::connection('tenant')->table('users')->insert([
            'name' => $agency->name,
            'email' => $agency->email,
            'password' => Hash::make('admin@1232'), // You can use a default password or pass one as a parameter
        ]);
    
    }

      /**
     * Set the database connection dynamically.
     */
    public static function setDatabaseConnection($databaseName)
    {
        config(['database.connections.user_database' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => $databaseName,
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
        ]]);
    }
  
}

?>