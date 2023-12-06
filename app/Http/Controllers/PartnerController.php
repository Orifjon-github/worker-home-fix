<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\SettingResource;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index() {
        $settings = SettingResource::collection(Setting::whereIn('key', ['terms_partner_1', 'terms_partner_2', 'background_image_partner'])->get());

        $partners = Partner::where('enable', '1')->get();

        return new SuccessResponse([
            'settings' => $settings,
            'partners' => PartnerResource::collection($partners)
        ]);
    }
}
