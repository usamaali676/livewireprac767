<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Security;
use App\Models\MonthlySecurity;

class year extends Model
{
    protected $fillable = ['year'];
    use HasFactory;

    public function Security()
    {
        return $this->belongsTo(Security::class);
    }

    public function monthly_security()
    {
        return $this->hasMany(MonthlySecurity::class);
    }
}
