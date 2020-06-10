<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_GET['id'];
$ambil = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mahasiswa, kelas, jurusan, fakultas WHERE mahasiswa.idKelas = kelas.idKelas AND mahasiswa.idJurusan = jurusan.idJurusan AND mahasiswa.idFakultas = fakultas.idFakultas AND mahasiswa.idMahasiswa = '$id'"));
$idM = $ambil['idMahasiswa'];
$nim = $ambil['NIM'];
$nama = $ambil['nama'];
$kelas = $ambil['namaKelas'];
$jurusan = $ambil['namaJurusan'];
$fakultas = $ambil['namaFakultas'];
$alamat = $ambil['alamat'];
$email = $ambil['email'];
$notel = $ambil['noTelepon'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Informasi Pribadi</title>
  <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
  <!-- awal navbar -->
  <nav>
    <h3 class="logo">ubsi</h3>

    <?= $menu; ?>

    <div class="menu-toggle">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- awal container -->
  <div class="container top-28">
    <!-- awal card -->
    <div class="card">
      <div class="card-body">
        <h3>Universitas Bina Sarana Informatika</h3>
        <p>Informasi Pribadi</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card for informasi pribadi -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="tentang-saya.php" class="btn">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nim -->
          <label for="NIM">NIM</label>
          <input type="text" name="nim" id="NIM" class="form-control" value='<?= $nim; ?>' readonly>
          <!-- end nim -->

          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value='<?= $nama; ?>' readonly>
          <!-- end nama -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" value='<?= $kelas; ?>' readonly>
          <!-- end kelas -->

          <!-- jurusan -->
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control" value='<?= $jurusan; ?>' readonly>
          <!-- end jurusan -->

          <!-- fakultas -->
          <label for="fakultas">Fakultas</label>
          <input type="text" name="fakultas" id="fakultas" class="form-control" value='<?= $fakultas; ?>' readonly>
          <!-- end fakultas -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control"
            readonly><?= $alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value='<?= $email; ?>' readonly>
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="text" name="notel" id="nomor" class=" form-control" value='<?= $notel; ?>' readonly>
          <!-- end no telephone -->
        </form>
        <a href="edit-data_diri.php?id=<?= $idM; ?>" class="btn">Edit Data</a>
      </div>
    </div>
    <!-- end card for informasi pribadi -->


  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>