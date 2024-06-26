@extends('template')
@section('content')
<main class="container" style="margin-top: 30px">
    <form action="/student" method="POST">
        <!--
            Data dari form akan dikirim ke endpoint "/student".
            Di dalam file "routes/web.php", endpoint tersebut akan
            diperiksa dan dialihkan ke metode yang sesuai di StudentController.
        -->
        @csrf
        <!--
            CSRF: Menyertakan token CSRF dalam form 
            untuk melindungi aplikasi dari serangan CSRF.
        -->
        <div class="p-5 rounded">
            <h1>Tambah Siswa</h1>
            <a class="btn btn-primary" href="/student/create">Tambah Siswa Baru</a>
            <!--
                Link untuk menambahkan siswa baru. 
                Akan mengarahkan ke halaman form pembuatan siswa baru.
            -->
            <hr>
            <table class="table table-bordered">
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="nis" placeholder="NIS" class="form-control"></td>
                    <!-- Input untuk NIS siswa -->
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="name" placeholder="Nama" class="form-control"></td>
                    <!-- Input untuk nama siswa -->
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>
                        <select name="jurusan_id" class="form-control">
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                <!-- Opsi untuk memilih jurusan siswa -->
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="birth_date" placeholder="Tanggal Lahir" class="form-control"></td>
                    <!-- Input untuk tanggal lahir siswa -->
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <!-- Tombol untuk submit form -->
                        <a class="btn btn-danger" href="/student">Kembali</a>
                        <!-- Link untuk kembali ke halaman daftar siswa -->
                    </td>
                </tr>
            </table>
        </div>
    </form>
</main>
@endsection
