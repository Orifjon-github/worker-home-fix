<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\ErrorResponse;
use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): SuccessResponse
    {
        $posts = Post::where('enable', '1')->get();

        return new SuccessResponse(PostResource::collection($posts));
    }

    public function detail($id): ErrorResponse|SuccessResponse
    {
        $post = Post::find($id) ?? null;
        if ($post) {
            return new SuccessResponse(PostDetailResource::make($post));
        }
        return new ErrorResponse('Blog not found');
    }
}
