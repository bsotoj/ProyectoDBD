<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Wallet;
use App\Models\Course;
use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Wallet::factory(10)->create();
        Usuario::factory(10)->create();
        
      
    }
}
