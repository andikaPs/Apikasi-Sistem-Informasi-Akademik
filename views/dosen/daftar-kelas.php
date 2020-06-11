<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_SESSION['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$id'"));
$h = $ambilData['idDosen'];
$query = mysqli_query($kon, "SELECT * FROM dosen,kelas WHERE dosen.idKelas = kelas.idKelas AND idDosen = '$h'");
while ($row = mysqli_fetch_array($query)) {
  
  $df .= "
      <div class='berita'>
        <div class='card'>
          <div class='card-body'>
            <h3>{$row['namaKelas']}</h3>
            <!--<div class='row'>
              <a href='uts-mahasiswa.php?id={$row['idKelas']}' class='btn top-28'>UTS</a>
              <a href='uas-mahasiswa.php?id={$row['idKelas']}' class='btn top-28'>UAS</a>
            </div>-->
            <div class='row'>
              <a href='daftar-mahasiswa.php?id={$row['idKelas']}' class='btn top-28'>lihat</a>
            </div>
          </div>
        </div>
      </div>
  ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Daftar Kelas</title>
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
        <p>Daftar kelas</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- awal list -->
    <div class="list">

      <?= $df; ?>


    </div>
    <!-- akhir list -->
  </div>
  <!-- akhir container -->
  <script src="../../public/js/script.js"></script>
</body>

</html>