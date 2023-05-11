<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'dirigente';
        $role->descripcion = 'Dirigente Deportivo';
        $role->save();  
        
        $role = new Role();
        $role->name = 'admin';
        $role->descripcion = 'Usuario Administrador';
        $role->save();

        $role = new Role();
        $role->name = 'jugador';
        $role->descripcion = 'Usuario Jugador';
        $role->save();
    }
}
