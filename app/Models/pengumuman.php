<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    use HasFactory;
    protected $tables = 'pengumumans';
    protected $fillable = [
        'pengumuman',
        'author',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
