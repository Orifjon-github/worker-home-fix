<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(): SuccessResponse
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return new SuccessResponse($settings);
    }
}
