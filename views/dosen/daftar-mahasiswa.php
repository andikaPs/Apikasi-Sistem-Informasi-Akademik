<?php 
include('../../component/koneksi.php');
include('../umum/menu.php');


$id = $_GET['id'];
$idD = $_SESSION['id'];
$ambilData = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$idD'"));
$h = $ambilData['idDosen'];
$query = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE idKelas = '$id'");
if (mysqli_num_rows($query) > 0) {
  
  $no = 0;
  while ($row = mysqli_fetch_array($query)) {
    $UTS = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nilaiUts, dosen WHERE nilaiUts.idDosen = dosen.idDosen AND nilaiUts.idMahasiswa = '{$row['idMahasiswa']}' AND dosen.idDosen = '$h'"));
    if ($nilai = $UTS['nilai'] == "") {
      $uts = "Belum Diinput";
      $tombol = "<a href='uts.php?id={$row['idMahasiswa']}' class='btn'>UTS</a>";
    } else {
      $uts = $UTS['nilai'];
      $tombol = "";
    }
  
    $UAS = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nilaiUas WHERE idMahasiswa = '{$row['idMahasiswa']}'"));
    if ($UAS['nilai'] > 75) {
      $tbl = "";
      $uas = $UAS['nilai'];
      $ket = $UAS['keterangan'];
      $edit = "";
      $style = "text-primary";
    } else if ($UAS['nilai'] == "") {
      $edit = "";
      $tbl = "<a href='uas.php?id={$row['idMahasiswa']}' class='btn'>UAS</a>";
      $uas = "Belum Diinput";
      $ket = "Belum Ditentukan";
      $style = "bg-info";
    } else if ($UAS['nilai'] <= 75) {
      $edit = "<a href='edit-uas.php?id={$row['idMahasiswa']}' class='btn'>Edit Nilai UAS</a>";
      $uas = $UAS['nilai'];
      $ket = $UAS['keterangan'];
      $style = "text-danger";
    }
    $no++;
    $tr.="
            <tr>
              <td>$no</td>
              <td>{$row['NIM']}</td>
              <td>{$row['nama']}</td>
              <td>$uts</td>
              <td>$uas</td>
              <td><span class='$style'>$ket</span></td>
              <td>
                <div class='row'>
                  $tombol
                  $tbl
                  $edit
                </div>
              </td>
            </tr>
    ";
  }
} else {
   $info = "
    <tr>
      <td colspan='100'>Data Masih Kosong!</td>
    </tr>
   ";
}

$ambilKelas = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kelas WHERE idKelas = '$id'"));
$namaKelas = $ambilKelas['namaKelas'];
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
        <p>Daftar Mahasiswa Kelas : <?= $namaKelas; ?></p>
      </div>
    </div>
    <!-- akhir card -->

    <!-- card untuk daftar mahasiswa -->
    <div class="card">
      <div class="card-body">
        <div class="row">
          <a href="daftar-kelas.php" class="btn bottom">Kembali</a>
        </div>

        <table class="table">
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>

          <?= $tr; ?>
          <?= $info; ?>
        </table>
      </div>
    </div>
    <!-- akhir card -->
  </div>
  <!-- akhir container -->

  <script src="../../public/js/script.js"></script>
</body>

</html>