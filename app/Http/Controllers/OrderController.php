<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderComment;
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
        $servicesString = $request->input('services') ?? null;

        $plan = Plan::find($plan_id);
        $amount = $plan->amount;
        if ($servicesString) {
            $services = explode(',', $servicesString);
            foreach ($services as $service_id) {
                $service = ServiceAdvantage::find($service_id);
                $amount += $service->price;
            }
        }

        if (($user->wallet->balance / 100) < $amount) {
            return $this->error('Not enough balance');
        }
        $payment = $user->payments()->create([
            'plan_id' => $plan_id,
            'services' => $servicesString,
            'type' => 'debit',
            'amount' => $amount
        ]);
        try {
            $this->withdrawBalance($user->wallet, ($amount * 100));

            $user->orders()->create([
                'plan_id' => $plan_id,
                'services' => $servicesString,
            ]);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }

        $payment->status = 'success';
        $payment->save();

        return $this->success(['message' => 'Order created successfully']);
    }

    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        $orders = $user->orders;

        return $this->success(OrderResource::collection($orders));
    }

    public function detail($id): JsonResponse
    {
        $order = Order::find($id);
        return $this->success(OrderDetailResource::make($order));
    }

    public function comment(Request $request): JsonResponse
    {
        $comment = $request->input('comment');
        $order = $request->input('order_id');

        OrderComment::create([
            'comment' => $comment,
            'order_id' => $order,
        ]);

        return $this->success(['message' => 'Sharh qoldirganingiz uchun Rahmat!']);
    }
}
