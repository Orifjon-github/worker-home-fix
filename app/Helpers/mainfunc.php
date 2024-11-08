<?php


use Illuminate\Support\Facades\DB;

if (!function_exists('s_db')) {
    /**
     * Helper function to access the database connection.
     *
     * @return \Illuminate\Database\Connection
     */
    function s_db()
    {
        return DB::connection('mysql2');
    }
}
