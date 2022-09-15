<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Noticias\NoticiasComentariosModel;
use App\Models\Noticias\NoticiasFotosModel;
use App\Models\Noticias\NoticiasModel;
use App\Models\Noticias\NoticiasTagsModel;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call( UserStatusSeeder::class,);

        \App\Models\User::factory(10)->create();
        
        $this->call([
            NoticiaStatusSeeder::class,
            RolesSeeder::class,
            NoticiaComentariosStatusSeeder::class,

        ]);
        NoticiasModel::factory(50)->create();
        NoticiasTagsModel::factory(150)->create();
        NoticiasComentariosModel::factory(200)->create();
        NoticiasFotosModel::factory(200)->create();
        
        
        
       
    }
}
