<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idMatkul)as id FROM mataKuliah"));
//contoh kode -> Matkul0001
$kode=substr($query['id'], 6,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Matkul000".$tbh;
}
elseif ($tbh<99) {
  $id="Matkul00".$tbh;
}
elseif ($tbh<999) {
  $id="Matkul0".$tbh;
}
else{
  $id="Matkul".$tbh;
}

$ambilDosen = mysqli_query($kon, "SELECT * FROM dosen");
while ($dsn = mysqli_fetch_array($ambilDosen)) {
  $op.="
              <option value='{$dsn['idDosen']}'>{$dsn['nama']}</option>
  ";
}

$matkul = $_POST['matkul'];
$dosen = $_POST['dosen'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO mataKuliah(idMatkul, namaMatkul, idDosen) VALUES ('$id', '$matkul', '$dosen')");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil disimpan!');
        window.location.href = 'matkul.php';
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
  <title>Tambah Mata Kuliah</title>
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
        <p>Tambah Mata Kuliah</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="matkul.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST">
          <!-- matkul -->
          <label for="matkul">Nama Mata Kuliah</label>
          <input type="text" name="matkul" id="matkul" class="form-control" required>

          <!-- dosen pengajar -->
          <label for="dosen">Dosen Pengajar</label>
          <select name="dosen" id="dosen" class="form-control" name='dosen'>
            <option>--Pilih--</option>
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