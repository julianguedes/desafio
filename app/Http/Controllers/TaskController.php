<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(StoreTaskRequest $request)
    {
        return Task::create($request->validated());
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, UpdateTaskRequest $task)
    {
        $task->update($request->validated());
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
