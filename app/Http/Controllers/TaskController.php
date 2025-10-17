<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {

    }
    public function create(Request $request)
    {
        $task = Task::create([
            'task_name' => $request->task_name,
            'task_desc' => $request->task_desc,
            'sheduled_date' => $request->sheduled_date,
            'duration' => $request->duration,
        ]);

        if($task){
            return response()->json([
                'message' => 'success',
                'task' => $task
            ]);
        }
        
    }
}
