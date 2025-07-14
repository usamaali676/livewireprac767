<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role_id',
        'create',
        'view',
        'edit',
        'update',
        'delete',
    ];
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
