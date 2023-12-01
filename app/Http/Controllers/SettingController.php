<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\AdvantageResource;
use App\Http\Resources\CapabilitiesResource;
use App\Http\Resources\HomeResource;
use App\Http\Resources\SettingResource;
use App\Models\AboutImage;
use App\Models\Advantage;
use App\Models\Capability;
use App\Models\Faq;
use App\Models\Home;
use App\Models\Partner;
use App\Models\Phone;
use App\Models\Result;
use App\Models\Sertificate;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingController extends Controller
{
    public function index(): SuccessResponse
    {
        $settings = Setting::whereIn('key', ['email', 'address', 'iframe'])->get();

        $socials = Social::all();

        $advantages = Advantage::all();

        $capabilities = Capability::all();

        $phones = Phone::all();

        return new SuccessResponse([
            'settings' => SettingResource::collection($settings),
            'phones' => $phones,
            'socials' => $socials,
            'advantages' => AdvantageResource::collection($advantages),
            'capabilities' => CapabilitiesResource::collection($capabilities)
        ]);
    }

    public function consultation(): SuccessResponse
    {
        $settings = SettingResource::collection(Setting::whereIn('key', ['consultation_name', 'consultation_job', 'consultation_description', 'consultation_image'])->get());
        return new SuccessResponse($settings);
    }

    public function about(): SuccessResponse
    {
        $settings = SettingResource::collection(Setting::whereIn('key', ['about_image', 'about_description', 'result_video', 'delivery_text'])->get());
        $images = AboutImage::all();
        $results = Result::all();
        $certificates = Sertificate::all();
        return new SuccessResponse([
            'about' => $settings,
            'about_images' => $images,
            'results' => $results,
            'certificates' => $certificates
        ]);
    }
}
