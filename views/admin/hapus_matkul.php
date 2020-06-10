<?php 
include('../../component/koneksi.php');
$id = $_GET['id'];
$h = mysqli_query($kon, "DELETE FROM mataKuliah WHERE idMatkul = '$id'");
if ($h) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      window.location.href = 'matkul.php';
    </script>
  ";
} else {
  echo "gagal";
}

?>