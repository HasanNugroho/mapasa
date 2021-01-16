<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $tables = 'events';
    protected $fillable = [
        'pamflet',
        'event',
        'slug',
        'deskripsi',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
