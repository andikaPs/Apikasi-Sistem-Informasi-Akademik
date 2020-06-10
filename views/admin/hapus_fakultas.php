<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM fakultas WHERE idFakultas = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'fakultas.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>