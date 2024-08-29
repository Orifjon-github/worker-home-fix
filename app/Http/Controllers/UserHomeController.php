<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\HomeEquipmentResource;
use App\Http\Resources\UserHomeResource;
use App\Models\HomeEquipment;
use App\Models\UserHome;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    use Response;
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $type = $request->get('type') ?? 'home';
        $homes = $user->homes()->where('type', $type)->get();

        return $this->success(UserHomeResource::collection($homes));
    }

    public function create(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->home()->create($request->all());

        $homes = $user->home()->all();
        return $this->success(UserHomeResource::collection($homes));
    }

    public function update($id, Request $request): JsonResponse
    {
        $home = UserHome::find($id);
        $home->update($request->all());

        $homes = UserHome::all();
        return $this->success(UserHomeResource::collection($homes));
    }

    public function delete($id): JsonResponse
    {
        $home = UserHome::find($id);
        $home->delete();

        $homes = UserHome::all();
        return $this->success(UserHomeResource::collection($homes));
    }

    public function equipment(Request $request): JsonResponse
    {
        return $this->render($request->input('home_id'));
    }

    public function equipmentCreate(Request $request): JsonResponse
    {
        HomeEquipment::create($request->all());
        return $this->render($request->input('home_id'));
    }

    public function equipmentUpdate($id, Request $request): JsonResponse
    {
        $equipment = HomeEquipment::find($id);
        $equipment->update($request->all());
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
