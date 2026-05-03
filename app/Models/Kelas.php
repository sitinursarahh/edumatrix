<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'classes'; // 🔥 WAJIB TAMBAH INI

    protected $fillable = ['name'];
}