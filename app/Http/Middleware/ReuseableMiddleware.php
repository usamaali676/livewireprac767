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

class ReuseableMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
        {
            $routeName = Route::currentRouteName();
            // dd($routeName);
            $user = auth()->user();

            $role = Role::where('id', $user->role_id)->first();
            // dd($routeNameMatches);
            if ($routeNameMatches = $this->matchRouteWithPermissionName($routeName)) {
                $perms = perm::where('role_id', $role->id)->where('name', $routeNameMatches['permissionName'])->first();
                // dd($perms);
                // $hasPermission = $perms->delete == 1;
                // dd($hasPermission);
                // dd($routeNameMatches['operation']);
                switch ($routeNameMatches['operation']) {
                    case "index":
                        $hasPermission = $perms->view == 1;
                        break;
                    case 'create':
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
                        // dd($hasPermission);
                        break;
                    default:
                        $hasPermission = false;
                        break;
                }

                // dd($hasPermission);
                if ($hasPermission) {
                    return $next($request);
                } else {
                    Alert::error('Opps',"You can't Perform this Operation");
                    return redirect()->route('home');
                }
            } else {
                return $next($request);
            }
        }

        private function matchRouteWithPermissionName($routeName)
        {
            // dd($routeName);
            $matches = [];

            preg_match('/^(?P<entity>[a-z]+)\.(?P<operation>index|view|create|edit|update|delete|conf-delete )$/i', $routeName, $matches);
            // dd($matches);
            if (count($matches) > 2) {
                // dd($matches);
                return [
                    'permissionName' => Str::title($matches['entity']),
                    'operation' => $matches['operation']
                ];
            }
            return false;
        }
}
