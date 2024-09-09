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
        $type = $request->input('type');
        $plan  = $request->input('plan');
        $services = $request->input('services') ?? null;

        $plan = Plan::where('duration', $plan)->where('type', $type)->first();
        if (!$plan) return $this->error('Plan not found');

        $user->orders()->create([
            'plan_id' => $plan->id,
            'services' => $services,
        ]);

        return $this->success(['message' => 'Order created successfully']);
    }
}
