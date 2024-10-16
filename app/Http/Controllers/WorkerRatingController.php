<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\WokerRating;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkerRatingController extends Controller
{
    use Response;
    public function store(Request $request)
    {
        $tasks= my()->getTasks()
            ->whereBetween('created_at',
            [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ]);
        $is_success = [];
        foreach ($tasks as $task) {
            $startTime = Carbon::parse($task->start_time);
            $endTime = Carbon::parse($task->end_time);
            $work_duration =  $startTime->diffInMinutes($endTime);
            $is_success[] =  $work_duration <= $task->duration ?   1 :  0;
        }
        $successfulTasks = array_sum($is_success);
        $totalTasks = count($is_success);
        $successRate = $totalTasks > 0 ? ($successfulTasks / $totalTasks) : 0;
         // Convert success rate to a rating out of 5
        $rating = round($successRate * 5); // Round to the nearest integer
       return $this->success(['rating'=>$rating]);
    }
}
