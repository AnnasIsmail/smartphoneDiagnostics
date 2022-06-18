<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/styleHomeAdmin.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">


<link rel="icon" href="img/logo.png">
</head>
<body>

<main>
  <nav class="panel is-link">
    <div>
      <p class="panel-heading">
        Hello, <?php echo $login_session; ?>
      </p>
    
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="icon home large" aria-hidden="true"></i>
        </span>
        Beranda
      </a>
      <a class="panel-block">
        <span class="panel-icon">
          <i class="icon bug large" aria-hidden="true"></i>
        </span>
        Kerusakan
      </a>
      <a class="panel-block">
        <span class="panel-icon">
          <i class="stethoscope large icon" aria-hidden="true"></i>
        </span>
        Ciri Kerusakan
      </a>
      <a class="panel-block">
        <span class="panel-icon">
          <i class="book icon large" aria-hidden="true"></i>
        </span>
        Basis Pengetahuan
      </a>
      <a class="panel-block">
        <span class="panel-icon">
          <i class="first aid large icon" aria-hidden="true"></i>
        </span>
        Cara Mengatasi
      </a>
    </div>
  
    <div class="panel-block log-out">
      <button class="button is-link is-outlined is-fullwidth">
        Log Out
      </button>
    </div>
  </nav>

  <div>

  </div>
</main>



<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="homeadmin.php"><button type="button" class="btn btn-primary btn-block active">BERANDA</button></a></p>
      <p><a href="daftarkerusakan.php"><button type="button" class="btn btn-primary btn-block">KERUSAKAN</button></a></p>
      <p><a href="gejala.php"><button type="button" class="btn btn-primary btn-block">CIRI KERUSAKAN</button></a></p>
        <p><a href="basispengetahuan.php"><button type="button" class="btn btn-primary btn-block">BASIS PENGETAHUAN</button></a></p>
      <br><br><br><br><br><br><br><br><br><br>
      <p><a href="logout.php"><button type="button" class="btn btn-primary btn-block" id="myBtn">LOGOUT</button></a></p>
    </div>
    <div class="col-sm-8 text-left">
       <center><h2>SISTEM PAKAR DIAGNOSA KERUSAKAN SMARTPHONE ANDROID
</h2></center><br>
      <p>Selamat datang <?php echo $login_session; ?>.Silahkan pilih menu yang diinginkan</p>
    </div>
  </div>
</div> -->

<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

</body>
</html>
