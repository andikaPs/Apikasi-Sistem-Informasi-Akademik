<?php  
  include('koneksi.php');
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  echo $username . $password;
  // cek login mahasiswa
  $mahasiswa = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE NIM = '$username' AND password = '$password'");
  $cekMahasiswa = mysqli_num_rows($mahasiswa);
  // cek login dosen
  $dosen = mysqli_query($kon, "SELECT * FROM dosen WHERE NIP = '$username' AND password = '$password' ");
  $cekDosen = mysqli_num_rows($dosen);
  // cek login admin
  $admin = mysqli_query($kon, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
  $cekAdmin = mysqli_num_rows($admin);

  if ($cekMahasiswa) {
    $_SESSION['id'] = $username;
    header('location: ../index.php');
  } else if ($cekDosen) {
    $_SESSION['id'] = $username;
    header('location: ../index.php');
  } else if ($cekAdmin) {
    $_SESSION['id'] = $username;
    header('location: ../index.php');
  } 
  else {
    header('location: ../views/umum/login.php?id=gagal');
  }

?>