<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salry extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::Class, 'user_id');
    }

    protected $fillable = [
        'user_id',
        'date',
        'tracker_id',
        'basic_salary',
        'm_commission_usd',
        'm_commission_pkr',
        // 'dev_commission_usd',
        // 'dev_commission_pkr',
        'total_commission',
        'bonus',
        'advance_deduct',
        'unpaid_days',
        'half_days',
        'holiday_deduct',
        'half_day_deduct',
        'fine_deduct',
        // 'food_deduct',
        'comments',
        'security_deduct',
        'working_days',
        'total_salary',
        'year',
        'salary_month',
        'cleared_months',
        'security_clearance',
        'holiday_compen',
    ];
}
