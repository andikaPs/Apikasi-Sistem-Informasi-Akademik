<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM jadwalPelajaran WHERE idJadwal = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'jadwal.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>