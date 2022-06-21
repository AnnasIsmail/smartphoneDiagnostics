<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}

echo"<script>var gejala = [];var kerusakan = []; var caraMengatasi = []; var keputusan = [];</script>";


$queryGejala ="select * from gejala";
$getDataGejala = mysqli_query($konek_db,$queryGejala);
while(  $hasil = mysqli_fetch_row($getDataGejala)){
  echo"<script>gejala.push({id:'$hasil[0]',gejala:'$hasil[1]'})</script>";
}

$queryKerusakan ="select * from kerusakan";
$getDataKerusakan = mysqli_query($konek_db,$queryKerusakan);
while(  $hasil = mysqli_fetch_row($getDataKerusakan)){
  echo"<script>kerusakan.push({id:'$hasil[0]',namaKerusakan:'$hasil[1]'})</script>";
}

$queryCaraMengatasi ="select * from caramengatasi";
$getDataCaraMengatasi = mysqli_query($konek_db,$queryCaraMengatasi);
while(  $hasil = mysqli_fetch_row($getDataCaraMengatasi)){
  echo"<script>caraMengatasi.push({id:'$hasil[0]',caraMengatasi:'$hasil[1]'})</script>";
}

$querySolusi ="select * from keputusan";
$getDataSolusi = mysqli_query($konek_db,$querySolusi);
while(  $hasil = mysqli_fetch_row($getDataSolusi)){
  echo"<script>keputusan.push({idgejala:'$hasil[0]',idkerusakan:'$hasil[1]',idsolusi:'$hasil[2]'})</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/styleDiagnosa.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        <a class="nav-link active" aria-current="page" href="diagnosa.php">Diagnosa Kerusakan</a>
        <a class="nav-link" href="kerusakan.php">Daftar Kerusakan</a>
        <a class="nav-link" href="login.php">Login</a>
      </div>
    </div>
  </div>
</nav>

<main class="main-diagnosa">
  <h1 class="ui header">Diagnosa Kerusakan</h1>
  <!-- <div>

    <div class="control has-icons-left">
  <div class="select">
    <select class="dropdown" onchange="showCiriKerusakan()" id="selectJenisHP">
      <option selected>Pilih Jenis Handphone</option>
      <option>Android</option>
    </select>
  </div>
  <div class="icon is-small is-left">
    <i class="large mobile icon"></i>
  </div>
</div>
  </div> -->

  <div class="ciri-kerusakan">

  </div>

  <table class="table">


</table>

</main>


<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

<script>

let indexChooseTrue = [];

function changeCheckbox(id){
  var checkedValue = $(`#ciriKerusakan${id}:checked`).val();
  if (checkedValue === 'on'){
    indexChooseTrue.push(id);
  }else if(checkedValue === undefined){
    indexSementara = [];
    indexChooseTrue.map((data , index)=>{
      if (data !== id){
        indexSementara.push(data);
      }
    })
    indexChooseTrue = [];
    indexChooseTrue = indexSementara;
  }
}

function showCiriKerusakan(){
  $('.table').empty();
  $('.ciri-kerusakan').empty();
  indexChooseTrue = [];
  // let selectJenisHP = document.getElementById('selectJenisHP').value
  // if(selectJenisHP !== "Pilih Jenis Handphone"){

  $('.ciri-kerusakan').empty().append(`    
  <h4 class="ui header">Ciri Kerusakan</h4>
    <div class="content-ciri-kerusakan">

    </div>
    <button class="button is-link" onclick="showTable()">Cek Kerusakan</button>
    `);

  gejala.map((data , index)=>{
    // if(data.jenishp === selectJenisHP){
      $(".content-ciri-kerusakan").append(`
        <div class="form-check form-switch">
          <input class="form-check-input" onchange="changeCheckbox('${data.id}')" type="checkbox" role="switch" id="ciriKerusakan${data.id}">
          <label class="form-check-label" for="ciriKerusakan${data.id}">${data.gejala}</label>
        </div>
      `);
    // }
  })

// }

}

showCiriKerusakan();

function showTable(){

  $('.ciri-kerusakan').empty().append(`    
  <h4 class="ui header">Ciri Kerusakan</h4>
    <div class="content-ciri-kerusakan">

    </div>
    <button class="button is-link" onclick="showTable()">Cek Kerusakan</button>
    `);


    $('.table').empty().append(`
  <thead>
    <tr>
      <th>No</th>
      <th>ID Kerusakan</th>
      <th>Nama Kerusakan</th>
      <th>Detail</th>
    </tr>
  </thead>

  <tbody>


  </tbody>
  `);


    indexChooseTrue.map((dataIndex , index)=>{
      let data = gejala.find(data=> data.id===dataIndex);
      $(".content-ciri-kerusakan").append(`
      <div class="form-check form-switch">
        <input class="form-check-input" onchange="changeCheckbox('${data.id}')" type="checkbox" role="switch" id="ciriKerusakan${data.id}" checked disabled>
        <label class="form-check-label" for="ciriKerusakan${data.id}">${data.gejala}</label>
      </div>
    `);
    console.log(keputusan);
    let dataKeputusan = keputusan.find(dataKepu => dataKepu.idgejala === dataIndex);
    console.log(dataKeputusan)
    let dataKerusakan = kerusakan.find(dataKeru => dataKeru.id === dataKeputusan.idkerusakan);
        $('tbody').append(`
        <tr>
            <th>${index+1}</th>
            <td>${dataKerusakan.id}</td>
            <td>${dataKerusakan.namaKerusakan}</td>
            <td><a href=\"hasildiagnosa.php?id=${dataKerusakan.id}">Lihat Detail</a></td>
          </tr>
        `);

    })




}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
