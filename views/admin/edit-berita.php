<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];  

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$tanggal = date('Ymd');
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "UPDATE berita SET judul = '$judul', isiBerita = '$isi', tanggal = '$tanggal' WHERE idBerita = '$id'");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil dirubah!');
        window.location.href = 'berita.php';
      </script>
    ";
  } else {
    echo "Gagal";
  }

}

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
  <title>Tambah Berita</title>
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
        <p>Edit Berita</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="berita.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- judul berita -->
          <label for="judul">Judul</label>
          <input type="text" name="judul" id="judul" class="form-control" value="<?= $judul; ?>" required>

          <!-- isi berita -->
          <label for="isi">Isi Berita</label>
          <textarea name="isi" id="isi" class="form-control" style="height: 150px;"><?= $isi; ?></textarea>

          <!-- tanggal upload -->
          <label for="tgl">Tanggal Publikasi</label>
          <input type="date" name="tgl" id="tgl" class="form-control" value="<?= $tanggal; ?>" readonly>

          <input type="submit" value="simpan" class="btn" name='tombol'>
        </form>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>