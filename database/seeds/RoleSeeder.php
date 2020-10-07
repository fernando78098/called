<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'	=> 'Administrador',
            'label'	=> 'Administrador do Sistema',
        ]);
        $role = Role::create([
            'name'	=> 'Cliente',
            'label'	=> 'Usuario Cliente',
        ]);
        $role = Role::create([
            'name'	=> 'Fornecedor',
            'label'	=> 'Usuario Fornecedor',
        ]);
    }
}
