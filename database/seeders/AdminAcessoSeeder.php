<?php

namespace Database\Seeders;

use App\Models\Config\UserRoleModel;
use App\Models\Permissions\PermissionsModel;
use App\Models\RolesPermissionsModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminAcessoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = [
            [
                'name' => 'Administrador',
                'email' => 'admin@fictio.com.br',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'status_id' => '1',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),

            ],
           
        ];
        User::insert($userAdmin);
        
        $roleAdmin = [
            [
                'role_id' => '1',
                'model_type' => 'web',
                'model_id' => '1'

            ],
        ];
        UserRoleModel::insert($roleAdmin);
       
        $permissions = PermissionsModel::get();
        foreach($permissions as $permission){
            $permissionAdmin = [
                [
                    'role_id' => '1',
                    'permission_id' => $permission->id,
    
                ],
            ];
            RolesPermissionsModel::insert($permissionAdmin);
        }
        


    }
}
