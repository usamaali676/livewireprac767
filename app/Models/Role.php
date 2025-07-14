<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\perm;


class Role extends Model
{
    use HasFactory;
    protected $gaurd_name = 'web';
    protected $fillable = [
        'name', 'guard_name	'
    ];

    public function users()
    {
    	return $this->hasOne('User');
    }
    public function perm()
    {
        return $this->belongsTo(perm::class,'role_id');
    }

}
