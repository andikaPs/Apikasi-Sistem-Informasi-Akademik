<?php  

include "component/koneksi.php";
session_start();

if ($_SESSION['id'] == "") {

  header('location: views/umum/landing-page.php');

} else {
  header('location: views/umum/beranda.php');
}


?>