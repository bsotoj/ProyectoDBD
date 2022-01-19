<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero; 

class GeneroSeeder extends Seeder{
    public function run(){
        $generos = [
            [
            'nombreGenero' => 'Aventura',
            'delete' => FALSE,
        ],
        [
            'nombreGenero' => 'Estrategia',
            'delete' => FALSE,
        ],
        [
            'nombreGenero' => 'Casual',
            'delete' => FALSE,
        ],
        
    ];
        foreach($generos as $genero){
            Genero::create($genero);
        }
    }
}