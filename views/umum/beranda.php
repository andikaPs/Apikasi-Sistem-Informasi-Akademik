<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$query = mysqli_query($kon, "SELECT * FROM berita ORDER BY idBerita DESC");
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_array($query)) {
    $berita.= "
      <div class='berita'>
        <div class='card'>
          <div class='card-body'>
            <h3>{$row['judul']}</h3>
            <p>{$row['tanggal']}</p>

            <a href='baca.php?id={$row['idBerita']}' class='btn top-28'>Baca</a>
          </div>
        </div>
      </div>
    ";
  }
} else {
  $info = "<h1>Belum ada berita</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Beranda</title>
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
        <p>Beranda</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- awal list -->
    <div class="list">

      <?= $berita; ?>
      <?= $info; ?>


    </div>
    <!-- akhir list -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>