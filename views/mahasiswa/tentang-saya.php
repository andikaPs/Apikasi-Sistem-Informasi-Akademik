<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_SESSION['id'];
$ambil = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mahasiswa WHERE NIM = '$id'"));
$idM = $ambil['idMahasiswa'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Tentang Saya</title>
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
        <p>Tentang Saya</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- awal row -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h2>Informasi Pribadi</h2>
            <a href="informasi-pribadi.php?id=<?= $idM; ?>" class="btn center">Lihat</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="column">
          <div class="card">
            <div class="card-body">
              <h2>Nilai Mahasiswa</h2>

              <div class="nilai">
                <a href="uts.php?id=<?= $idM; ?>" class="btn center">UTS</a>
                <a href="uas.php?id=<?= $idM; ?>" class="btn center">UAS</a>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <a href="../../component/logout.php" class="btn center">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir row -->



  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>