<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$id = $_SESSION['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen INNER JOIN kelas ON dosen.idKelas = kelas.idKelas WHERE NIP = '$id'"));
$nip = $ambilData['NIP'];
$nama = $ambilData['nama'];
$alamat = $ambilData['alamat'];
$email = $ambilData['email'];
$notel = $ambilData['noTelepon'];
$kelas = $ambilData['namaKelas'];
$idDOsen = $ambilData['idDosen'];
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
              <!-- NIP -->
              <label for="nip">NIP</label>
              <input type="text" name="nip" id="nip" class="form-control" value='<?= $nip; ?>' readonly>

              <!-- nama -->
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" value='<?= $nama; ?>' readonly>

              <!-- alamat -->
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" readonly><?= $alamat; ?></textarea>

              <!-- email -->
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" value='<?= $email; ?>' readonly>

              <!-- notel -->
              <label for="notel">No Telephone</label>
              <input type="text" name="notel" id="notel" class="form-control" value='<?= $notel; ?>' readonly>

              <!-- kelas -->
              <label for="kelas">Kelas</label>
              <input type="text" name="kelas" id="kelas" class="form-control" value='<?= $kelas; ?>' readonly>
            </form>
            <a href="edit-data_diri.php?id=<?= $idDOsen; ?>" class="btn">Edit Data</a>
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