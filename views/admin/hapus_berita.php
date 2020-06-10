<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM berita WHERE idBerita = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'berita.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>