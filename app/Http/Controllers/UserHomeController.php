<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\HomeEquipmentResource;
use App\Http\Resources\UserHomeResource;
use App\Models\HomeEquipment;
use App\Models\UserHome;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserHomeController extends Controller
{
    use Response;
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $type = $request->get('type') ?? 'home';
        $homes = $user->home()->where('type', $type)->get();

        return $this->success(UserHomeResource::collection($homes));
    }

    public function create(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->home()->create($request->all());
        $type = $request->input('type') ?? 'home';
        $homes = $user->home()->where('type', $type)->get();
        return $this->success(UserHomeResource::collection($homes));
    }

    public function update($id, Request $request): JsonResponse
    {
        $user = $request->user();
        $home = UserHome::find($id);
        $home->update($request->all());
        $type = $request->input('type') ?? 'home';
        $homes = $user->home()->where('type', $type)->get();

        return $this->success(UserHomeResource::collection($homes));
    }

    public function delete($id, Request $request): JsonResponse
    {
        $user = $request->user();
        $home = UserHome::find($id);
        $type = $home->type;
        $home->delete();

        $homes = $user->home()->where('type', $type)->get();
        return $this->success(UserHomeResource::collection($homes));
    }

    public function equipment(Request $request): JsonResponse
    {
        return $this->render($request->input('home_id'));
    }

    public function equipmentCreate(Request $request): JsonResponse
    {
        $create = $request->all();
        if ($request->hasFile('image')) {
            $path = Storage::putFile('public/equipments', $request->file('image'));
            $path = str_replace('public/', '/storage/', $path);
            $create['image'] = $path;
        }

        HomeEquipment::create($create);
        return $this->render($request->input('home_id'));
    }

    public function equipmentUpdate($id, Request $request): JsonResponse
    {
        $equipment = HomeEquipment::find($id);
        $update = $request->all();
        if ($request->hasFile('image')) {
            $path = Storage::putFile('public/equipments', $request->file('image'));
            $path = str_replace('public/', '/storage/', $path);
            $update['image'] = $path;
        }
        $equipment->update($update);
        return $this->render($request->input('home_id'));
    }

    public function equipmentDelete($id): JsonResponse
    {
        $equipment = HomeEquipment::find($id);
        $home_id = $equipment->home_id;
        $equipment->delete();

        return $this->render($home_id);
    }

    private function render($id): JsonResponse
    {
        $equipments = HomeEquipment::where('home_id', $id)->get();
        return $this->success(HomeEquipmentResource::collection($equipments));
    }
}
