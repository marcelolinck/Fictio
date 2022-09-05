<?php

namespace Database\Seeders;

use App\Models\Noticias\NoticiasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [

            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(50),
                'noticia_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        NoticiasModel::insert($data);
    }
}
