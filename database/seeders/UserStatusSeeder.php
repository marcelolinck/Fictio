<?php

namespace Database\Seeders;

use App\Models\Config\UserStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
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
                'descricao' => 'Ativo',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'descricao' => 'Inativo',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
           

        ];
        UserStatusModel::insert($data);
    }
}
