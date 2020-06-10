<?php  
include('koneksi.php');

$_SESSION['id'] = session_destroy();
header('location: ../index.php');
?>