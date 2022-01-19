<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;
use App\Models\Cartera;
use App\Models\Amigo;
use App\Models\Pais;
use App\Models\Region;
use App\Models\RegionJuego;
use App\Models\Like;
use App\Models\Publicacion;
use App\Models\Comentario;
use App\Models\Venta;
use App\Models\ListaDeseo;
use App\Models\UsuarioRol;
use App\Models\Rol;
use App\Models\RolPermiso;
use App\Models\ListaDeseosJuegos;
use App\Models\Comunidad;
use App\Models\VentaJuego;
use App\Models\ComunidadUsuario;
use App\Models\LogroJuego;
use App\Models\Logro;
use App\Models\Genero;
use App\Models\Juego;
use App\Models\Biblioteca;
use App\Models\Usuario;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
       Cartera::factory(10)->create();
       Genero::factory(10)->create();
       Logro::factory(10)->create();
       ListaDeseo::factory(10)->create();
       Pais::factory(10)->create();

       
       $this->call(RolSeeder::class);
       Permiso::factory(10)->create();
       RolPermiso::factory(10)->create();


      
        $this->call(RegionSeeder::class);
       Usuario::factory(10)->create();
       Venta::factory(10)->create();
       UsuarioRol::factory(10)->create();
       Juego::factory(10)->create();
       ListaDeseosJuegos::factory(10)->create();
       VentaJuego::factory(10)->create();
       Comunidad::factory(10)->create();
       Publicacion::factory(10)->create();
       ComunidadUsuario::factory(10)->create();
       Like::factory(10)->create();
       RegionJuego::factory(10)->create();
       LogroJuego::factory(10)->create();
       Biblioteca::factory(10)->create();
       Comentario::factory(10)->create();
       Amigo::factory(10)->create();
       

    }
}
