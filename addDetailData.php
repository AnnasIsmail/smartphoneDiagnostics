<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}

$lastIndex = 0;

$queryKerusakan ="select * from kerusakan";
$getDataKerusakan = mysqli_query($konek_db,$queryKerusakan);
while(  $hasil = mysqli_fetch_row($getDataKerusakan)){
  $lastIndex = substr($hasil[0] , 1);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diagnosis Smartphone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/styleHomeAdmin.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/detail.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="icon" href="img/logo.png">
</head>
<body>

<main>
  <nav class="panel is-link">
      <div>
        <p class="panel-heading">
          <!-- Hello, <?php echo $login_session; ?> -->
          Hello Admin

        </p>
      
        <a href="homeadmin.php" class="panel-block">
          <span class="panel-icon">
            <i class="icon home large" aria-hidden="true"></i>
          </span>
          Beranda
        </a>
        <a href="daftarkerusakan.php" class="panel-block">
          <span class="panel-icon">
            <i class="icon bug large" aria-hidden="true"></i>
          </span>
          Kerusakan
        </a>
        <a href="gejala.php" class="panel-block">
          <span class="panel-icon">
            <i class="paw large icon" aria-hidden="true"></i>
          </span>
          Gejala
        </a>
        <a href="basispengetahuan.php" class="panel-block">
          <span class="panel-icon">
            <i class="book icon large" aria-hidden="true"></i>
          </span>
          Basis Pengetahuan
        </a>
        <a href="caramengatasi.php" class="panel-block">
          <span class="panel-icon">
            <i class="wrench large icon" aria-hidden="true"></i>
          </span>
          Cara Mengatasi
        </a>
      </div>
    
      <div class="panel-block log-out">
        <button class="button is-link is-outlined is-fullwidth" onclick="document.getElementById('gotoHome').click()">
          Log Out
        </button>
        <a href="index.php" id="gotoHome"></a>
      </div>
    </nav>

    <div class="nav-responsive">
    <i class="bordered list alternate icon large link"></i>
    </div>

    <!-- Kanan -->
    <form method="post">
    
    <div class="col-sm-8 text-left">
      <h2 class="ui header">Create New Data</h2>
        <div class="form-group"  method="POST">
      			<label class="control-label">Nama Kerusakan :</label>
      		<div >
                <input type='text'  class='form-control' name='nama-kerusakan' id='namakerusakan'>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<label class="control-label">Gejala :</label>
      		<div >
                <input type='text'  class='form-control' name='gejala' id='namakerusakan'>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<label class="control-label">Cara Mengatasi :</label>
      		<div >
                <textarea type='text' rows=6 class='form-control' name='cara-mengatasi' id='namakerusakan' ></textarea>
     		 </div>
        </div>
        
        <div class="container-button">
          <button class="ui button">
            Discard
          </button>
        <button type="submit" name ="submit" class="btn btn-primary">
              Save
          </button>
        </div>
        </div>
        </form>


  </main>

  <?php
  
    if(isset($_POST['submit'])){

      $namaKerusakan = $_POST['nama-kerusakan'];
      $gejala = $_POST['gejala'];
      $caraMengatasi = $_POST['cara-mengatasi'];

      $query1="INSERT INTO kerusakan VALUES ( 'K$lastIndex+1','".$_POST['nama-kerusakan']."')";
      mysqli_query($konek_db, $query1);

      $query="INSERT INTO gejala VALUES ('G$lastIndex+1','".$_POST['gejala']."')";
      mysqli_query($konek_db, $query);

      $query2="INSERT INTO caramengatasi VALUES ('S$lastIndex+1','".$_POST['cara-mengatasi']."')";
      mysqli_query($konek_db, $query2);
                      
      header('location:gejala.php');
    }
  ?>

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

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

</body>
</html>
