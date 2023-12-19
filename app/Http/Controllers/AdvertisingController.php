<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\AdvertisingResource;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function index() {
        $advertising = Advertising::all()->latest()->first();
        return new SuccessResponse(AdvertisingResource::make($advertising));
    }
}
