<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $guarded = array();
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
