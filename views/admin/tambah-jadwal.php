<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');

$ambilMatkul = mysqli_query($kon, "SELECT * FROM mataKuliah");
while ($matkul = mysqli_fetch_array($ambilMatkul)) {
  $matKul.="
    <option value='{$matkul['idMatkul']}'>{$matkul['namaMatkul']}</option>
  ";
}

$ambilKelas = mysqli_query($kon, "SELECT * FROM kelas");
while ($kelas = mysqli_fetch_array($ambilKelas)) {
  $Kelas .= "
    <option value='{$kelas['idKelas']}'>{$kelas['namaKelas']}</option>
  ";
}

$ambilDosen = mysqli_query($kon, "SELECT * FROM dosen");
while ($dosen = mysqli_fetch_array($ambilDosen)) {
  $Dosen .= "
    <option value='{$dosen['idDosen']}'>{$dosen['nama']}</option>
  ";
}

// generate kode otomatis
$query = mysqli_fetch_array(mysqli_query($kon,"SELECT max(idJadwal)as id FROM jadwalPelajaran"));
//contoh kode -> Jdwl0001
$kode=substr($query['id'], 4,4);
$tbh=$kode+1;
if ($tbh<10) {
  $id="Jdwl000".$tbh;
}
elseif ($tbh<99) {
  $id="Jdwl00".$tbh;
}
elseif ($tbh<999) {
  $id="Jdwl0".$tbh;
}
else{
  $id="Jdwl".$tbh;
}

$matkul = $_POST['matkul'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$ruangan = $_POST['ruangan'];
$kelas = $_POST['kelas'];
$dosen = $_POST['dosen'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "INSERT INTO jadwalPelajaran(idJadwal, idMatkul, hari, jam, ruangan, idKelas, idDosen) VALUES ('$id', '$matkul', '$hari', '$jam', '$ruangan', '$kelas', '$dosen')");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil disimpan!');
        window.location.href = 'jadwal.php';
      </script>
    ";
  } else {
    echo "Gagal";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Tambah Jadwal</title>
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
        <p>Tambah Jadwal</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="jadwal.php" class="btn bottom">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- mata kuliah -->
          <label for="matkul">Mata Kuliah</label>
          <select name="matkul" id="matkul" class="form-control">
            <option>--Pilih--</option>
            <?= $matKul; ?>
          </select>

          <!-- password -->
          <label for="hari">Hari</label>
          <input type="text" name="hari" id="hari" class="form-control"required>

          <!-- Jam -->
          <label for="jam">Jam</label>
          <input type="text" name="jam" id="jam" class="form-control"required>
          <!-- end Jam -->

          <!-- ruamgam -->
          <label for="ruamgam">Ruangan</label>
          <input type="text" name="ruangan" id="ruangan" class="form-control"required>
          <!-- ruamgam -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <select name="kelas" id="kelas" class="form-control">
            <option>-Pilih-</option>
            <?= $Kelas; ?>
          </select>
          <!-- end kelas -->

          <!-- no telephone -->
          <label for="dosen">Dosen</label>
          <select name="dosen" id="dosen" class="form-control">
            <option>-Pilih-</option>
            <?= $Dosen; ?>
          </select>
          <!-- end no telephone -->

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