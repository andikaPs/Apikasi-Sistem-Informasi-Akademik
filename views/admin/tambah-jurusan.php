<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

// menampilkan seluruh data fakultas
$query = mysqli_query($kon, "SELECT * FROM fakultas");
while ($comboBox = mysqli_fetch_array($query)) {
  $pil .= "
    <option value='{$comboBox['idFakultas']}'>{$comboBox['namaFakultas']}</option>
  ";
}

// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idJurusan)as id FROM jurusan"));
//contoh kode -> Mhs0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Jrs000".$tbh;
}
elseif ($tbh<99) {
  $id="Jrs00".$tbh;
}
elseif ($tbh<999) {
  $id="Jrs0".$tbh;
}
else{
  $id="Jrs".$tbh;
}

$jurusan = $_POST['jurusan'];
$fakultas = $_POST['fakultas'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO jurusan(idJurusan, namaJurusan, idFakultas) VALUES ('$id', '$jurusan', '$fakultas')");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil ditambahkan!');
        window.location.href = 'jurusan.php';
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
  <title>Tambah Jurusan</title>
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
        <p>Tambah Jurusan</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="jurusan.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nama jurusan -->
          <label for="jurusan">Nama Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control" required>

          <!-- fakultas -->
          <label for="fakultas">Fakultas</label>
          <select name="fakultas" id="fakultas" class="form-control" required>
            <option>-Pilih-</option>
            <?= $pil; ?>
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