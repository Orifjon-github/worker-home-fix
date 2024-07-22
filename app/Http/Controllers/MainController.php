<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\AdvantageResource;
use App\Http\Resources\BannerResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\ServiceDetailResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SocialResource;
use App\Http\Resources\TestimonialResource;
use App\Http\Resources\WorkResource;
use App\Models\Advantage;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\Result;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    use Response;
    public function index(): JsonResponse
    {
        $settings = Setting::where('enable', '1')->where('key', 'not like', 'seo_%')->get();

        $socials = Social::where('enable', '1')->get();

        $results = Result::where('enable', '1')->get();

        return $this->success([
            'settings' => new SettingResource($settings),
            'socials' => SocialResource::collection($socials),
            'results' => ResultResource::collection($results)
        ]);
    }

    public function partner(): JsonResponse
    {
        $partners = Partner::where('enable', '1')->get();

        return $this->success(PartnerResource::collection($partners));
    }

    public function banner(): JsonResponse
    {
        $banners = Banner::where('enable', '1')->get();

        return $this->success(BannerResource::collection($banners));
    }

    public function advantage(): JsonResponse
    {
        $advantages = Advantage::where('enable', '1')->get();

        return $this->success(AdvantageResource::collection($advantages));
    }
    public function faq(): JsonResponse
    {
        $faqs = Faq::where('enable', '1')->get();

        return $this->success(FaqResource::collection($faqs));
    }

    public function service(): JsonResponse
    {
        $services = Service::where('enable', '1')->get();

        return $this->success(ServiceResource::collection($services));
    }

    public function work(): JsonResponse
    {
        $works = Work::where('enable', '1')->get();

        return $this->success(WorkResource::collection($works));
    }

    public function testimonial(): JsonResponse
    {
        $testimonials = Testimonial::where('enable', '1')->get();

        return $this->success(TestimonialResource::collection($testimonials));
    }

    public function serviceDetail($id): JsonResponse
    {
        $service = Service::find($id) ?? null;

        if (!$service) return $this->error('Service not found', 404);

        return $this->success(ServiceDetailResource::make($service));
    }

    public function seo(): JsonResponse
    {
        $settings = Setting::where('enable', '1')->where('key', 'like', 'seo_%')->get();
        return $this->success(SettingResource::make($settings));
    }
}
