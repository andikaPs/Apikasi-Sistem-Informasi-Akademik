<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_SESSION['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM admin WHERE username = '$id'"));
$idAdmin = $ambilData['idAdmin'];
$username = $ambilData['username'];
$password = $ambilData['password'];
$nama = $ambilData['nama'];
$alamat = $ambilData['alamat'];
$email = $ambilData['email'];
$noTelepon = $ambilData['noTelepon'];
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

    <!-- row start -->
    <div class="row">
      <!-- col start -->
      <div class="col">
        <!-- card for informasi pribadi -->
        <div class="card">
          <div class="card-body">

            <form method="POST" action="">
              <!-- username -->
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>" readonly>

              <!-- password -->
              <label for="password">Password</label>
              <input type="text" name="password" id="password" class="form-control" value="<?= $password; ?>" readonly>

              <!-- nama -->
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $nama; ?>" readonly>

              <!-- alamat -->
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" style="height:50px;" readonly><?= $alamat; ?></textarea>

              <!-- email -->
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>" readonly>

              <!-- notel -->
              <label for="notel">No Telephone</label>
              <input type="text" name="notel" id="notel" class="form-control" value="<?= $noTelepon; ?>" readonly>
            </form>
            <a href="edit-data_diri.php?id=<?= $idAdmin; ?>" class="btn">Edit Data</a>
          </div>
        </div>
        <!-- end card for informasi pribadi -->
      </div>
      <!-- col end -->
 
      <div class="col">
        <div class="card">
          <div class="card-body">
            <a href="../../component/logout.php" class="btn center">logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- row end -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>