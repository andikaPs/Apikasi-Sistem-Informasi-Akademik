<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idnilaiUas)as id FROM nilaiUas"));
//contoh kode -> Uas0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Uas000".$tbh;
}
elseif ($tbh<99) {
  $id="Uas00".$tbh;
}
elseif ($tbh<999) {
  $id="Uas0".$tbh;
}
else{
  $id="Uas".$tbh;
}
$idD = $_SESSION['id'];
$idM = $_GET['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$idD'"));
$h = $ambilData['idDosen'];
$ambil = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mataKuliah WHERE idDosen = '$h'"));
$m = $ambil['idMatkul'];

$matkul = $_POST['matkul'];
$Mhs = $_POST['nama'];
$nilai = $_POST['nilai'];
if ($nilai > 75) {
  $ket = "LULUS";
} else {
  $ket = "Remedial";
}
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO nilaiUas(idNilaiUas, idMatkul, nilai, keterangan, idMahasiswa, idDosen) VALUES ('$id', '$m', '$nilai', '$ket', '$idM', '$h')");
  if ($h) {
    $info = "Data Berhasil disimpan!";
    $keterangan = "
          <!-- nilai -->
          <label for='ket'>Keterangan</label>
          <input type='text' name='ket' id='ket' value='$ket' class='form-control' readonly>
    ";
    $tblSimpan = "";
  } else {
    $info = "Data gagal disimpan!";
  }
} else {
  $tblSimpan = "<input type='submit' value='Simpan' class='btn' name='tombol'>";
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
        <p>Input Nilai UAS Mahasiswa</p>
        <p><mark><?= $info; ?></mark></p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar mahasiswa -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="daftar-kelas.php" class="btn">Kembali</a>
        </div>

        <form method="POST" action="">

          <!-- nilai -->
          <label for="nilai">Nilai</label>
          <input type="number" name="nilai" id="nilai" class="form-control"value="<?= $nilai; ?>">

          <?= $keterangan; ?>

          <?= $tblSimpan; ?>
        </form>
      </div>
    </div>
    <!-- akhir card -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>