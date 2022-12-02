<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Task::where('task_name', 'ILIKE', '%' . $request->like . '%')->orderBy('created_at', 'desc')->get();
    }

    public function store(StoreTaskRequest $request)
    {
        return Task::create($request->validated());
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $task->update($request->validated());
        return $task;
    }

    public function taskCompleted(Task $task)
    {
        $task->update([
            'completed' => true
        ]);
        return $task;
    }

    public function destroy(Task $task)
    {
        $response = $task->delete();
        return response()->json([
            'message' => $response ? 'Task deletada com sucesso!' : 'Ocorreu um erro.',
         ], $response ? 204 : 500);
    }
}
