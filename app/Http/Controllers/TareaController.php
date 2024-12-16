<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    // Listar todas las tareas con filtros opcionales
    public function index(Request $request)
    {
        $tareas = Tarea::query();

        if ($request->has('completada')) {
            $tareas->where('completada', $request->completada);
        }

        if ($request->has('buscar')) {
            $tareas->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        return response()->json($tareas->get());
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tarea = Tarea::create([
            'nombre' => $request->nombre,
            'completada' => $request->completada ?? false,
        ]);

        return response()->json($tarea, 201);
    }

    // Mostrar una tarea específica
    public function show(Tarea $tarea)
    {
        return response()->json($tarea);
    }

    // Actualizar una tarea existente
    public function update(Request $request, Tarea $tarea)
    {
        $tarea->update($request->only('nombre', 'completada'));

        return response()->json($tarea);
    }

    // Eliminar una tarea
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return response()->json(null, 204);
    }
}
