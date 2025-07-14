<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sales;
use App\Models\User;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['sales_id', 'reporting_date', 'landingpage_date', 'start_date', 'last_date' ];
   /**
         * Get the user that owns the Client
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function sale()
        {
            return $this->belongsTo(Sales::class, 'sales_id');
        }
        public function services()
        {
            return $this->belongsToMany(Service::class)->withTimestamps();
        }
        public function users()
        {
            return $this->belongsToMany(User::class)->withTimestamps();
        }
        public function tasks()
        {
            return $this->hasMany(Task::class);
        }
        public function reports()
        {
            return $this->hasMany(Report::class);
        }
}
