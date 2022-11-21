<?php

namespace Database\Seeders;

use App\Models\Permissions\PermissionsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //PERMISSOES PARA LISTAR TODAS AS PERMISSOES
            [
                'name' => 'permission_insert',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'permission_view',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'permission_edit',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'permission_delete',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],

            //PERMISSOES DE GRUPOS
            [
                'name' => 'group_insert',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'group_view',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'group_edit',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'group_delete',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],

            [
                'name' => 'user_insert',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'user_view',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'user_edit',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'user_delete',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
           
            //PERMISSOES PARA LISTAR TODAS AS PERMISSOES
            [
                'name' => 'noticias_insert',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'noticias_view',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'noticias_edit',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'noticias_delete',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            //PERMISSOES PARA ACESSO AS TAGS
            [
                'name' => 'tags_insert',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'tags_view',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'tags_edit',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name' => 'tags_delete',
                'guard_name' => 'web',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],

        ];
        PermissionsModel::insert($data);
    }
}
