<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Service;
use App\Models\ServiceAdvantage;
use App\Payme\Traits\PaymeHelper;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use Response, PaymeHelper;
    public function create(Request $request): JsonResponse
    {
        $user = $request->user();
        $plan_id  = $request->input('plan_id');
        $services = $request->input('services') ?? null;

        $plan = Plan::find($plan_id);
        $amount = $plan->amount;
        if ($services) {
            $services = explode(',', $services);
            foreach ($services as $service_id) {
                $service = ServiceAdvantage::find($service_id);
                $amount += $service->price;
            }
        }

        if ($user->wallet->balance < $amount) {
            return $this->error('Not enough balance');
        }
        $payment = $user->payments()->create([
            'plan_id' => $plan_id,
            'services' => $services,
            'type' => 'debit',
            'amount' => $amount
        ]);
        try {
            $this->withdrawBalance($user->wallet, $amount);

            $user->orders()->create([
                'plan_id' => $plan_id,
                'services' => $services,
            ]);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }

        $payment->status = 'success';
        $payment->save();

        return $this->success(['message' => 'Order created successfully']);
    }
}
