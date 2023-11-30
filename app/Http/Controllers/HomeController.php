<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\HomeResource;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): SuccessResponse
    {
        $carousels = HomeResource::collection(Home::all());

        return new SuccessResponse($carousels);
    }
}
