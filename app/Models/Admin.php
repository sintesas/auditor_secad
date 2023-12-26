<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // notifications 
    use Notifiable;
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     * Restrain from entering access level info in fillable as mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'job_title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
