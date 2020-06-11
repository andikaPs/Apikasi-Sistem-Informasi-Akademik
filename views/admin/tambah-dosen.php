<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
date_default_timezone_set('Asia/Jakarta');
// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idDosen)as id FROM dosen"));
//contoh kode -> Dos0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh < 10) {
  $id="Dos000".$tbh;
}
elseif ($tbh < 99) {
  $id="Dos00".$tbh;
}
elseif ($tbh < 999) {
  $id="Dos0".$tbh;
}
else {
  $id="Dos".$tbh;
}
// $otomatis = date('His');
$pass = rand(1000,10000);
$nip = "13141".$pass;

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$notel = $_POST['notel'];
$Kelas = $_POST['kelas'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO dosen(idDosen, NIP, password, nama, alamat, email, noTelepon, idKelas) VALUES ('$id', '$nip', '$pass', '$nama', '$alamat', '$email', '$notel', '$Kelas')");
  if ($h) {
    $info = "Data Berhasil Ditambahkan";
  
    $ambilData = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM dosen WHERE idDosen = '$id'"));
    $NIP = $ambilData['NIP'];
    $password = $ambilData['password'];
  
    $dataBaru = "
            <!-- nim -->
            <label for='nip'>NIP</label>
            <input type='text' name='nip' id='nip' class='form-control' value='$NIP' readonly>
            <!-- end nim -->

            <!-- password -->
            <label for='pwd'>Password</label>
            <input type='text' name='pwd' id='pwd' class='form-control' value='$password' readonly>
    
    ";
    $readonly = 'readonly';
    $dis = 'disabled';
    $baru = "<a href='tambah-dosen.php' class='btn' style='margin-left: 10px;'>Baru</a>";
  } else {
    $info = "Data gagal ditambahkan";
  }
}

$ambilData = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM dosen WHERE idDosen = '$id'"));
$Nama = $ambilData['nama'];
$Alamat = $ambilData['alamat'];
$Email = $ambilData['email'];
$Notel = $ambilData['noTelepon'];
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
  <title>Tambah Dosen</title>
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
        <p>Tambah Dosen</p>
        <p><mark><?= $info;  ?></mark></p>
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
          <?= $dataBaru; ?>

          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value="<?= $Nama; ?>" <?= $readonly; ?> required>
          <!-- end nama -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" style="height: 150px;" <?= $readonly; ?>><?= $Alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="<?= $Email; ?>" <?= $readonly; ?>>
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="number" name="notel" id="nomor" class=" form-control" value="<?= $Notel; ?>" <?= $readonly; ?>>
          <!-- end no telephone -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <select name="kelas" id="kelas" class="form-control">
            <option>--Pilih--</option>
            <?= $kelas; ?>
          </select>
          <!-- end kelas -->

          <div class="flex">
            <input type="submit" value="Simpan" class="btn" name='tombol' <?= $dis; ?>>
            <?= $baru; ?>
          </div>
        </form>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>