<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');
$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$notel = $_POST['notel'];
$tombol = $_POST['tombol'];
if ($tombol) {
  $h = mysqli_query($kon, "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', email = '$email', noTelepon = '$notel' WHERE idMahasiswa = '$id'");
  if ($h) {
    echo "
      <script>
        alert('Data Berhasil disimpan!');
        window.location.href = 'informasi-pribadi.php?id=$id';
      </script>
    ";
  } else {
    echo "Gagal";
  }
}


$ambil = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mahasiswa, kelas, jurusan, fakultas WHERE mahasiswa.idKelas = kelas.idKelas AND mahasiswa.idJurusan = jurusan.idJurusan AND mahasiswa.idFakultas = fakultas.idFakultas AND mahasiswa.idMahasiswa = '$id'"));
$nim = $ambil['NIM'];
$nama = $ambil['nama'];
$kelas = $ambil['namaKelas'];
$jurusan = $ambil['namaJurusan'];
$fakultas = $ambil['namaFakultas'];
$alamat = $ambil['alamat'];
$email = $ambil['email'];
$notel = $ambil['noTelepon'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Edit Data Pribadi</title>
  <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
  <!-- awal navbar -->
  <nav>
    <h3 class="logo">ubsi</h3>

    <ul>
      <li><a href="../umum/beranda.html">Beranda</a></li>
      <li><a href="jadwal.html">Jadwal Kuliah</a></li>
      <li><a href="tentang-saya.html">Tentang Saya</a></li>
    </ul>

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
        <p>Edit Data Pribadi</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card for edit data pribadi -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="informasi-pribadi.php?id=<?= $id; ?>" class="btn">Kembali</a>
        </div>

        <form method="POST" action="">
          <!-- nim -->
          <label for="NIM">NIM</label>
          <input type="text" name="nim" id="NIM" class="form-control" value='<?= $nim; ?>' readonly>
          <!-- end nim -->

          <!-- nama -->
          <label for="name">Nama</label>
          <input type="text" name="nama" id="name" class="form-control" value='<?= $nama; ?>'>
          <!-- end nama -->

          <!-- kelas -->
          <label for="kelas">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" value='<?= $kelas; ?>' readonly>
          <!-- end kelas -->

          <!-- jurusan -->
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control" value='<?= $jurusan; ?>' readonly>
          <!-- end jurusan -->

          <!-- fakultas -->
          <label for="fakultas">Fakultas</label>
          <input type="text" name="fakultas" id="fakultas" class="form-control" value='<?= $fakultas; ?>' readonly>
          <!-- end fakultas -->

          <!-- alamat -->
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control"><?= $alamat; ?></textarea>
          <!-- alamat -->

          <!-- email -->
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value='<?= $email; ?>'>
          <!-- end email -->

          <!-- no telephone -->
          <label for="nomor">No Telephone</label>
          <input type="text" name="notel" id="nomor" class=" form-control" value='<?= $notel; ?>'>
          <!-- end no telephone -->

          <input type="submit" value="Simpan" class="btn" name='tombol'>
        </form>
      </div>
    </div>
    <!-- end card for edit data pribadi -->


  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>