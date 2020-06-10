<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM mahasiswa WHERE idMahasiswa = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'mahasiswa.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>