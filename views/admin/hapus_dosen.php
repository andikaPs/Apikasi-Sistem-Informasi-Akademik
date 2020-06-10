<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM dosen WHERE idDOsen = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'dosen.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>