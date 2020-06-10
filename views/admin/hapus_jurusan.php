<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM jurusan WHERE idJurusan = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'jurusan.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>