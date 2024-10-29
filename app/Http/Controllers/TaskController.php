<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\Task\TaskDetailResource;
use App\Models\Task;
use App\Models\TaskMaterials;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use Response;

    public function me()
    {
        return $this->success(my()->getTasks());
    }

    public function index(Request $request)
    {
        return $this->success(my()->getTasks()->where('status', $request->status));
    }

    public function show($id)
    {
        return $this->success(new TaskDetailResource(Task::find($id)));
    }

    public function getEquipment(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->update(['is_equipment' => $task->is_equipment == 1 ? 0 : 1]);

        return $this->success($task);
    }

    public function updateDate(Request $request)
    {
        $task = Task::find($request->task_id);
        $dateTime = Carbon::now()->format('d-m.Y H:i'); // Outputs: '15-10.2024 19:00'
        if ($request->start_time) {
            $task->update(['start_time' => $dateTime]);
        }
        if ($request->end_time) {
            $task->update(['end_time' => $dateTime]);
        }

        return $this->success($task);
    }
    public function  updateMaterials(Request $request)
    {
        $material = TaskMaterials::find($request->material_id);
        $material->update(['status' => $material->status == 0 ? 1 : 0]);
        return $this->success($material);
    }
}
