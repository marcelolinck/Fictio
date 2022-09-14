<?php

namespace Database\Seeders;

use App\Models\Noticias\NoticiasComentariosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiaComentariosSeeder extends Seeder
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
        NoticiasComentariosModel::insert($data);
    }
}
