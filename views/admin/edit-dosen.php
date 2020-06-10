<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$notel = $_POST['notel'];
$tombol = $_POST['tombol'];
$Kelas = $_POST['kelas'];
if ($tombol) {
  $h = mysqli_query($kon, "UPDATE dosen SET nama = '$nama', alamat = '$alamat', email = '$email', noTelepon = '$notel', idKelas = '$Kelas' WHERE idDosen = '$id'");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil disimpan!');
        window.location.href = 'dosen.php';
      </script>
    ";
  } else {
    $info = "Data gagal ditambahkan";
  }
}

$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE idDosen = '$id'"));
$nip = $ambilData['NIP'];
$nama = $ambilData['nama'];
$alamat = $ambilData['alamat'];
$email = $ambilData['email'];
$notel = $ambilData['noTelepon'];
$idK = $ambilData['idKelas'];
// ambil data kelas
$ambilKelas = mysqli_query($kon, "SELECT * FROM kelas");
while ($kel = mysqli_fetch_array($ambilKelas)) {
  if ($idK == $kel['idKelas']) {
    $kelas .= "<option value='{$kel['idKelas']}' selected>{$kel['namaKelas']}</option>";
  } else {
    $kelas .= "<option value='{$kel['idKelas']}'>{$kel['namaKelas']}</option>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Edit Dosen</title>
  <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
  <!-- awal navbar -->
  <nav>
    <h3 class="logo">ubsi</h3>

    <?= $menu ?>

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
        <p>Edit Dosen</p>
        <p><mark><?= $info; ?></mark></p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="dosen.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nim -->
          <label for="nip">NIP</label>
          <input type="text" name="nip" id="nip" class="form-control" value="<?= $nip; ?>" readonly>
          <!-- end nim -->

          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value="<?= $nama; ?>">
          <!-- end nama -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" style="height: 150px;"><?= $alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>">
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="number" name="notel" id="nomor" class=" form-control" value="<?= $notel; ?>">
          <!-- end no telephone -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <select name="kelas" id="kelas" class="form-control">
            <option>--Pilih--</option>
            <?= $kelas; ?>
          </select>
          <!-- end kelas -->

          <input type="submit" value="Simpan" class="btn" name='tombol'>
        </form>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>