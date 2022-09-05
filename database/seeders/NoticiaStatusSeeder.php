<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Noticias\NoticiasStatusModel;

class NoticiaStatusSeeder extends Seeder
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
                'descricao' => 'Publicado',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'descricao' => 'Não Publicado',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
           

        ];
        NoticiasStatusModel::insert($data);
    }
}
