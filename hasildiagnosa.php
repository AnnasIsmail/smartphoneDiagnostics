<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}

$identifier = substr($_GET['id'],0 ,1);
  echo"<script>var id='$identifier'</script>";
  $id = substr($_GET['id'], 1);

$idkerusakan = $_GET['id'];
$idgejala = [];
$idsolusi = "";

if($identifier === 'S'){
    $querySolusi ="select * from keputusan where idsolusi = '".$_GET['id']."'";
    $getDataSolusi = mysqli_query($konek_db,$querySolusi);
    while(  $hasil = mysqli_fetch_row($getDataSolusi)){
      $idkerusakan = $hasil[1];
    }
}else if($identifier === 'G'){
  $querySolusi ="select * from keputusan where idgejala = '".$_GET['id']."'";
  $getDataSolusi = mysqli_query($konek_db,$querySolusi);
  while(  $hasil = mysqli_fetch_row($getDataSolusi)){
    $idkerusakan = $hasil[1];
  }
}



$querySolusi ="select * from keputusan where idkerusakan = '$idkerusakan'";
$getDataSolusi = mysqli_query($konek_db,$querySolusi);
while(  $hasil = mysqli_fetch_row($getDataSolusi)){
  array_push($idgejala,$hasil[0]);
  $idkerusakan = $hasil[1];
  $idsolusi = $hasil[2];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diagnosis Smartphone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/detail.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
          <a class="nav-link" href="index.php">Home</a>
          <a class="nav-link" href="conatctUs.php">Contact Us</a>
          <a class="nav-link " aria-current="page" href="diagnosa.php">Diagnosa Kerusakan</a>
          <a class="nav-link" href="kerusakan.php">Daftar Kerusakan</a>
          <a class="nav-link" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>

<main>

    <!-- Kanan -->
    
    <div class="col-sm-8 text-left">
      <h2 class="ui header"></h2>
      <div class="form-group"  method="POST">
      			<label class="control-label label-id">ID :</label>
      		<div >
                <?php
                       echo "<input type='text'  class='form-control' id='idkerusakan' readonly value='$idkerusakan'>";
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<label class="control-label">Nama Kerusakan :</label>
      		<div >
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='$idkerusakan'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='namakerusakan' readonly value='".$data['namakerusakan']."'>";
                    }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<label class="control-label">Gejala :</label>
      		<div >
                <?php
                      foreach($idgejala as $id){
                        $tampil = "SELECT * FROM gejala where idgejala='$id'";
                        $sql = mysqli_query ($konek_db,$tampil);
                        while($data = mysqli_fetch_array ($sql))
                     {
                        echo "<input type='text'  class='form-control' id='namakerusakan' readonly value='".$data['gejala']."'>";
                     }
                      }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<label class="control-label">Cara Mengatasi :</label>
      		<div >
                <?php
                       $tampil = "SELECT * FROM caramengatasi where idsolusi='$idsolusi'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<textarea type='text' rows=4 class='form-control' id='namakerusakan' readonly >".$data['caramengatasi']."</textarea";
                    }
                ?>
     		 </div>
        </div>
      </div>


  </main>


<script>

$(".nav-responsive").click(()=>{
  console.log($(".nav").hasClass('slideOpen'))
  if($("nav").hasClass('slideOpen')){
    console.log('masuk')
    $("nav").removeClass('slideOpen');
    $(".nav-responsive").removeClass('slideOpenGagang');

    $("nav").addClass('slideClosed');
    $(".nav-responsive").addClass('slideClosedGagang');
  }else{

    $("nav").removeClass('slideClosed');
    $(".nav-responsive").removeClass('slideClosedGagang');

    $("nav").addClass('slideOpen');
    $(".nav-responsive").addClass('slideOpenGagang');
  }
});

  if(id.startsWith("K")){
    $(".header").html("Detail Kerusakan");
    $(".label-id").html("ID Kerusakan :");

  }else  if(id.startsWith("G")){
    $(".header").html("Detail Gejala");
    $(".label-id").html("ID Gejala :");

  }else  if(id.startsWith("S")){
    $(".header").html("Detail Cara Mengatasi");
    $(".label-id").html("ID Cara Mengatasi :");

  }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<footer>
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

</body>
</html>
