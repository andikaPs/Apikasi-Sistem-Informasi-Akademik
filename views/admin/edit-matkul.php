<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];

$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mataKuliah WHERE idMatkul = '$id'"));
$matkul = $ambilData['namaMatkul'];
$idD = $ambilData['idDosen'];

$mtkul = $_POST['matkul'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "UPDATE mataKuliah SET namaMatkul = '$mtkul' WHERE idMatkul = '$id'");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil dirubah!');
        window.location.href = 'matkul.php';
      </script>
    ";
  } else {
    echo "Gagal";
  }
}
$ambilDosen = mysqli_query($kon, "SELECT * FROM dosen");
while ($dsn = mysqli_fetch_array($ambilDosen)) {
  if ($idD == $dsn['idDosen']) {
    $op.="
      <option value='{$dsn['idDosen']}' selected>{$dsn['nama']}</option>
    ";
  } else {
    $op.="
      <option value='{$dsn['idDosen']}'>{$dsn['nama']}</option>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Edit Mata Kuliah</title>
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
        <p>Edit Mata Kuliah</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="matkul.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- matkul -->
          <label for="matkul">Nama Mata Kuliah</label>
          <input type="text" name="matkul" id="matkul" class="form-control" value="<?= $matkul; ?>">

          <!-- dosen pengajar -->
          <label for="dosen">Dosen Pengajar</label>
          <select name="dosen" id="dosen" class="form-control">
            <option value="">--Pilih--</option>
            <?= $op; ?>
          </select>
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