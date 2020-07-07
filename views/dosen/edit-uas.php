<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$idM = $_GET['id'];
$idK = $_GET['idK'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mahasiswa WHERE idMahasiswa = '$idM'"));
$nama = $ambilData['nama'];

$nilai = $_POST['nilai'];
if ($nilai > 75) {
  $ket = "LULUS";
} else {
  $ket = "Remedial";
}
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "UPDATE nilaiUas SET nilai = '$nilai', keterangan = '$ket' WHERE idMahasiswa = '$idM'");
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

$ambil = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nilaiUas INNER JOIN mataKuliah ON nilaiUas.idMatkul = mataKuliah.idMatkul WHERE idMahasiswa = '$idM'"));
$hm = $ambil['idMatkul'];
$nilai = $ambil['nilai'];
$matkul = $ambil['namaMatkul'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Edit Nilai Mahasiswa</title>
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
        <p>Edit Nilai UAS Mahasiswa</p>
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
          <!-- nama mahasiswa -->
          <label for="mahasiswa">Nama Mahasiswa</label>
          <input type="text" name="nama" id="mahasiswa" class="form-control" value="<?= $nama;?>" readonly>

         <!-- mata kuliah -->
          <label for="matkul">Mata Kuliah</label>
          <input type="text" value="<?= $matkul; ?>" class="form-control" readonly>

          <!-- nilai -->
          <label for="nilai">Nilai</label>
          <input type="number" name="nilai" id="nilai" value="<?= $nilai; ?>" class="form-control">

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