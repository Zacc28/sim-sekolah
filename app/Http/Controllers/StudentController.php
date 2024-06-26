<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Http;
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
        // Mengambil semua data dari model 'Student' beserta relasinya dengan 'Jurusan' dan menyimpannya dalam array $data dengan key 'students'
        $data['students'] = Student::with('jurusan')->get();

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
        // Mengambil semua data dari model 'Jurusan' dan menyimpannya dalam array $data dengan key 'jurusan'
        $data['jurusan'] = Jurusan::all();

        // Mengarahkan tampilan ke file "resources/views/student/create.blade.php"
        return view('student.create', $data);
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

        // Mengirim pesan melalui API dengan menggunakan header authorization dan data dari request
        $response = Http::withHeaders([
            'Authorization' => 'rq7MMQZz4WU+23xnWnDy'
        ])->asForm()->post('https://api.fonnte.com/send', [
            'target' => '6281287164881',
            'message' => 'Halo ' . $request->name . ', saya dari SPX Express.\n\n' .
                         'Saya sedang dalam perjalanan untuk mengirimkan paket Shopee: 240623QW1FE7B0, nomor resi SPXID 0123456789 ke lokasi Anda.\n' .
                         'Tolong pastikan alamat sudah benar, ada penerima di lokasi pengiriman, dan siapkan uang sejumlah 25.396 IDR untuk paket COD yang dipesan. Terima kasih!',
        ]);

        // Membuat instance baru dari model 'Student'
        $student = new Student();
        // Mengisi properti 'name' dengan data dari input 'name' pada request
        $student->name = $request->name;
        // Mengisi properti 'nis' dengan data dari input 'nis' pada request
        $student->nis = $request->nis;
        // Mengisi properti 'jurusan_id' dengan data dari input 'jurusan_id' pada request
        $student->jurusan_id = $request->jurusan_id;
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
            $data['student'] = $student;
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
