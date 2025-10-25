<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    public const PAGINATE = 10;

    protected $table = 'posts';
}
