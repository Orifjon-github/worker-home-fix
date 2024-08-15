<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use Response;
    public function order(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->orders()->create($request->all());

        return $this->success(['message' => 'Order created successfully']);
    }
}
