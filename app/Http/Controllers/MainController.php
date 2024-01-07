<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\ErrorResponse;
use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\AboutImageResource;
use App\Http\Resources\AdvantageResource;
use App\Http\Resources\CapabilitiesResource;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\HistoryDetailResource;
use App\Http\Resources\HistoryResource;
use App\Http\Resources\HomeResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\ProjectDetailResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\SertificateResource;
use App\Http\Resources\ServiceDetailResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SocialResource;
use App\Http\Resources\TeamResource;
use App\Models\AboutImage;
use App\Models\Advantage;
use App\Models\Application;
use App\Models\Capability;
use App\Models\Gallery;
use App\Models\History;
use App\Models\Home;
use App\Models\Partner;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Project;
use App\Models\Result;
use App\Models\Sertificate;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MainController extends Controller
{
    public function index(): SuccessResponse
    {
        $settings = Setting::where('enable', '1')->whereIn('key', ['email', 'address', 'iframe', 'logo', 'galleryBg', 'contactBg', 'blogBg', 'aboutBg', 'advantageBg','consultationBg', 'consultation_image'])->get();

        $socials = Social::where('enable', '1')->get();

//        $advantages = Advantage::where('enable', '1')->get();

        $capabilities = Capability::where('enable', '1')->get();

        $phones = Phone::where('enable', '1')->get();

        return new SuccessResponse([
            'settings' => new SettingResource($settings),
            'phones' => $phones,
            'socials' => SocialResource::collection($socials),
//            'advantages' => AdvantageResource::collection($advantages),
            'capabilities' => CapabilitiesResource::collection($capabilities)
        ]);
    }

    public function partner(): SuccessResponse
    {
        $settings = Setting::whereIn('key', ['terms_partner', 'background_image_partner'])->get();

        $partners = Partner::where('enable', '1')->get();

        return new SuccessResponse([
            'settings' => new SettingResource($settings),
            'partners' => PartnerResource::collection($partners)
        ]);
    }

    public function banner(): SuccessResponse
    {
        $banners = Home::where('enable', '1')->get();

        return new SuccessResponse(HomeResource::collection($banners));
    }

    public function service(): SuccessResponse
    {
        $services = Service::where('enable', '1')->get();

        return new SuccessResponse(ServiceResource::collection($services));
    }
    public function project(): SuccessResponse
    {
        $projects = Project::where('enable', '1')->get();

        return new SuccessResponse(ProjectResource::collection($projects));
    }

    public function post(): SuccessResponse
    {
        $posts = Post::where('enable', '1')->get();

        return new SuccessResponse(PostResource::collection($posts));
    }

    public function postDetail($id): ErrorResponse|SuccessResponse
    {
        $post = Post::find($id) ?? null;
        if ($post) {
            return new SuccessResponse(PostDetailResource::make($post));
        }
        return new ErrorResponse('Post not found');
    }

    public function projectDetail($id): ErrorResponse|SuccessResponse
    {
        $post = Project::find($id) ?? null;
        if ($post) {
            return new SuccessResponse(ProjectDetailResource::make($post));
        }
        return new ErrorResponse('Project not found');
    }

    public function serviceDetail($id): ErrorResponse|SuccessResponse
    {
        $post = Service::find($id) ?? null;
        if ($post) {
            return new SuccessResponse(ServiceDetailResource::make($post));
        }
        return new ErrorResponse('Service not found');
    }

    public function historyDetail($id): ErrorResponse|SuccessResponse
    {
        $post = History::find($id) ?? null;
        if ($post) {
            return new SuccessResponse(HistoryDetailResource::make($post));
        }
        return new ErrorResponse('History not found');
    }

    public function gallery(): SuccessResponse
    {
        $gallery = Gallery::where('enable', '1')->get();

        return new SuccessResponse(GalleryResource::collection($gallery));
    }

    public function consultation(): SuccessResponse
    {
        $settings = Setting::whereIn('key', ['consultation_name', 'consultation_job', 'consultation_description', 'consultation_image'])->get();
        return new SuccessResponse(["settings" => new SettingResource($settings)]);
    }

    public function about(): SuccessResponse
    {
        $settings = Setting::whereIn('key', ['about_video_image', 'about_video', 'about_description', 'about_short_description', ])->get();
        $images = AboutImage::where('enable', '1')->get();
        $certificates = Sertificate::where('enable', '1')->get();
        $history = History::where('enable', '1')->get();
        $team = Team::where('enable', '1')->get();
//        $results = Result::where('enable', '1')->get();
        return new SuccessResponse([
            'about' => new SettingResource($settings),
            'about_images' => AboutImageResource::collection($images),
            'certificates' => SertificateResource::collection($certificates),
            'history' => HistoryResource::collection($history),
            'team' => TeamResource::collection($team)
//            'results' => ResultResource::collection($results),
        ]);
    }

    public function createApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => ['required', Rule::in(['consultation', 'partner', 'contact', 'fast-contact'])],
            'name' => 'required|max:255',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return new ErrorResponse($validator->errors()->first());
        }
        $create = $request->all();

//        if ($request->type == 'order') {
//            $create['description'] = serialize($create['description']);
//        }

        $application = Application::create($create);


        if ($application) {
            return new SuccessResponse([], 'Ваша заявка успешно отправлена');
        }

        return new ErrorResponse('Временная ошибка, попробуйте еще раз');
    }
}
