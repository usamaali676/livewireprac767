<?php

namespace App\Http\Middleware;

use App\Models\perm;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Tests\TestCase;
use Illuminate\Support\Str;

class FinancePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public static function getLastRouteSegment($routeName)
    {
        $segments = explode('.', $routeName);
        return end($segments);
    }

    public function handle(Request $request, Closure $next)
    {
        $routeName = Route::currentRouteName();
        $segments = explode('.', $routeName);
        $route = end($segments);
        $user = auth()->user();
        $role = Role::where('id', $user->role_id)->first();
        $perms = perm::where('role_id', $role->id)->where('name', "finance")->first();
        // dd($perms->create);
        $operation = ['index', 'store', 'create', 'edit', 'conf-delete','update', 'delete', ];

        switch ($route) {
            case "index":
                $hasPermission = $perms->view == 1;
                break;
            case 'create':
                $hasPermission = $perms->create == 1;
                break;
            case 'getuser':
                $hasPermission = $perms->create == 1;
                break;
            case 'getsecurity':
                $hasPermission = $perms->create == 1;
                break;
            case 'store':
                $hasPermission = $perms->create == 1;
                break;
            case 'edit':
                $hasPermission = $perms->edit == 1;
                break;
            case 'update':
                $hasPermission = $perms->update == 1;
                break;
            case 'conf-delete':
                $hasPermission = $perms->delete == 1;
                break;
            case 'delete':
                $hasPermission = $perms->delete == 1;
                break;
            case 'detail':
                $hasPermission = $perms->view == 1;
                break;
            default:
                $hasPermission = false;
                break;
        }

        if ($hasPermission) {
            return $next($request);
        } else {
            Alert::error('Opps',"You can't Perform this Operation");
            return redirect()->route('home');
        }
    }
}
