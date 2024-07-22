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
        $notifications = Notification::where('enable', 1)
            ->where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('type', 'global');
            })
            ->get();

        return $this->success(NotificationResource::collection($notifications));
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
