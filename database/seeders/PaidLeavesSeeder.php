<?php

namespace Database\Seeders;

use App\Models\PaidLeaves;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaidLeavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        foreach($user as $item)
        {
            // $pl = PaidLeaves::where('user_id', $item->id)->get();
            // if($pl == NULL){
                PaidLeaves::updateOrCreate([
                    'user_id' => $item->id,
                    'preplan' => '6',
                    'emergency' => '6',
                    'created_at' => Carbon::now()
                ]);
            // }
        }
    }
}
