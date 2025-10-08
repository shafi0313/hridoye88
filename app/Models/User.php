<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'type',
    //     'phone',
    //     'profession',
    //     'permission',
    //     'address',
    //     'image',
    //     'remember_token',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['ordered_at', 'created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('d/m/Y');
    }

    // accessPermission relationship removed - no longer using spatie/laravel-permission

    public function employee()
    {
        return $this->belongsTo(EmployeeInfo::class);
    }

    public function designation()
    {
        return $this->belongsTo(Profession::class, 'profession', 'id');
    }
}
