<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Serie;

class Series extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Serie();
        $role->nombre = '3ª Serie';
        $role->save();
        
        $role = new Serie();
        $role->nombre = '2ª Serie';
        $role->save();

        $role = new Serie();
        $role->nombre = 'Serie Senior';
        $role->save();
        
        $role = new Serie();
        $role->nombre = '1ª Serie';
        $role->save();
        
    }
}
