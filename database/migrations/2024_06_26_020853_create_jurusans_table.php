<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'jurusan'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            // Membuat tabel 'jurusan' dengan kolom id, nama_jurusan, dan timestamps.
            $table->id();
            // Membuat kolom 'id' yang otomatis meningkat (auto increment) sebagai primary key.
            $table->string('nama_jurusan');
            // Membuat kolom 'nama_jurusan' dengan tipe data string.
            $table->timestamps();
            // Membuat kolom 'created_at' dan 'updated_at' yang otomatis diisi oleh Laravel.
        });
    }

    /**
     * Membalik (menghapus) migrasi, yaitu menghapus tabel 'jurusan'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
        // Menghapus tabel 'jurusan' jika ada.
    }
};
