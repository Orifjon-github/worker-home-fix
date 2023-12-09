<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\ErrorResponse;
use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\CommentResourceResource;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(): SuccessResponse
    {
        $products = Product::where('enable', '1')->get();

        return new SuccessResponse(ProductResource::collection($products));
    }

    public function detail($id): ErrorResponse|SuccessResponse
    {
        $product = Product::find($id) ?? null;
        if ($product) {
            return new SuccessResponse(ProductDetailResource::make($product));
        }
        return new ErrorResponse('Product not found');
    }

    public function createComment(Request $request) {
        $validator = Validator::make($request->all(), [
            'author' => 'required|max:255',
            'product_id' => 'required',
            'video' => 'nullable|file|mimes:mp4,webm,ogg,avi,mov|max:102400', // max 100MB
        ]);

        if ($validator->fails()) {
            return new ErrorResponse($validator->errors()->first());
        }
        $comment = new Comment();
        $comment->author = $request->author;
        $comment->phone = $request->phone ?? null;
        $comment->product_id = $request->product_id;
        $comment->description = $request->description ?? null;
        $comment->description_uz = $request->description_uz ?? null;
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoPath = $video->store('videos', 'public');
            $comment->video = env('APP_URL') . '/storage/' . $videoPath;
        }


        if ($comment->save()) {
            return new SuccessResponse(CommentResourceResource::make($comment), 'Your Feedback sent successfully');
        }

        return new ErrorResponse('Temporarily internal error, Try again');
    }
}
