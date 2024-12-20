<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Resources\Task\TaskDetailResource;
use App\Models\Task;
use App\Models\TaskImages;
use App\Models\TaskMaterials;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use Response;

    public function me()
    {
        return $this->success(auth()->user()->getTasks());
    }

    public function index(Request $request)
    {
        return $this->success(auth()->user()->getTasks()->where('status', $request->status));
    }

    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
            return $this->success(new TaskDetailResource($task));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Task not found'], 404);
        }
    }

    public function getEquipment(Request $request)
    {
        $task = Task::findOrFail($request->task_id);
        $task->update(['is_equipment' => $task->is_equipment == 1 ? 0 : 1, 'status' => 'new', 'step' => 1]);

        return $this->success($task);
    }

    public function updateDate(Request $request)
    {
        $task = Task::findOrFail($request->task_id);
        if($request->start_time){
            $task->update([ 'status' => 'process', 'step' => 2]);
        }
        if($request->end_time){
            $task->update([ 'status' => 'process', 'step' => 3]);
        }

        return $this->success($task);
    }

    public function updateMaterials(Request $request)
    {
        $request->validate(['task_id'=>'required']);
        try {
            $task = Task::findOrFail($request->task_id);
            $task->update(['step' => 4]);
            if($request->has('material_id')){
                TaskMaterials::whereIn('id', $request->material_id)->update(['status' => $request->status]);
                $material = TaskMaterials::whereIn('id', $request->material_id)->get();
                return $this->success($material);
            }
            return $this->success($task);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Task not found'], 404);
        }

    }

    public function upload(Request $request)
    {

        // Validate the image

        try {
            $request->validate([
                'file' => 'required',
                'task_id' => 'required',
            ]);

            $image = $request->file('file');
            $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
            // Move the image to the 'uploads/images' directory
            $image->move(public_path('storage/images'), $imageName);
            // Generate the full URL for the saved image
            $imageUrl = '/storage/images/'.$imageName;
            // Store the URL in the database
            TaskImages::create(['image' => $imageUrl, 'state' => 'after', 'task_id' => $request->task_id]);
            $task = Task::where('id', $request->task_id)->first();
            if ($task->step != 5) {
                $task->update(['step' => 5 , 'status'=>'checking']);
            }

            return $this->success(new TaskDetailResource($task));
        } catch (\Exception $e) {
            // Handle any errors that occur
            return response()->json([
                'message' => 'Image upload failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function taskDone(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
        ]);

        $task = Task::find($request->task_id);
        if ($task->step != 6) {
            $task->update(['step' => 6]);
        }
        $task->update(['status' => 'checking']);

        return $this->success($task);
    }
    protected function validateMaterialIds($materialIds) {
        // Check if the array is not empty
        if (empty($materialIds)) {
            return true;
        }

        // Loop through each element to check if it's null or empty
        foreach ($materialIds as $id) {
            if (is_null($id)) {
                return true;
            }
        }

        return false;
    }
}
