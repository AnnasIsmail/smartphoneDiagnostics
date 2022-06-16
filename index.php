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
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="icon" href="img/logo.png">
</head>
<body>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="img/logo.png" alt="" width="34" height="32" class="d-inline-block align-text-top">
      Diagnosis Smartphone
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="about.php">About</a>
        <a class="nav-link" href="diagnosa.php">Diagnosa Kerusakan</a>
        <a class="nav-link" href="kerusakan.php">Daftar Kerusakan</a>
        <a class="nav-link" href="#">Login</a>
      </div>
    </div>
  </div>
</nav>


<!--   Akhir bagian Menu pada Header -->


<div class="galery">


<div class="judul">
  Selamat datang di <B>EXSYSTPHONE</b>
(Diagnosa Kerusakan Smartphone Android
berbasis Web)
 <img src="img/g1.png" height="410">

</div>

<div class="isi">
ExsystPhone merupakan Sistem Pakar kerusakan pada smartphone
Pada Android.Memudahkan orang awam dalam mengetahui kerusakan-kerusakan pada smartphone android.Serta
Memberikan solusi kepada user mengenai tindakan apa yang harus dilakukan
<br>
<br>
<br>

<a href="#" class="btn btn-info" role="button">READ MORE</a>

</div>


</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="ceklogin.php">
            <div class="form-group" method="post">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="password" placeholder="Enter username">
            </div>
            <div class="form-group" method="post">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
              <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>

        </div>
      </div>




    </div>
  </div>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<footer class="container-fluid text-center">
  <p>Copyright 2018 &copy;</p>
</footer>
</body>
</html>
