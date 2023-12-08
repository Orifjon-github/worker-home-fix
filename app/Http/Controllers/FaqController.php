<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        $faqs = Faq::where('enable', '1')->get();

        return new SuccessResponse(FaqResource::collection($faqs));
    }
}
