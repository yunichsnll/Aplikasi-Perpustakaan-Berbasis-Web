<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Input Data Anggota</title>
  </head>
  <body>
    <div class="row m-0 vh-100">
      <div class="col-md-2 col-6 bg-custom-1 p-0" id="navbarToggleExternalContent">
        <header class="bg-custom-2 p-3 ps-4" align="center">
          <div class="logo">
            <a href="#">
              <img src="img/1.png" alt="">
            </a>
          </div>
        </header>
        <ul class="nav flex-column fw-bold">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_anggota.php">Data Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_pustaka.php">Data Pustaka</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="peminjaman.php">Peminjaman Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengembalian.php">Pengembalian Buku</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 p-0" id ="uiNavbar">
        <div class="main-toolbar bg-custom-2 p-3">
          <i class="bi bi-justify fs-1 text-white" id="demo" onclick="closeNav()"></i>
          <h4 class="m-0 pl-4 ms-2">Perpustakaan SMKN 1 Cibinong</h4>
        <div class="dropdown transition ms-auto">
        <div id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
        </div>  
        <a class="dropdown-item fw-bold text-white" href="logout.php">LOGOUT</a>
        </div>
        </div>

        <div class="sidebar-overlay"></div>

        <div class="content transition">
        <div class="container-fluid dashboard">
            <h3 class="mt-3" align="center">Data Anggota</h3>

<form action="simpan_anggota.php" method="POST">
    <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label fw-bold">No Identitas</label>
    <input type="text" name="no_identitas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label fw-bold">Jenis Identitas</label>
    <input type="text" name="jns_identitas" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-2">
  <label for="exampleInputEmail1" class="form-label fw-bold">Nama Lengkap</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label fw-bold">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-2">
  <label for="exampleInputEmail1" class="form-label fw-bold">No Telpon</label>
    <input type="text" name="no_tlpn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>

<div class="mb-2">
<label for="exampleInputEmail1" class="form-label fw-bold">Kelas</label>
  <select class="form-select" aria-label="Default select example" name="kelas">
  <option selected>Kelas</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  </select>
</div>

<div class="mb-2">
<label for="exampleInputEmail1" class="form-label fw-bold">Kompetensi Keahlian</label>
  <select class="form-select" aria-label="Default select example" name="jurusan">
  <option selected>Kompetensi Keahlian</option>
  <option value="RPL">Rekayasa Perangkat Lunak</option>
  <option value="MM">Multimedia</option>
  <option value="TKJ">Teknik Komputer Jaringan</option>
  <option value="SIJA">Sisten Informasi Jaringan Dan Aplikasi</option>
  <option value="TP">Teknik Permesinan</option>
  <option value="TKR">Teknik Kendaraan Ringan</option>
  <option value="TOI">Teknik Otomasi Industri</option>
  <option value="DPIB">Teknik Gambar Bangunan</option>
  <option value="BKP">Teknik Kontruksi Kayu</option>
  <option value="TFLM">Teknik Fabrikasi Logan dan Manufaturing</option>
  </select><br>
</div>   
      <center>
        <td ><input type="submit" name="tombol" value="Simpan" class="btn fw-bold" align="center" style="background:#B38867"/></td>
        <input type="reset" name="reset" value="Batal" class="btn fw-bold" align="center" style="background:#B38867">
      </center>
</form>
      </div>
      </div>
             
            
        </div>         
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>