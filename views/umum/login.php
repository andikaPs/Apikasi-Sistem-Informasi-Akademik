<?php 
error_reporting(0);
if ($_GET['id'] == "gagal") {
  $info = "<label class='info'>Username atau Password Salah!</label>";
}

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="dIkaps">
  <title>Login Page</title>
  <link rel="stylesheet" href="../../public/css/style.css">
  <style>
    .info {
      background: yellow; 
      color: green; 
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 5px;
      box-shadow: 3px 3px 3px rgba(0, 0, 0, .1);
    }
  </style>
</head>

<body>
  <!-- awal container -->
  <div class="container">
    <!-- awal panel -->
    <div class="panel">
      <!-- awal panel-logo -->
      <div class="panel-logo">
        <img src="../../public/images/toga.png" alt="toga png">
      </div>
      <!-- akhir panel logo -->

      <!-- awal panel-body -->
      <div class="panel-body">
        <form method="POST" action="../../component/proses_login.php" autocomplete="off">
          <?= $info; ?>
          <label for=" username">Username</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="NIM" required>

          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="4 angka terakhir NIM" required>

          <!-- <input type="submit" value="Login" class="btn"> -->
          <!-- <a href="beranda.html" class="btn">login</a> -->
          <input type="submit" value="login" class="btn">
        </form>
      </div>
      <!-- akhir panel-body -->
    </div>
    <!-- akhir panel -->
  </div>
  <!-- akhir container -->

</body>

</html>