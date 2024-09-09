<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use Response;
    public function create(Request $request): JsonResponse
    {
        $user = $request->user();
        $plan_id  = $request->input('plan_id');
        $services = $request->input('services') ?? null;

        $user->orders()->create([
            'plan_id' => $plan_id,
            'services' => $services,
        ]);

        return $this->success(['message' => 'Order created successfully']);
    }
}
