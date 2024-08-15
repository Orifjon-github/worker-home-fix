<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\PlanResource;
use App\Http\Resources\UserPlanResource;
use App\Models\UserPlan;
use Carbon\Carbon;
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

        return $this->success(UserPlanResource::collection($user->plans));
    }

    public function planComplete(Request $request): JsonResponse
    {
        $plan_id = $request->input('plan_id');
        $is_complete = $request->input('is_complete');

        $plan = UserPlan::find($plan_id);
        if (!$plan) return $this->error('Plan not found', 404);

        $plan->is_complete = (bool)$is_complete;
        $plan->save();

        $user = $request->user();
        return $this->success(UserPlanResource::collection($user->plans));
    }

    public function planCreate(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->plans()->create($request->all());

        return $this->success(UserPlanResource::collection($user->plans));
    }

    public function planToday(Request $request): JsonResponse
    {
        $user = $request->user();

        $plans = $user->plans()->whereDate('date', Carbon::today())->get();

        return $this->success(UserPlanResource::collection($plans));
    }
}
