<?php  
include('../../component/koneksi.php');
include('../umum/menu.php');

$query = mysqli_query($kon, "SELECT * FROM mahasiswa, kelas, jurusan WHERE mahasiswa.idKelas = kelas.idKelas AND mahasiswa.idJurusan = jurusan.idJurusan ORDER BY NIM DESC");
if (mysqli_num_rows($query) > 0) {
  $no = 0;
  while ($row = mysqli_fetch_array($query)) {
    $no++;
    $tr.= "
      <tr>
        <td>$no</td>
        <td>{$row['NIM']}</td>
        <td>{$row['nama']}</td>
        <td>{$row['namaKelas']}</td>
        <td>{$row['namaJurusan']}</td>
        <td>
          <div class='row'>
            <a href='edit-mahasiswa.php?id={$row['idMahasiswa']}' class='btn bg-warning'>Edit</a>
            <a href='detail-mahasiswa.php?id={$row['idMahasiswa']}' class='btn'>Detail</a>
            <a href='hapus_mahasiswa.php?id={$row['idMahasiswa']}' class='btn bg-danger'>Hapus</a>
          </div>
        </td>
      </tr>
    ";
  }
} else {
  $info="
          <tr>
            <td colspan='100'>Data Masih Kosong</td>
          </tr>
  ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Daftar Mahasiswa</title>
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
        <p>Mahasiswa</p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar berita -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="tambah-mahasiswa.php" class="btn bottom">Tambah</a>
        </div>

        <table class="table">
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
          </tr>

          <?= $tr; ?>
          <?= $info; ?>
        </table>
      </div>
    </div>
    <!-- akhir card daftar berita -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>