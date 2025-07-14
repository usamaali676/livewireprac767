<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sales;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_id',
        'text',
        'date'
    ];
    // public function comment()
    // {
    //     return $this->belongsTo(Sales::class, 'id');
    // }
}
