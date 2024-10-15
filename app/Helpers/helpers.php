<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('my')) {
    function my()
    {
        return auth()->user();
    }
}
if(!function_exists('s_db')){
    function s_db(){
      return   DB::connection('mysql2');
    }
}
