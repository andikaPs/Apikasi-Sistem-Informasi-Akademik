<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];
$query = mysqli_query($kon, "SELECT * FROM nilaiUas INNER JOIN mataKuliah ON nilaiUas.idMatkul = mataKuliah.idMatkul WHERE idMahasiswa = '$id'");
if (mysqli_num_rows($query)) {
  $no = 0;
  while ($row = mysqli_fetch_array($query)) {
    $no++;
    $tr.= "
            <tr>
              <td>$no</td>
              <td>{$row['namaMatkul']}</td>
              <td>{$row['nilai']}</td>
              <td>{$row['keterangan']}</td>
            </tr>
    ";
  }
}  else {
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
  <title>Nilai UAS</title>
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
        <p>Nilai UAS</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card for nilai uts -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="tentang-saya.php" class="btn bottom">Kembali</a>
        </div>

        <table class="table">
          <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Keterangan</th>
          </tr>

          <?= $tr; ?>
          <?= $info; ?>
        </table>
      </div>
    </div>
    <!-- end card for nilai uts -->


  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>