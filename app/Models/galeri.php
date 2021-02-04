<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    use HasFactory;
    protected $tables = 'galeris';
    protected $fillable = [
        'kegiatan',
        'gambar',
        'link',
        'slug',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
