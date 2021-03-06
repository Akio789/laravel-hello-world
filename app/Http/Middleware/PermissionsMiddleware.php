<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('auth.register');
        }

        switch ($user->role) {
            case 'user':
                $hasPermission = $this->userPermissions($path);
                break;
            case 'admin':
                $hasPermission = $this->adminPermissions($path);
                break;
            case 'super':
                $hasPermission = $this->superPermissions($path);
                break;
            default:
                return abort(403);
                break;
        }

        if ($hasPermission) {
            return $next($request);
        }

        return abort(403);
    }

    public function userPermissions($path)
    {
        if ($path == 'app/dashboard') {
            return true;
        }
        return false;
    }

    public function adminPermissions($path)
    {
        if ($path == 'app/dashboard') {
            return true;
        }
        if ($path == 'app/users') {
            return true;
        }
        return false;
    }

    public function superPermissions($path)
    {
        if ($path == 'app/dashboard') {
            return true;
        }

        if (str_contains($path, 'app/users')) {
            return true;
        }
        return false;
    }
}
