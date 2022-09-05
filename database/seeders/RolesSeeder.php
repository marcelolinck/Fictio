<?php

namespace Database\Seeders;

use App\Models\Config\RolesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
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
                'name' => 'Administrador',
                'guard_name' =>'',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'Convidado',
                'guard_name' =>'',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
           

        ];
        RolesModel::insert($data);   
    }
}
