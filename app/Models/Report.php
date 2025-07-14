<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'type', 'title', 'description', 'file_path', 'month', 'status', 'reject_note'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
