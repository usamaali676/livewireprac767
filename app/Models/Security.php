<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\MonthlySecurity;
use App\Models\Years;

class Security extends Model
{
    protected $fillable = ['user_id', 'total_months', 'total', 'return_months' ,'paid' ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function years()
    {
        return $this->hasMany(Year::class);
    }

    public function monthly_security()
    {
        return $this->hasMany(MonthlySecurity::class,);
    }
}
