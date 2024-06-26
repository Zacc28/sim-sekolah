<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM Sekolah - Laravel</title>
    <!--
        Menghubungkan file CSS Bootstrap dari CDN untuk styling.
        'integrity' dan 'crossorigin' digunakan untuk keamanan dan 
        memastikan bahwa file yang diambil dari CDN tidak diubah.
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <!--
            Membuat navbar dengan Bootstrap yang memiliki background 
            warna gelap dan teks berwarna terang.
        -->
        <div class="container-fluid mx-3">
          <!--
              'container-fluid' untuk membuat kontainer yang memenuhi
              lebar layar, 'mx-3' memberikan margin horizontal.
          -->
          <a style="font-weight: bold" class="navbar-brand" href="#">
            <span style="color: #ffc107">SIM</span> Sekolah
          </a>
          <!--
              Brand/logo navbar yang ditampilkan sebagai teks tebal dengan
              bagian 'SIM' diberi warna kuning.
          -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!--
              Tombol toggle untuk navbar, digunakan pada layar kecil.
              'data-bs-target' mengacu pada elemen dengan id 'navbarNav'
              yang akan ditampilkan atau disembunyikan.
          -->
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <!--
                Konten navbar yang akan dikolaps pada layar kecil.
                'justify-content-end' untuk meratakan item ke kanan.
            -->
            <ul class="navbar-nav">
              <!--
                  Daftar item navigasi dalam bentuk list.
              -->
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
              <!--
                  Item navigasi masing-masing dengan class 'nav-link'.
                  'active' menunjukkan halaman saat ini. 'disabled'
                  menonaktifkan link.
              -->
            </ul>
          </div>
        </div>
      </nav>

      <!--
          yield('content') digunakan untuk menentukan tempat 
          di mana konten section 'content' dari view lain akan 
          ditampilkan.
      -->
      @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--
        Menghubungkan file JavaScript Bootstrap dari CDN untuk 
        interaktivitas. 'integrity' dan 'crossorigin' digunakan 
        untuk keamanan.
    -->
  </body>
</html>
