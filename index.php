<?php

  include('koneksi.php');
  if(isset($_SESSION['login_user'])){
  header("location: about.php");
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Diagnosis Smartphone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<link rel="icon" href="img/logo.png">
</head>
<body>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="img/logo-navbar.png" alt="" width="28" height="30" class="d-inline-block align-text-top">
      Diagnosis Smartphone
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="conatctUs.php">Contact Us</a>
        <a class="nav-link" href="diagnosa.php">Diagnosa Kerusakan</a>
        <a class="nav-link" href="kerusakan.php">Daftar Kerusakan</a>
        <a class="nav-link" href="login.php">Login</a>
      </div>
    </div>
  </div>
</nav>


<main class="main-home">
<div class="ui sizer vertical segment">
  <div class="ui huge header">Selamat Datang di Diagnosis Smartphone</div>
  <p>Diagnosisi Smartphone merupakan Sistem Pakar kerusakan pada smartphone Pada Android.Memudahkan orang awam dalam mengetahui kerusakan-kerusakan pada smartphone android.Serta Memberikan solusi kepada user mengenai tindakan apa yang harus dilakukan</p>
</div>
<img src="img/home pict.png">
</main>



</script>
<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
