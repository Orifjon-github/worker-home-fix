<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\NotificationDetailResource;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use Response;
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        if (!$user) return $this->error('User not found', 401);
        $globals = Notification::where('enable', '1')->where('type', 'global')->get();
        $personals = $user->notifications()->where('enable', '1')->get();
        return $this->success([
            'global' => NotificationResource::collection($globals),
            'personal' => NotificationDetailResource::collection($personals),
        ]);
    }

    public function detail($id, Request $request): JsonResponse
    {
        $user = $request->user();
        if (!$user) return $this->error('User not found', 401);

        $notification = Notification::find($id);
        if (!$notification) return $this->error('Notification Not found', 404);

        $notification->is_view = 1;
        $notification->save();

        return $this->success(NotificationDetailResource::make($notification));
    }
}
