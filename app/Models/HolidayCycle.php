<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MonthlyHoliday;

class HolidayCycle extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','year', 'total', 'remaining'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function monthly_holiday(){
        return $this->hasMany(MonthlyHoliday::class);
    }
    public function year()
    {
        return $this->hasMany(Year::class);
    }
}
