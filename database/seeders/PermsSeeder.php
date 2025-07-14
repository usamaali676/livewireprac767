<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perm;
use App\Helpers\GlobalHelper;
use App\Models\Role;

class PermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::all();
        $routeCollection = GlobalHelper::Permissions();
        // $routeCollection = ['holiday'];
        foreach($routeCollection as $route){
            foreach($role as $item){
            if($item->id == 1){
                Perm::firstOrCreate([
                    'name' => $route,
                    'role_id' => $item->id,
                    'create' => 1,
                    'view' => 1,
                    'edit' => 1,
                    'update' => 1,
                    'delete' => 1,
                ]);

            }
            else{
                Perm::firstOrCreate([
                    'name' => $route,
                    'role_id' => $item->id,
                    'create' => 0,
                    'view' => 0,
                    'edit' => 0,
                    'update' => 0,
                    'delete' => 0,
                ]);
            }
            }
        }
    }
}
