@extends('template')

@section('content')
<main class="container" style="margin-top: 30px">
    <form action="/student/{{$student->id}}" method="POST">
        <!--
            Data dari form akan dikirim ke URL "example.com/student/id".
            Pada file "routes/web.php", URL tersebut akan diperiksa dan 
            dialihkan ke metode update di StudentController.
        -->
        
        <input type="hidden" name="_method" value="PUT">
        <!--
            Input hidden digunakan untuk mengirimkan metode HTTP PUT
            karena form HTML hanya mendukung GET dan POST. 
            Dengan ini, kita bisa mengarahkan ke rute yang mengharuskan metode PUT.
        -->
        
        @csrf
        <!--
            Token CSRF disertakan dalam form untuk melindungi aplikasi 
            dari serangan Cross-Site Request Forgery (CSRF).
        -->
        
        <div class="p-5 rounded">
            <h1>Edit Siswa</h1>
            <hr>
            <table class="table table-bordered">
                <tr>
                    <td>NIS</td>
                    <td>
                        <!--
                            Input untuk NIS (Nomor Induk Siswa) dengan nilai awal dari $student->nis.
                        -->
                        <input type="text" name="nis" value="{{$student->nis}}" placeholder="NIS" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <!--
                            Input untuk Nama Siswa dengan nilai awal dari $student->name.
                        -->
                        <input type="text" name="name" value="{{$student->name}}" placeholder="nama" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>
                        <!--
                            Input untuk Tanggal Lahir Siswa dengan nilai awal dari $student->birth_date.
                        -->
                        <input type="date" name="birth_date" value="{{$student->birth_date}}" placeholder="Tanggal Lahir" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <!--
                            Tombol untuk menyimpan perubahan dan tombol untuk kembali ke halaman daftar siswa.
                        -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="/student">Kembali</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</main>
@endsection
