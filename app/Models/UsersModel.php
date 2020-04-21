<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersModel extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'type',
        'DNI',
        'image'
        
    ];

    protected $dates = ['deleted_at'];
}