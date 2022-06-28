<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'materi',
        'tugas',
    ];
}
