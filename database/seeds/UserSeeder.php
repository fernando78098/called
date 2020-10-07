<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'	=> 'Administrador',
            'email'	=> 'admin@admin.com',
            'password'  => bcrypt('admin123admin'),
        ]);
    }
}
