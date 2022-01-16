<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region; 

class RegionSeeder extends Seeder{
    public function run(){
        $regiones = [[
            'nombreRegion' => 'Tarapacá',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Antofagasta',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Coquimbo',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Valparaíso',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'OHiggins',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Maule',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Bío Bío',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Araucanía',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Los lagos',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Aysen',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Magallanes y Antártica Chilena',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Metropolitana',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Arica y Parinacota',
            'idPais' => 1,
            'delete' => FALSE,
        ],
        [
            'nombreRegion' => 'Ñuble',
            'idPais' => 1,
            'delete' => FALSE,
        ],
    ];
        foreach($regiones as $region){
            Region::create($region);
        }
    }
}