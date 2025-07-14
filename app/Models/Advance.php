<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $fillable = ['user_id', 'amount', 'date', 'description'];
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
