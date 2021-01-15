<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;
    protected $tables = 'kegiatans';
    protected $fillable = [
        'kegiatan',
        'keterangan',
        'foto_utama',
        'foto',
        'jam',
        'tanggal',
        'slug',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'tanggal',
    ];
}
