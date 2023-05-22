<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;

class Clubs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $club = new Club;
        $club->nombre = 'C. D. Juventud Estrella';
        $club->nombrecorto = 'C. D. J. Estrella';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Bandera de Chile';
        $club->nombrecorto = 'C. D. B. de Chile';
        $club->save();

        $club = new Club;
        $club->nombre = 'Juventud Chillehue';
        $club->nombrecorto = 'J. Chillehue';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Concha Garmendia';
        $club->nombrecorto = 'C. D. C. Garmendia';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Juventud Alianza';
        $club->nombrecorto = 'C. D. J. Alianza';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Atlético Coinco';
        $club->nombrecorto = 'C. D. Atl. Coinco';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Luis Valenzuela';
        $club->nombrecorto = 'C. D. L. Valenzuela';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Cachantun';
        $club->nombrecorto = 'C. D. Cachantun';
        $club->save();

        $club = new Club;
        $club->nombre = 'C. D. Copequen';
        $club->nombrecorto = 'C. D. Copequen';
        $club->save();

	
    }
}
