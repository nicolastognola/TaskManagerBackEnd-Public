<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Listar todas las tareas con filtros opcionales.
     */
    public function index(Request $request)
    {
        $tasks = Task::query();

        // Filtrar por completadas si se pasa el parámetro "completed"
        if ($request->has('completed')) {
            $tasks->where('completed', $request->completed);
        }

        // Buscar por nombre si se pasa el parámetro "search"
        if ($request->has('search')) {
            $tasks->where('name', 'like', '%' . $request->search . '%');
        }

        // Devolver todas las tareas en formato JSON
        return response()->json($tasks->get());
    }

    /**
     * Crear una nueva tarea.
     */
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

    /**
     * Mostrar una tarea específica.
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Actualizar una tarea existente.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'completed' => 'sometimes|boolean',
        ]);

        $task->update($request->only('name', 'completed'));

        return response()->json($task);
    }

    /**
     * Eliminar una tarea.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
