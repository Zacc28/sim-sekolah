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
    // hanya kolom 'nis', 'name', 'birth_date', dan 'jurusan_id' yang dapat diisi/ubah.

    public function jurusan()
    {
        // Mendefinisikan relasi "belongsTo" antara model 'Student' dan 'Jurusan'.
        // Setiap student terkait dengan satu jurusan.
        return $this->belongsTo(Jurusan::class);
    }
}
