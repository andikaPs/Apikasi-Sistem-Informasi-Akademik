<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');


// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idNilaiUts)as id FROM nilaiUts"));
//contoh kode -> Uts0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Uts000".$tbh;
}
elseif ($tbh<99) {
  $id="Uts00".$tbh;
}
elseif ($tbh<999) {
  $id="Uts0".$tbh;
}
else{
  $id="Uts".$tbh;
}
$idD = $_SESSION['id'];
$idM = $_GET['id'];
$idK = $_GET['idK'];

$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$idD'"));
$h = $ambilData['idDosen'];
$ambil = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mataKuliah WHERE idDosen = '$h'"));
$m = $ambil['idMatkul'];

$nilai = $_POST['nilai'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO nilaiUts(idNilaiUts, idMatkul, nilai, idMahasiswa, idDosen) VALUES ('$id', '$m', '$nilai', '$idM', '$h')");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil disimpan!');
        window.location.href = 'daftar-mahasiswa.php?id=$idK';
      </script>
    ";
  } else {
    $info = "Data gagal disimpan!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Input Nilai Mahasiswa</title>
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
        <p>Input Nilai UTS Mahasiswa</p>
        <p><mark><?= $info; ?></mark></p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar mahasiswa -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="daftar-mahasiswa.php?id=<?= $idK; ?>" class="btn">Kembali</a>
        </div>

        <form method="POST" action="">

          <!-- nilai -->
          <label for="nilai">Nilai</label>
          <input type="number" name="nilai" id="nilai" class="form-control"value="<?= $nilai; ?>">

          <input type="submit" value="Simpan" class="btn" name='tombol'>
        </form>
      </div>
    </div>
    <!-- akhir card -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>