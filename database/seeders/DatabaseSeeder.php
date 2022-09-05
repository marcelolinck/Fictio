<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

//use App\Models\Noticias\NoticiasModel;
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
        $this->call([
            UserStatusSeeder::class,
            NoticiaStatusSeeder::class,
            RolesSeeder::class,
            NoticiasSeeder::class,

    ]);
        
        \App\Models\User::factory(10)->create();
       // NoticiasModel::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
