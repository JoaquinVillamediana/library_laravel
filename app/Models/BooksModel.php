<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BooksModel extends Model
{
    use SoftDeletes;
    protected $table = 'books';
    
    protected $fillable = [
        'name',
        'author',
        'date',
        'publisher',
        'image'
    ];

    protected $dates = ['deleted_at'];
}