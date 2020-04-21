<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordsModel extends Model
{
    use SoftDeletes;
    protected $table = 'records';
    
    protected $fillable = [
        'dateRecord',
        'dateReturn',
        'bookid',
        'userid'
    ];

    protected $dates = ['deleted_at'];
}