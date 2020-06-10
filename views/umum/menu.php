<?php 
error_reporting(0);
include('../../component/koneksi.php');

$mahasiswa = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE NIM = '{$_SESSION['id']}' ");
$ambilMahasiswa = mysqli_fetch_array($mahasiswa);
if ($ambilMahasiswa['keterangan'] == "mahasiswa") {
  $menu = '
  <ul style="width: 800px;">
    <li><a href="../umum/beranda.php">Beranda</a></li>
    <li><a href="../mahasiswa/jadwal.php">Jadwal Kuliah</a></li>
    <li><a href="../mahasiswa/tentang-saya.php">Tentang Saya</a></li>
  </ul>
  ';
}

$dosen = mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '{$_SESSION['id']}' ");
$ambilDosen = mysqli_fetch_array($dosen);
if ($ambilDosen['keterangan'] == "dosen") {
  $menu = '
  <ul style="width: 800px;">
    <li><a href="../umum/beranda.php">Beranda</a></li>
    <li><a href="../dosen/daftar-kelas.php">Daftar Kelas</a></li>
    <li><a href="../dosen/jadwal.php">Jadwal Mengajar</a></li>
    <li><a href="../dosen/tentang-saya.php">Tentang Saya</a></li>
  </>
  ';
}

$admin = mysqli_query($kon, "SELECT * FROM admin WHERE username = '{$_SESSION['id']}' ");
$ambilAdmin = mysqli_fetch_array($admin);
if ($ambilAdmin['keterangan'] == 'admin') {
  $menu = '
  <ul style="width: 800px;">
    <li><a href="../umum/beranda.php">Beranda</a></li>
    <li><a href="../admin/berita.php">Berita</a></li>
    <li><a href="../admin/kelas.php">Kelas</a></li>
    <li><a href="../admin/jurusan.php">Jurusan</a></li>
    <li><a href="../admin/fakultas.php">Fakultas</a></li>
    <li><a href="../admin/mahasiswa.php">Mahasiswa</a></li>
    <li><a href="../admin/dosen.php">Dosen</a></li>
    <li><a href="../admin/jadwal.php">Jadwal</a></li>
    <li><a href="../admin/matkul.php">Mata Kuliah</a></li>
    <li><a href="../admin/tentang-saya.php">Tentang Saya</a></li>
  </ul>
  ';
}

?>