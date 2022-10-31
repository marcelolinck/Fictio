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
                'corStatus' => 'bg-light-warning'

            ],
            [
                'descricao' => 'Aprovado',
                'corStatus' => 'bg-light-success'

            ],
            [
                'descricao' => 'Reprovado',
                'corStatus' => 'bg-light-danger'

            ],
           

        ];
        NoticiasComentariosStatusModel::insert($data);
    }
}
