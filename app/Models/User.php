<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLoggable;
    use HasRoles;

    protected $gaurd_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'role_id',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'dept_id',
        'desig_id',
        'vehicle_id',
        'fatherName',
        'cnic',
        'phone',
        'offEmail',
        'perEmail',
        'dob',
        'joindate',
        'currAddress',
        'perAddress',
        'lastDegree',
        'currDegree',
        'emgContactName',
        'emgContactRelation',
        'emgContactNumber',
        'last_seen',
        'gender',
        'employment_type',
        'marital_status',
        'blood_group',
        'documents_desc',
        'basic_salary',
        'security',
        'ph_cycle',
        'total_holiday',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
    	return $this->belongsTo(Role::class,'role_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class,'desig_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
    public function holiday(){

        return $this->hasOne(HolidayCycle::class, 'user_id' , 'id');
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withTimestamps();
    }
}
