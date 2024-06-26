@extends('template')

@section('content')
<main class="container">
    <div class="p-5 rounded">
        <h1>Daftar Siswa</h1>
        <a class="btn btn-primary" href="/student/create">Tambah Siswa Baru</a>
        <hr>

        @if(session('message') != '')
        <!-- 
            Kode ini digunakan untuk menampilkan pesan alert jika ada
            pesan yang disimpan dalam session. Pesan ini biasanya 
            berasal dari perintah di Controller.
        -->
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nomor</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th colspan="2" width="40">Action</th>
            </tr>
            @foreach($students as $student)
            <!--
                Kode ini akan melakukan loop data dari variabel 
                $students dan memecahnya satu per satu ke dalam variabel $student.
            -->
            <tr>
                <td>{{ $loop->iteration }}</td>
                <!-- Menampilkan nomor urut dari setiap item dalam loop -->
                <td>{{ $student->nis }}</td>
                <!-- Menampilkan NIS dari data student -->
                <td>{{ $student->name }}</td>
                <!-- Menampilkan nama dari data student -->
                <td>{{ $student->birth_date }}</td>
                <!-- Menampilkan tanggal lahir dari data student -->
                <td>
                    <!-- Tombol untuk mengedit data student, mengarahkan ke halaman edit -->
                    <a href="/student/{{ $student->id }}/edit" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <!-- Form untuk menghapus data student -->
                    <form action="/student/{{ $student->id }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- 
                            Input hidden digunakan untuk mengirimkan metode HTTP DELETE.
                            Hal ini diperlukan karena form HTML hanya mendukung metode GET dan POST.
                        -->
                        @csrf
                        <!-- Menyertakan token CSRF untuk keamanan -->
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <!--
                    Kode ini digunakan untuk menambahkan tombol edit 
                    dan delete. Di Laravel, perintah delete harus 
                    dilakukan melalui form. Input hidden digunakan agar
                    form bisa mengirimkan metode DELETE.
                -->
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection
