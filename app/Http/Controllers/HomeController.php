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
        $carousels = Home::where('enable', '1')->get();

        return new SuccessResponse(HomeResource::collection($carousels));
    }
}
