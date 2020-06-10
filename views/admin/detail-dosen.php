<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];

$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen, kelas WHERE dosen.idKelas = kelas.idKelas AND dosen.idDosen = '$id'"));
$nip = $ambilData['NIP'];
$nama = $ambilData['nama'];
$alamat = $ambilData['alamat'];
$email = $ambilData['email'];
$notel = $ambilData['noTelepon'];
$kelas = $ambilData['namaKelas'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Edit Dosen</title>
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
        <p>Edit Dosen</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="dosen.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nim -->
          <label for="nip">NIP</label>
          <input type="text" name="nip" id="nip" class="form-control" value="<?= $nip; ?>" readonly>
          <!-- end nim -->

          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value="<?= $nama; ?>" readonly>
          <!-- end nama -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" style="height: 150px;" readonly><?= $alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>" readonly>
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="text" name="notel" id="nomor" class=" form-control" value="<?= $notel; ?>" readonly>
          <!-- end no telephone -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $kelas; ?>" readonly>
          <!-- kelas -->

        </form>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>