<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idFakultas)as id FROM fakultas"));
//contoh kode -> Fk0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Fk000".$tbh;
}
elseif ($tbh<99) {
  $id="Fk00".$tbh;
}
elseif ($tbh<999) {
  $id="Fk0".$tbh;
}
else{
  $id="Fk".$tbh;
}

$fakultas = $_POST['fakultas'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO fakultas(idFakultas, namaFakultas) VALUES ('$id', '$fakultas')");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil ditambahkan!');
        window.location.href = 'fakultas.php';
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
  <title>Tambah Fakultas</title>
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
        <p>Tambah Fakultas</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="fakultas.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- fakultas -->
          <label for="fakultas">Nama Fakultas</label>
          <input type="text" name="fakultas" id="fakultas" class="form-control">

          <input type="submit" value="simpan" class="btn" name="tombol">
        </form>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>