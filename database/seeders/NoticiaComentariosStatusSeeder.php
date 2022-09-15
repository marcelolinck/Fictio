<?php

namespace Database\Seeders;

use App\Models\Noticias\NoticiasComentariosStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiaComentariosStatusSeeder extends Seeder
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
                'descricao' => 'Em análise',

            ],
            [
                'descricao' => 'Aprovado',

            ],
            [
                'descricao' => 'Reprovado',

            ],
           

        ];
        NoticiasComentariosStatusModel::insert($data);
    }
}
