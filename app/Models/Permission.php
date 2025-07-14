<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Permission extends Model
{
    use HasFactory;
    protected $gaurd_name = 'web';
}
