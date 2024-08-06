<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Resources\EquipmentResource;
use App\Http\Resources\UserResource;
use App\Models\UserEquipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use Response;

    public function profileInfo(Request $request): JsonResponse
    {
        $user = $request->user();
        return $this->success(UserResource::make($user));
    }

    public function profileUpdate(Request $request): JsonResponse
    {
        $user = $request->user();
        $update = $request->all();

        if ($request->hasFile('image')) {
            $path = Storage::putFile('public/users', $request->file('image'));
            $path = str_replace('public/', '/storage/', $path);
            $update['image'] = $path;
        }

        $user->update($update);

        return $this->success(UserResource::make($user));
    }


    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = $request->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update(['password' => Hash::make($request->password)]);
            return $this->success(['message' => 'Password updated successfully']);
        } else {
            return $this->error('Old password is incorrect');
        }
    }

    public function addEquipment(Request $request): JsonResponse
    {
        $user = $request->user();
        $create = $request->all();

        $equipment = $user->equipments()->create($create);
        if (!$equipment) return $this->error('Equipment create error');

        $equipments = UserEquipment::where('enable', '1')->where('place', $create['place'])->get();
        return $this->success(EquipmentResource::make($equipments));
    }

    public function equipment(Request $request): JsonResponse
    {
        $user = $request->user();
        $place = $request->input('place');
        $equipments = $user->equipments()->where('enable', '1')->where('place', $place)->get();
        return $this->success(EquipmentResource::make($equipments));
    }
}
