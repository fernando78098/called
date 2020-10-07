<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name'  => 'view_called',
            'label'	=> 'Visualizar Chamado',
        ]);
        $permission = Permission::create([
            'name'	=> 'edit_called',
            'label'	=> 'Editar Chamado',
        ]);
        $permission = Permission::create([
            'name'	=> 'delete_called',
            'label'	=> 'Excluir Chamado',
        ]);
        $permission = Permission::create([
            'name'	=> 'end_called',
            'label' => 'Finalizar Chamado',
        ]);
        $permission = Permission::create([
            'name'	=> 'create_called',
            'label'	=> 'Criar Chamado',
        ]);
        $permission = Permission::create([
            'name'	=> 'setting',
            'label'	=> 'Configuração do Sistema',
        ]);
    }
}
