<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class DatabaseHelper
{
    public static function createDatabaseForUser($databaseName)
    {
        // Create a new database for the user
        DB::statement("CREATE DATABASE {$databaseName}");
        config(['database.connections.tenant.database' => $databaseName]);
        // Run migrations for the new database
        Artisan::call('migrate', ['--database' => 'tenant', '--path' => 'database/migrations/tenant']);
    
    }
}

?>