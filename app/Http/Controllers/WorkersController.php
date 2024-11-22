<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\WorkerResponce;
use App\Models\User;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    use Response;
    public function index(){
        $users = User::all();
        return $this->success(WorkerResponce::collection($users));
    }
}
