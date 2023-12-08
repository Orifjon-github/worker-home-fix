<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\AdvantageResource;
use App\Http\Resources\CapabilitiesResource;
use App\Http\Resources\HomeResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\SertificateResource;
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
        $settings = Setting::where('enable', '1')->whereIn('key', ['email', 'address', 'iframe', 'logo'])->get();

//        dd($settings);

        $socials = Social::where('enable', '1')->get();

        $advantages = Advantage::where('enable', '1')->get();

        $capabilities = Capability::where('enable', '1')->get();

        $phones = Phone::where('enable', '1')->get();

        return new SuccessResponse([
            'settings' => new SettingResource($settings),
            'phones' => $phones,
            'socials' => $socials,
            'advantages' => AdvantageResource::collection($advantages),
            'capabilities' => CapabilitiesResource::collection($capabilities)
        ]);
    }

    public function consultation(): SuccessResponse
    {
        $settings = Setting::whereIn('key', ['consultation_name', 'consultation_job', 'consultation_description', 'consultation_image'])->get();
        return new SuccessResponse(["settings" => new SettingResource($settings)]);
    }

    public function about(): SuccessResponse
    {
        $settings = Setting::whereIn('key', ['about_image', 'about_description', 'result_video', 'delivery_text'])->get();
        $images = AboutImage::where('enable', '1')->get();
        $results = Result::where('enable', '1')->get();
        $certificates = Sertificate::where('enable', '1')->get();
        return new SuccessResponse([
            'about' => new SettingResource($settings),
            'about_images' => $images,
            'results' => ResultResource::collection($results),
            'certificates' => SertificateResource::collection($certificates)
        ]);
    }
}
