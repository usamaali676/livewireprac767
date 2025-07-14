<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\year;

class MonthlyHoliday extends Model
{
    use HasFactory;
    protected $fillable = ['holiday_cycle_id', 'year_id', 'month', 'holidays'];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
