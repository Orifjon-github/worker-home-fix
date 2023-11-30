<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\SuccessResponse;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): SuccessResponse
    {
        $posts = Post::all();

        return new SuccessResponse($posts);
    }
}
