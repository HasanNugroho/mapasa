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
        'nama_event',
        'slug',
        'deskripsi',
        'author',
        'tempat',
        'kegiatan',
        'jam',
        'tanggal',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        // 'jam',
        // 'tanggal',
    ];
}
