<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manage extends Model
{
    use HasFactory;
    protected $tables = 'manages';
    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'author',
        'keterangan',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
