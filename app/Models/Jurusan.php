<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model 'Jurusan'
    protected $table = "jurusan";
}
