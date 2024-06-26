<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // Menerapkan trait HasFactory yang menyediakan metode-metode
    // untuk membuat instance model menggunakan factory.

    protected $fillable = ['nis', 'name', 'birth_date', 'jurusan_id'];
    // Properti $fillable digunakan untuk menentukan kolom mana saja
    // yang boleh diisi secara massal (mass assignable). Dalam hal ini,
    // hanya kolom 'nis', 'name', dan 'birth_date' yang dapat diisi/ubah.

    function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }
}
