<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];

$ambilData = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM mahasiswa INNER JOIN kelas, jurusan, fakultas WHERE idMahasiswa = '$id'"));
$nim = $ambilData['NIM'];
$Nama = $ambilData['nama'];
$Kelas = $ambilData['namaKelas'];
$jurusan = $ambilData['idJurusan'];
$Jurusan = $ambilData['namaJurusan'];
$fakultas = $ambilData['namaFakultas'];
$Alamat = $ambilData['alamat'];
$Email = $ambilData['email'];
$Notelepon = $ambilData['noTelepon'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Detail Mahasiswa</title>
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
        <p>Detail Mahasiswa</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="mahasiswa.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nim -->
          <label for="NIM">NIM</label>
          <input type="text" name="nim" id="NIM" class="form-control" value="<?=$nim; ?>" readonly>
          <!-- end nim -->

          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value="<?= $Nama; ?>" readonly>
          <!-- end nama -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $Kelas; ?>" readonly>
          <!-- end kelas -->

          <!-- jurusan -->
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $Jurusan; ?>" readonly>
          <!-- end jurusan -->

          <!-- fakultas -->
          <label for="fakultas">Fakultas</label>
          <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= $fakultas; ?>" readonly>
          <!-- end fakultas -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control"
            readonly><?= $Alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="<?= $Email; ?>" readonly>
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="text" name="notel" id="nomor" class=" form-control" value="<?= $Notelepon; ?>" readonly>
          <!-- end no telephone -->
        </form>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>