<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\PlanResource;
use App\Models\UserPlan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Response;
    public function sendQuestion(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->questions()->create(['question' => $request->input('question')]);

        return $this->success(['message' => 'Savolingiz qabul qilindi! Tez orada mutaxasislarimiz siz bilan bog\'lanishadi']);
    }

    public function plan(Request $request): JsonResponse
    {
        $user = $request->user();

        return $this->success(PlanResource::collection($user->plans));
    }

    public function planComplete($id, Request $request): JsonResponse
    {
        $plan = UserPlan::find($id);
        if (!$plan) return $this->error('Plan not found', 404);

        $plan->is_complete = 1;
        $plan->save();

        $user = $request->user();
        return $this->success(PlanResource::collection($user->plans));
    }

    public function planCreate(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->plans()->create($request->all());

        return $this->success(PlanResource::collection($user->plans));
    }
}
