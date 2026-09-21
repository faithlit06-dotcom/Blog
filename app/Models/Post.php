<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //

    protected $fillable =[
        'user_id',
        'title',
        'author',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'title' => 'string',
            'author' => 'string',
            'content' => 'string',
        ];
    }
}
