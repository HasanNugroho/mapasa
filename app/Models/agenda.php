<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;
    protected $tables = 'agendas';
    protected $fillable = [
        'kegiatan',
        'jam',
        'tempat',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'tanggal',
    ];
}
