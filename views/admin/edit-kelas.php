<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_GET['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kelas WHERE idKelas = '$id'"));
$kelas = $ambilData['namaKelas'];
$idD = $ambilData['idDosen'];

$kls = $_POST['kelas'];
$dosen = $_POST['dosen'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "UPDATE kelas SET namaKelas = '$kls' WHERE idKelas = '$id'");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil dirubah!');
        window.location.href = 'kelas.php';
      </script>
    ";
  } else {
    echo "Gagal";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Edit Kelas</title>
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
        <p>Edit Kelas</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="kelas.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nama kelas -->
          <label for="kelas">Nama Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $kelas; ?>" required>

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