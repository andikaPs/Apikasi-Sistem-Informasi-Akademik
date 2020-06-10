<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_SESSION['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$id'"));
$h = $ambilData['idDosen'];
$query = mysqli_query($kon, "SELECT * FROM jadwalPelajaran, mataKuliah, kelas WHERE jadwalPelajaran.idMatkul = mataKuliah.idMatkul AND jadwalPelajaran.idKelas = kelas.idKelas AND jadwalPelajaran.idDosen = '$h' ORDER BY jam ASC");
if (mysqli_num_rows($query) > 0) {
  $no = 0;
  while ($row = mysqli_fetch_array($query)) {
    $no++;
    $tr.="
          <tr>
            <td>$no</td>
            <td>{$row['hari']}</td>
            <td>{$row['namaMatkul']}</td>
            <td>{$row['jam']}</td>
            <td>R-{$row['ruangan']}</td>
            <td>{$row['namaKelas']}</td>
          </tr>    
    ";
  }
} else {
  $info="
          <tr>
            <td colspan='100'>Data Masih Kosong</td>
          </tr>
  ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Jadwal Kuliah</title>
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
        <p>Jadwal Kuliah</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card for table -->
    <div class="card">
      <div class="card-body">
        <!-- awal tabel -->
        <table class="table">
          <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Mata Kuliah</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th>Kelas</th>
          </tr>

          <?= $tr; ?>
          <?= $info; ?>

        </table>
        <!-- akhir tabel -->
      </div>
    </div>
    <!-- end card for table -->


  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>