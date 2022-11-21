<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        return Task::create([
            'task_name'=>$request->task_name
        ]);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'task_name'=>$request->task_name,
        ]);
        return $task;
    }
    
    public function taskCompleted(Request $request, Task $task)
    {
        $task->update([
            'completed' => true
        ]);
        return $task;
    }

    public function destroy(Task $task)
    {
        return response()->json([
            'status' => 204
         ], 204);
    }
}
