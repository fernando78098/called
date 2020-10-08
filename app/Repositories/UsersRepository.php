<?php

namespace App\Repositories;

use App\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;

class UsersRepository{

    public function user()
    {
        $model = new User();
        return $model;
    }

    public function getUser()
    {
        $list = self::user()->with(['roles'])->get();
        return $list;
    }

    public function storeUser( array $data )
    {        
        $User = self::user()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $roles = RoleUser::create([
            'role_id' => $data['role_id'],
            'user_id' => $User->id,
        ]);
        return true;
    }

    public function editUser( int $id )
    {        
       return self::user()->with(['roles'])->find($id);
    }

    public function updateUser( array $data)
    {
        $user = self::user()->find($data['id']);
        
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $roles = RoleUser::where('user_id', $data['id']);
        $roles->update([
            'role_id' => $data['role_id'],
            'user_id' => $data['id'],            
        ]);
        return true;        
    }

    public function destroyUser( int $id)
    {
        $roles = RoleUser::where('user_id', $id)->delete(); 
        $user = self::user()->find($id)->delete();
        return true;
    }
}