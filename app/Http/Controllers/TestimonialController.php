<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index() {
        $testimonials = Testimonial::where('enable', '1');

        return new SuccessResponse($testimonials);
    }
}
