<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = ['user_id', 'amount', 'date', 'reason'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::Class, 'user_id');
    }
}
