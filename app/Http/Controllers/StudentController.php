<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar dari semua resource (student).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data dari model 'Student' dan menyimpannya dalam array $data dengan key 'students'
        $data['students'] = Student::all();
        
        // Mengarahkan tampilan ke file "resources/views/student/index.blade.php" dan meneruskan data $data['students' ke tampilan tersebut
        return view('student.index', $data);
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengarahkan tampilan ke file "resources/views/student/create.blade.php"
        return view('student.create');
    }

    /**
     * Menyimpan resource baru yang baru dibuat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mencatat informasi request dan pesan log bahwa proses insert data sedang berlangsung
        Log::debug($request);
        Log::info("ini proses insert data");

        // Membuat instance baru dari model 'Student'
        $student = new Student();
        // Mengisi properti 'name' dengan data dari input 'name' pada request
        $student->name = $request->name;
        // Mengisi properti 'nis' dengan data dari input 'nis' pada request
        $student->nis = $request->nis;
        // Mengisi properti 'birth_date' dengan data dari input 'birth_date' pada request
        $student->birth_date = $request->birth_date;
        // Menyimpan data student baru ke dalam database
        $student->save();

        // Mengarahkan kembali ke halaman 'student' dengan pesan sukses
        return redirect('student')->with('message', 'Berhasil Menambahkan Data');
    }

    /**
     * Menampilkan resource yang spesifik berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fungsi ini belum diimplementasikan
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mencari data student berdasarkan ID
        $student = Student::find($id);

        // Jika data student tidak ditemukan, kirim pesan ke Sentry dan tampilkan pesan kesalahan
        if ($student == null) {
            \Sentry::captureMessage('Student Dengan ID : ' . $id . ' Tidak Ditemukan');
            return 'Data Tidak Ditemukan';
        } else {
            // Jika data ditemukan, simpan dalam array $data dengan key 'student' dan arahkan tampilan ke file "resources/views/student/edit.blade.php"
            $data['student'] =  $student;
            return view('student.edit', $data);
        }
    }

    /**
     * Memperbarui resource yang spesifik dalam storage berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Mencari data student berdasarkan ID
        $student = Student::find($id);

        // Mengupdate data student dengan data dari request
        $student->update($request->all());

        // Mengarahkan kembali ke halaman 'student' dengan pesan sukses
        return redirect('student')->with('message', 'Berhasil Mengubah Data');
    }

    /**
     * Menghapus resource yang spesifik dari storage berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mencari data student berdasarkan ID
        $student = Student::find($id);

        // Menghapus data student
        $student->delete();

        // Mengarahkan kembali ke halaman 'student' dengan pesan sukses
        return redirect('student')->with('message', 'Berhasil Menghapus Data');
    }
}
