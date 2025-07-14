<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_name',
        'closer_name',
        'business_name',
        'business_name_adv',
        'business_number',
        'business_number_adv',
        'cellphone',
        'email',
        'website',
        'additional_links',
        'comments',
        'area',
        'date',
        'services',
        'keywords',
        'landing_pages',
        'status',
        'payment_methods',
        'agent_id',
        'closer_id',


    ];
    public function comment()
    {
    	return $this->hasMany(Comment::class, 'sales_id', 'id');
    }
    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
    public function closer()
    {
        return $this->belongsTo(User::class,'closer_id');
    }
}
