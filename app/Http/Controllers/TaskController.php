<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'message' => 'success',
            'tasks' => Task::all()
        ]);
    }
    public function create(Request $request)
    {
        $task = Task::create([
            'task_name' => $request->name,
            'task_desc' => $request->desc,
            'scheduled_date' => $request->scheduled_date,
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
