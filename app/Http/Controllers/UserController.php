<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\PlanResource;
use App\Http\Resources\UserPaymentResource;
use App\Http\Resources\UserPlanResource;
use App\Models\UserPlan;
use App\Payme\Models\PaymeTransaction;
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

        $plan->is_complete = $is_complete;
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

    public function paymeUrl(Request $request): JsonResponse
    {
        $user = $request->user();
        if (!$user && empty($user->wallet)) return $this->error('Error while getting User Account');
        $amount = $request->input('amount');
        $merchant = config('payme.merchant_id');
        $params = "m={$merchant};ac.wallet_id={$user->wallet->wallet_id};a={$amount}";

        $encodedParams = base64_encode($params);

        $checkoutUrl = "https://checkout.paycom.uz/{$encodedParams}";

        return $this->success([
            'checkout_url' => $checkoutUrl
        ]);
    }

    public function paymentHistory(Request $request): JsonResponse
    {
        $user = $request->user();
        if (!$user && empty($user->wallet)) return $this->error('Error while getting User Account');

        $payme = PaymeTransaction::where('wallet_id', $user->wallet->id)->get();
        return $this->success(UserPaymentResource::collection($payme));
    }
}
