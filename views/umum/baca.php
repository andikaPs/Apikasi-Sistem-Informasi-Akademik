<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];

$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM berita WHERE idBerita = '$id'"));
$judul = $ambilData['judul'];
$isi = $ambilData['isiBerita'];
$tanggal = $ambilData['tanggal'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Baca Berita</title>
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
        <p>Baca Berita</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- awal card konten-->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="beranda.php" class="btn bottom">Kembali</a>
        </div>

        <h3><?= $judul; ?></h3>
        <p class="tgl"><?= $tanggal; ?></p>

        <p class="konten"><?= $isi; ?></p>
      </div>
    </div>
    <!-- akhir card konten -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>