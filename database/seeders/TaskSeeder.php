<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            // Crear tareas de ejemplo
            Task::create(['name' => 'Comprar comida', 'completed' => false]);
            Task::create(['name' => 'Aprender Laravel', 'completed' => true]);
            Task::create(['name' => 'Hacer ejercicio', 'completed' => false]);
            Task::create(['name' => 'Leer un libro', 'completed' => true]);
            Task::create(['name' => 'Organizar escritorio', 'completed' => false]);
        }
    }
}

