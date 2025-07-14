<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use App\Models\HolidayCycle;
use App\Models\Year;
use App\Models\MonthlyHoliday;

class HolidaysSeeder extends Seeder
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
            $holiday = HolidayCycle::where('user_id', $item->id)->first();
            // dd($holiday->id);
            $year = Year::where('year', $holiday->year)->first();
            $month = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
            foreach($month as $list){
            MonthlyHoliday::firstorcreate([
                'holiday_cycle_id' => $holiday->id,
                'year_id' => $year->id,
                'month' => $list,
                'holidays' => 1,
            ]);
        }

                // HolidayCycle::updateOrCreate([
                //     'user_id' => $item->id,
                //     'total' => $item->total_holiday,
                //     'remaining' => $item->total_holiday,
                //     'created_at' => Carbon::now()
                // ]);

        }
    }
}
