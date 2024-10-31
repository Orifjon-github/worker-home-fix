<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\Task\TaskDetailResource;
use App\Models\Task;
use App\Models\TaskImages;
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
            $task->update(['start_time' => $dateTime , 'status'=>'process']);
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
    public function upload(Request $request)
    {
        try {
            // Validate the image
            $request->validate([
                'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,avi,wmv|max:2048',
                'task_id'=>'required'
            ]);
            $image = $request->file('file');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // Move the image to the 'uploads/images' directory
            $image->move(public_path('storage/images'), $imageName);
            // Generate the full URL for the saved image
            $imageUrl = 'storage/images/' . $imageName;
            // Store the URL in the database
            TaskImages::create(['image' => $imageUrl , 'state'=>'after' , 'task_id'=>$request->task_id]);
            return $this->success(TaskImages::where('task_id' , $request->task_id)->get());

        } catch (\Exception $e) {
            // Handle any errors that occur
            return response()->json([
                'message' => 'Image upload failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function taskDone(Request $request){
        $request->validate([
            'task_id'=>'required'
        ]);
        $task = Task::find($request->task_id);
        $task->update(['status' => 'checking']);
        return $this->success($task);
    }



}
