<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. 
| Rute ini dimuat oleh RouteServiceProvider dalam grup yang 
| mengandung middleware "web". Sekarang buat sesuatu yang hebat!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Pada kode di atas, jika domain "example.com/" diakses,
// secara otomatis halaman dialihkan ke folder "resources/views/"
// kemudian membuka file "welcome.blade.php"

//<--------------Start Student Section-------------->
use App\Http\Controllers\StudentController;
// Untuk setiap logika yang berkaitan dengan 'Student',
// kode di atas akan mengakses folder "app/Http/Controllers/"
// kemudian menggunakan StudentController

Route::get('/student', [StudentController::class, 'index']);
// Pada kode di atas, jika domain "example.com/student" diakses,
// secara otomatis halaman akan membuka file StudentController
// kemudian melakukan pengecekan pada metode 'index'

Route::get('/student/create', [StudentController::class, 'create']);
// Jika domain "example.com/student/create" diakses,
// secara otomatis halaman akan membuka file StudentController
// kemudian melakukan pengecekan pada metode 'create'

Route::post('/student', [StudentController::class, 'store']);
// Jika terdapat data POST pada domain "example.com/student",
// secara otomatis halaman akan membuka file StudentController
// kemudian melakukan pengecekan pada metode 'store'

Route::get('/student/{id}/edit', [StudentController::class, 'edit']);
// Jika domain "example.com/student/{id}/edit" diakses,
// secara otomatis halaman akan membuka file StudentController
// kemudian melakukan pengecekan pada metode 'edit'

Route::put('/student/{id}', [StudentController::class, 'update']);
// Jika terdapat perintah PUT pada domain "example.com/student/{id}",
// secara otomatis halaman akan membuka file StudentController
// kemudian melakukan pengecekan pada metode 'update'

Route::delete('/student/{id}', [StudentController::class, 'destroy']);
// Jika terdapat perintah DELETE pada domain "example.com/student/{id}",
// secara otomatis halaman akan membuka file StudentController
// kemudian melakukan pengecekan pada metode 'destroy'
