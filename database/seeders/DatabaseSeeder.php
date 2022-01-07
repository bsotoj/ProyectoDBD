<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Permiso::factory(10)->create();
    }
}
