<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'genre',
        'year_published',
    ];

    protected function casts(): array
    {
        return [
            'year_published' => 'integer',
        ];
    }
}
