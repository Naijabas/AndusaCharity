<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
use App\User\Excemptions\UnauthenticatedException;
use App\User\Excemptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $guard = auth('api')->check() ? 'api' : '';

        throw_if(!auth($guard)->check(), UnauthenticatedException::notLoggedIn());

        $action = $request->route()->getActionname();
        $name = $request->route()->getActionname();

        $role_id = auth($guard)->user()->role_id;

        $permission = User::where(function ($query)use ($action, $name){
            $query->where('name', $name);
            $query->orWhere('action', $action);
        })->whereHas('roles', function ($query) use($role_id){
            $query->where('id',$role_id);
        })->first();

        throw_if(is_null($permission), UnauthorizedException::noPermission());

        return $next($request);
    }

    }

