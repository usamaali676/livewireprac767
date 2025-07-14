<?php

namespace Database\Seeders;

use App\Models\HolidayCycle;
use Illuminate\Database\Seeder;
use App\Models\perm;
use App\Models\Security;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $month = Carbon::now()->format('M');
        $user = User::find('1');
        Security::firstOrcreate([
            'user_id' => $user->id,
            'total' => '0',
            'total_months' => '0',
            'return_months' => $month,
            'paid' => '0',
        ]);

        HolidayCycle::firstOrcreate([
            'user_id' => $user->id,
            'year' => Carbon::now()->format('Y'),
            'total' => '12',
            'remaining' => '12',
            'created_at' => Carbon::now()
        ]);
    }
}
