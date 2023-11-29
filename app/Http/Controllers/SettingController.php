<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\HomeResource;
use App\Models\Advantage;
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
        $settings = Setting::pluck('value', 'key')->toArray();

        $socials = Social::all();

        $advantages = Advantage::all();

        $faqs = Faq::all();

        $partners = Partner::all();

        $results = Result::all();

        $certificates = Sertificate::all();

        $testimonials = Testimonial::all();

        $phones = Phone::all();

        $carousels = HomeResource::collection(Home::all());

        return new SuccessResponse([
            'carousels' => $carousels,
            'settings' => $settings,
            'phones' => $phones,
            'socials' => $socials,
            'advantages' => $advantages,
            'results' => $results,
            'faqs' => $faqs,
            'testimonials' => $testimonials,
            'partners' => $partners,
            'certificates' => $certificates
        ]);
    }
}
