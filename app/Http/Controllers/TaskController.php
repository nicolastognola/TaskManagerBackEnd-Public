<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   
    public function index(Request $request)
{
    $tasks = Task::query();

    if ($request->has('completed')) {
        $isCompleted = filter_var($request->completed, FILTER_VALIDATE_BOOLEAN);
        $tasks->where('completed', $isCompleted);
    }

    if ($request->has('search')) {
        $tasks->where('name', 'like', '%' . $request->search . '%');
    }

    return response()->json($tasks->get());
}

  
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $task = Task::create([
        'name' => $request->name,
        'completed' => $request->completed ?? false,
    ]);

    return response()->json($task, 201);
}

  
    public function show(Task $task)
    {
        return response()->json($task);
    }

    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'completed' => 'sometimes|boolean',
        ]);

        $task->update($request->only('name', 'completed'));

        return response()->json($task);
    }

    
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
