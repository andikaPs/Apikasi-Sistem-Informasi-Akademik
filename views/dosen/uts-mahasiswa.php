<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_GET['id'];
$idD = $_SESSION['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$idD'"));
$h = $ambilData['idDosen'];

$query = mysqli_query($kon, "SELECT * FROM nilaiUts, mataKuliah, mahasiswa, kelas WHERE nilaiUts.idMatkul = mataKuliah.idMatkul AND nilaiUts.idMahasiswa = mahasiswa.idMahasiswa AND kelas.idKelas = '$id' AND nilaiUts.idDosen = '$h'");
if (mysqli_num_rows($query) > 0) {
  $no = 0;
  while ($row = mysqli_fetch_array($query)) {
    $no++;
    $tr.= "
            <tr>
              <td>$no</td>
              <td>{$row['NIM']}</td>
              <td>{$row['nama']}</td>
              <td>{$row['namaMatkul']}</td>
              <td>{$row['nilai']}</td>
            </tr>
    ";
  }
  
} else {
   $info = "
    <tr>
      <td colspan='100'>Data Masih Kosong!</td>
    </tr>
   ";
}



$ambilKelas = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kelas WHERE idKelas = '$id'"));
$namaKelas = $ambilKelas['namaKelas'];

$ambilMatkul = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mataKuliah"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Daftar Mahasiswa</title>
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
        <p>Input Nilai UTS Mahasiswa Kelas : <?= $namaKelas; ?></p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar mahasiswa -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="daftar-kelas.php" class="btn bottom">Kembali</a>
          <a href='uts.php?id=<?= $id;?>' class='btn bottom'>Tambah</a>
        </div>

        <table class="table">
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai UTS</th>
            <!-- <th>Aksi</th> -->
          </tr>

          <?= $tr; ?>
          <?= $info; ?>
        </table>
      </div>
    </div>
    <!-- akhir card -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>