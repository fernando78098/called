<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Support\Facades\Request;
use App\Models\Permission;
use App\User;

class Permissions
{
    public function handle($request, Closure $next)
    {
        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {            
            Gate::define($permission->name, function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
        return $next($request);
    }
}
