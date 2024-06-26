<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk menambahkan kolom 'jurusan_id' pada tabel 'students'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Menambahkan kolom 'jurusan_id' dengan tipe integer pada tabel 'students'
            // dan memberikan nilai default 1.
            $table->integer('jurusan_id')->default(1);
        });
    }

    /**
     * Membalik (menghapus) perubahan migrasi, yaitu menghapus kolom 'jurusan_id' dari tabel 'students'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Menghapus kolom 'jurusan_id' dari tabel 'students'.
            $table->dropColumn('jurusan_id');
        });
    }
};
