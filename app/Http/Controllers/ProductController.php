<?php

namespace App\Http\Controllers;

use App\Helpers\Responses\ErrorResponse;
use App\Helpers\Responses\SuccessResponse;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): SuccessResponse
    {
        $products = Product::all();

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
}
