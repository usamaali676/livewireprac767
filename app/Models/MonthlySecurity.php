<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Years;
use App\Models\Security;

class MonthlySecurity extends Model
{
    protected $fillable = ['security_id', 'year_id', 'month', 'amount','cleared' ];
    use HasFactory;
    public function Security()
    {
        return $this->belongsTo(Security::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
