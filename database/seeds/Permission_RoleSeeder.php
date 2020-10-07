<?php

use Illuminate\Database\Seeder;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\Permission;

class Permission_RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        for ($i=0; $i < (count($roles)); $i++) { 
            $id_role = $roles[$i]->id;
            if($id_role == 1){
                for ($s=0; $s < (count($permissions)); $s++) {
                    $id_permission = $permissions[$s]->id;
                    PermissionRole::create([
                        'permission_id' => $id_permission,
                        'role_id'		=> $id_role,
                    ]);                   
                }
            };
            if($id_role == 2){
                for ($s=0; $s < (count($permissions)); $s++) {
                    $id_permission = $permissions[$s]->id;
                    if($id_permission == 5){
                        PermissionRole::create([
                            'permission_id'	=> $id_permission,
                            'role_id'		=> $id_role,
                        ]);
                    }                   
                }
            };
            if($id_role == 3){
                for ($s=0; $s < (count($permissions)); $s++) {
                    $id_permission = $permissions[$s]->id;
                    if($id_permission != 5 && $id_permission != 6){
                        PermissionRole::create([
                            'permission_id'	=> $id_permission,
                            'role_id'		=> $id_role,
                        ]);
                    }                   
                }
            };
        }
    }
}
