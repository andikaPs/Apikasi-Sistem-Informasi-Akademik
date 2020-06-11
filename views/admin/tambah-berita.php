<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');
// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idBerita)as id FROM berita"));
//contoh kode -> Brt0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Brt000".$tbh;
}
elseif ($tbh<99) {
  $id="Brt00".$tbh;
}
elseif ($tbh<999) {
  $id="Brt0".$tbh;
}
else{
  $id="Brt".$tbh;
}

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$tanggal = date('Ymd');
$tombol = $_POST['tombol'];
$idSesion = $_SESSION['id'];
$ambilAdmin = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM admin WHERE username = '$idSesion'"));
$admin = $ambilAdmin['idAdmin'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO berita(idBerita, judul, isiBerita, tanggal, idAdmin) VALUES ('$id', '$judul', '$isi', '$tanggal', '$admin')");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil disimpan!');
        window.location.href = 'berita.php';
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
        <p>Tambah Berita</p>
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
          <input type="text" name="judul" id="judul" class="form-control" required>

          <!-- isi berita -->
          <label for="isi">Isi Berita</label>
          <textarea name="isi" id="isi" class="form-control" style="height: 150px;"></textarea>
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