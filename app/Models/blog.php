<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $tables = 'blogs';
    protected $fillable = [
        'slug',
        'title',
        'visitor',
        'author',
        'artikel',
        'foto',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
