<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}

echo"<script>var kerusakan = [];</script>";

$queryKerusakan ="select * from kerusakan";
$getDataKerusakan = mysqli_query($konek_db,$queryKerusakan);
while(  $hasil = mysqli_fetch_row($getDataKerusakan)){
  echo"<script>kerusakan.push({id:'$hasil[0]',namaKerusakan:'$hasil[1]',jenishp:'$hasil[2]'})</script>";
}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        <a href="daftarkerusakan.php" class="panel-block is-active">
          <span class="panel-icon">
            <i class="icon bug large" aria-hidden="true"></i>
          </span>
          Kerusakan
        </a>
        <a href="gejala.php" class="panel-block">
          <span class="panel-icon">
            <i class="stethoscope large icon" aria-hidden="true"></i>
          </span>
          Ciri Kerusakan
        </a>
        <a href="basispengetahuan.php" class="panel-block">
          <span class="panel-icon">
            <i class="book icon large" aria-hidden="true"></i>
          </span>
          Basis Pengetahuan
        </a>
        <a href="caramengatasi.php" class="panel-block">
          <span class="panel-icon">
            <i class="first aid large icon" aria-hidden="true"></i>
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

    <div class="content-data-kerusakan">
      <h2 class="ui header">Daftar Kerusakan</h2>

      <div>
        <button class="ui active button">
          <i class="user icon"></i>
          Add Data kerusakan
        </button>
      </div>

      <table class="table">
  
      </table>
    </div>

    

</main>


<script language="JavaScript" type="text/javascript">
    $('.table').empty().append(`
  <thead>
    <tr>
      <th>No</th>
      <th>ID Kerusakan</th>
      <th>Nama Kerusakan</th>
      <th>Jenis HP</th>
      <th>Detail</th>
    </tr>
  </thead>

  <tbody>


  </tbody>
  `);

kerusakan.map((data , index)=>{
  $('tbody').append(`
        <tr>
            <th>${index+1}</th>
            <td>${data.id}</td>
            <td>${data.namaKerusakan}</td>
            <td>${data.jenishp}</td>
            <td><a href=\"hasildiagnosa.php?id=${data.id}">Lihat Detail</a></td>
          </tr>
        `);
})


</script>

<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
