<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use Response;
    public function  me()
    {
        return $this->success(my()->getTasks()->where('status' , 'finished'));
    }
    public function index(Request $request)
    {
        if($request->status == "now"){
            return $this->success(my()->getTasks()->where('created_at' ,'=', Carbon::today()));
        }
        return $this->success(my()->getTasks()->where('status' , $request->status));
    }
}
