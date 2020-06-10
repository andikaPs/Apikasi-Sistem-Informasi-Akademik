<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idMahasiswa)as id FROM mahasiswa"));
//contoh kode -> Mhs0001
$kode=substr($query['id'], 3,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Mhs000".$tbh;
}
elseif ($tbh<99) {
  $id="Mhs00".$tbh;
}
elseif ($tbh<999) {
  $id="Mhs0".$tbh;
}
else{
  $id="Mhs".$tbh;
}
// $pass = date('is');
// $nim = "121".$pass;
$pass = rand(1000,10000);
$nim = "121".$pass;
// pemanggilan data kelas
$ambilKelas = mysqli_query($kon, "SELECT * FROM kelas");
while ($row = mysqli_fetch_array($ambilKelas)) {
  if ($Kelas == $row['idKelas']) {
    $op.= "
          <option value='{$row['idKelas']}' selected>{$row['namaKelas']}</option>
    ";
  } else {
    $op.= "
          <option value='{$row['idKelas']}'>{$row['namaKelas']}</option>
    ";
  }
}

$ambilJurusan = mysqli_query($kon, "SELECT * FROM jurusan");
while ($pil = mysqli_fetch_array($ambilJurusan)) {
  if ($Jurusan == $pil['idJurusan']) {
    $pilihan.="
            <option value='{$pil['idJurusan']}' selected>{$pil['namaJurusan']}</option>
    ";
  } else {
    $pilihan.="
            <option value='{$pil['idJurusan']}'>{$pil['namaJurusan']}</option>
    ";
  }
}

$ambilFakultas = mysqli_query($kon, "SELECT * FROM fakultas");
while ($fk = mysqli_fetch_array($ambilFakultas)) {
  if ($Fakultas == $fk['idFakultas']) {
    $fakul.="
            <option value='{$fk['idFakultas']}' selected>{$fk['namaFakultas']}</option>
    ";
  } else {
    $fakul.="
            <option value='{$fk['idFakultas']}'>{$fk['namaFakultas']}</option>
    ";
  }
}

// proses simpan data
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$fakultas = $_POST['fakultas'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$noTelepon = $_POST['notel'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO mahasiswa(idMahasiswa, NIM, password, nama, idKelas, idJurusan, idFakultas, alamat, email, noTelepon) VALUES ('$id', '$nim', '$pass', '$nama', '$kelas', '$jurusan', '$fakultas', '$alamat', '$email', '$noTelepon')");
  if ($h) {
    $info = "Data Berhasil Ditambahkan";
  
    $ambilData = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM mahasiswa WHERE idMahasiswa = '$id'"));
    $NIM = $ambilData['NIM'];
    $password = $ambilData['password'];
  
    $dataBaru = "
            <!-- nim -->
            <label for='NIM'>NIM</label>
            <input type='text' name='nim' id='NIM' class='form-control' value='$NIM' readonly>
            <!-- end nim -->

            <!-- password -->
            <label for='pwd'>Password</label>
            <input type='text' name='pwd' id='pwd' class='form-control' value='$password' readonly>
    
    ";
    $readonly = 'readonly';
    $dis = 'disabled';
    $baru = "<a href='tambah-mahasiswa.php' class='btn' style='margin-left: 10px;'>Baru</a>";
  } else {
    $info = "Data gagal ditambahkan";
  }

  $ambilData = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM mahasiswa WHERE idMahasiswa = '$id'"));
  $Nama = $ambilData['nama'];
  $Alamat = $ambilData['alamat'];
  $Email = $ambilData['email'];
  $Notelepon = $ambilData['noTelepon'];
  $Kelas = $ambilData['idKelas'];
  $Jurusan = $ambilData['idJurusan'];
  $Fakultas = $ambilData['idFakultas'];

  // pemanggilan data kelas
  $ambilKelas = mysqli_query($kon, "SELECT * FROM kelas");
  while ($row = mysqli_fetch_array($ambilKelas)) {
    if ($Kelas == $row['idKelas']) {
      $op.= "
            <option value='{$row['idKelas']}' selected>{$row['namaKelas']}</option>
      ";
    } else {
      $op.= "
            <option value='{$row['idKelas']}'>{$row['namaKelas']}</option>
      ";
    }
  }

  $ambilJurusan = mysqli_query($kon, "SELECT * FROM jurusan");
  while ($pil = mysqli_fetch_array($ambilJurusan)) {
    if ($Jurusan == $pil['idJurusan']) {
      $pilihan.="
              <option value='{$pil['idJurusan']}' selected>{$pil['namaJurusan']}</option>
      ";
    } else {
      $pilihan.="
              <option value='{$pil['idJurusan']}'>{$pil['namaJurusan']}</option>
      ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Tambah Mahasiswa</title>
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
        <p>Tambah Mahasiswa</p>
        <p><mark><?= $info;  ?></mark></p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="mahasiswa.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" autocomplete="off">
          <?= $dataBaru; ?>
    
          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value='<?= $Nama; ?>' <?= $readonly; ?> required>
          <!-- end nama -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <select name="kelas" id="kelas" class="form-control" <?= $dis; ?>>
            <option value="">-Pilih-</option>
            <?= $op; ?>
          </select>
          <!-- end kelas -->

          <!-- jurusan -->
          <label for="jurusan">Jurusan</label>
          <select name="jurusan" id="jurusan" class="form-control" <?= $dis; ?>>
            <option value="">-Pilih-</option>
            <?= $pilihan; ?>
          </select>
          <!-- end jurusan -->

          <!-- fakultas -->
          <label for="fakultas">Fakultas</label>
          <select name="fakultas" id="fakultas" class="form-control" <?= $dis; ?>>
            <option value="">-Pilih-</option>
            <?= $fakul; ?>
          </select>
          <!-- end fakultas -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" <?= $readonly; ?> required><?= $Alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value='<?= $Email; ?>' <?= $readonly; ?> required>
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="number" name="notel" id="nomor" class=" form-control" value='<?= $Notelepon; ?>' <?= $readonly; ?> required>
          <!-- end no telephone -->

          <div class="flex">
            <input type="submit" value="Simpan" class="btn" name="tombol" <?= $dis; ?>>
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