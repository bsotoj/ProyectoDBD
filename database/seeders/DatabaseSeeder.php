<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Wallet;
use App\Models\WishList;
use App\Models\Course;
use App\Models\Group;
use App\Models\Geozone;
use App\Models\Rol;
use App\Models\Rol_Usuario;

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
        WishList::factory(10)->create();
        Geozone::factory(10)->create();
        Rol::factory(10)->create();
        Usuario::factory(10)->create();
        Rol_Usuario::factory(10)->create();
        
        
      
    }
}
