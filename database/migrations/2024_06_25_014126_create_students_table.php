<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel baru bernama 'students'
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // Membuat kolom 'id' sebagai primary key dan auto-increment
            
            $table->string('nis', 5);
            // Membuat kolom 'nis' bertipe string dengan panjang maksimal 5 karakter
            
            $table->string('name', 25);
            // Membuat kolom 'name' bertipe string dengan panjang maksimal 25 karakter
            
            $table->date('birth_date');
            // Membuat kolom 'birth_date' bertipe date untuk menyimpan tanggal lahir
            
            // $table->integer('umur');
            // Kolom 'umur' bertipe integer, dikomentari karena tidak digunakan
            
            // $table->boolean('is_active');
            // Kolom 'is_active' bertipe boolean, dikomentari karena tidak digunakan
            
            // $table->text('profile');
            // Kolom 'profile' bertipe text, dikomentari karena tidak digunakan
            
            $table->timestamps();
            // Membuat kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Mengembalikan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'students' jika tabel tersebut ada
        Schema::dropIfExists('students');
    }
};
