<?php  

switch ($_GET['link']) {
  // link untuk umum
  case 'beranda':
    include('views/umum/beranda.php');
    break;

  case 'prosesLogin': 
    include('component/proses_login.php');
  break;

  case 'logout':
    include('koneksi.php');
    $_SESSION['id'] = session_destroy();
    header('location: index.php');
    break;

  // link untuk dosen
  case 'jadwal':
    include('views/dosen/jadwal.php');
    break;
  
  case 'daftar-kelas':
    include('views/dosen/daftar-kelas.php');
    break;
  
  case 'daftar-mahasiswa?id=1': 
    
    include('views/dosen/daftar-mahasiswa.php');
    break;

  case 'tentangDosen':
    include('views/dosen/tentang-saya.php');
    break;
}

?>