<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $tables = 'feedbacks';
    protected $fillable = [
        'pesan',
        'nama',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
