<?php

use Illuminate\Database\Seeder;
use App\Models\RoleUser;
use App\Models\Role;
use App\User;

class Role_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $roles = Role::all();
        for ($i=0; $i < (count($users)); $i++) { 
            if($users[$i]->name == 'Administrador'){
                for ($s=0; $s < (count($roles)); $s++) {
                    if($roles[$s]->name == 'Administrador'){
                        RoleUser::create([
                            'role_id' => $roles[$s]->id,
                            'user_id' => $users[$i]->id,                    
                        ]);
                    };
                };
            };
        };
    }
}
