<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Sales;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::findById(1);
        // $permission = Permission::findById(6);
        // $role->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'delete Comment']);
        // $user = User::find(1);
        // $user->givePermissionTo('edit Sheet');
        $users = User::all();
        $department = Department::all()->count();
        $designation = Designation::all()->count();
        $roles = Role::all()->count();
        $all_user = User::count();

        // $users_active = User::select('*')
        // ->whereNotNull('last_seen')
        // ->orderBy('last_seen','DESC')
        // ->paginate(10);
        return view('home', compact('roles', 'users', 'designation', 'department','all_user'));
    }
    public function profile()
    {
        $user = auth()->user();
        $logs = $user->authentications;
        // dd($logs);

        return view('profile', compact('user','logs'));

    }
}
