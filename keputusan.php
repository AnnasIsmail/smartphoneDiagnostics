<?php
include('koneksi.php');

ob_start();

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
  <link rel="stylesheet" href="assets/css/styleHomeAdmin.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/detail.css?v=<?php echo time(); ?>">
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
        <a href="caramengatasi.php" class="panel-block">
          <span class="panel-icon">
            <i class="wrench large icon" aria-hidden="true"></i>
          </span>
          Cara Mengatasi
        </a>
        <a href="keputusan.php" class="panel-block is-active">
          <span class="panel-icon">
            <i class="thumbtack large icon" aria-hidden="true"></i>
          </span>
          Keputusan
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
    
    <div class="content-data-kerusakan">
      <h2 class="ui header">Daftar keputusan</h2>

      <div>
          <button class="ui active button" onclick="add()">
            <i class="user icon"></i>
            Add Data keputusan
          </button>
      </div>


      <table class="table">
  
      </table>
    </div>

</main>


<script language="JavaScript" type="text/javascript">


$(".nav-responsive").click(()=>{
  if($("nav").hasClass('slideOpen')){
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

    $('.table').empty().append(`
  <thead>
    <tr>
      <th>No</th>
      <th>ID Gejala</th>
      <th>Nama Kerusakan</th>
      <th>ID Cara Mengatasi</th>
      <th>Detail</th>
    </tr>
  </thead>

  <tbody>


  </tbody>
  
  `);

keputusan.map((data , index)=>{
    let dataKerusakan = kerusakan.find(dataCari => dataCari.id === data.idkerusakan);
  $('tbody').append(`
  
        <tr>
            <th>${index+1}</th>
            <td>${data.idgejala}</td>
            <td>${dataKerusakan.namaKerusakan}</td>
            <td>${data.idsolusi}</td>
            <td style="min-width: 120px" ><form method="post"><a href=\"detaildata.php?id=${data.idkerusakan}" ><i class="eye icon"></i></a> | <a href=\"deletekerusakan.php?id=DELETE FROM keputusan WHERE idgejala='${data.idgejala}' and idkerusakan='${data.idkerusakan}' and idsolusi='${data.idsolusi}'" onclick='return checkDelete()' ><i class="trash icon"></i></a> </form></td>
          </tr>
    
        `);
})

function checkDelete(data){
    return confirm('Yakin menghapus data ini?');
}

function add(){
  $('.table').empty();
  $(".content-data-kerusakan").empty().append(`      
    <h2 class="ui header">Tambah Data Kerusakan</h2>
    <form method="post">
      <div class="col-sm-8 text-left">
            <div > 
                <label class="control-label label-id">Gejala : </label>
                <div class="control has-icons-left">
                <div class="select">
                <select class="dropdown" onchange="onchangeGejala()"  id="selectGejala">
                <option selected>Pilih Gejala</option>
                </select>
                </div>
                <div class="icon is-small is-left">
                <i class="large paw icon"></i>
                </div>
                <div class="gejala"></div>
                </div>
            </div>
            <div > 
                <label class="control-label label-id">Kerusakan : </label>
                <div class="control has-icons-left">
                <div class="select">
                    <select class="dropdown" onchange="onchangeKerusakan()" id="selectKerusakan">
                    <option selected>Pilih Kerusakan</option>
                    </select>
                </div>
                <div class="icon is-small is-left">
                    <i class="large bug icon"></i>
                </div>
                </div>
            </div>
            <div > 
                <label class="control-label label-id">Cara Mengatasi : </label>
                <div class="control has-icons-left">
                <div class="select">
                    <select class="dropdown" onchange="onchangeCaraMengatasi()" id="selectSolusi">
                    <option selected>Pilih Solusi</option>
                    </select>
                </div>
                <div class="cara-mengatasi"></div>
                <div class="icon is-small is-left">
                    <i class="large wrench icon"></i>
                </div>
                </div>
            </div>
            <div class="container-button">
                <button class="ui button" onclick="location.reload()">
                    Discard
                </button>
                <button  id="submitAdd" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
        <input type="text" id="idKerusakan" name="idKerusakan" value="kosong" hidden>
        <input type="text" id="idGejala" name="idGejala" value="kosong" hidden>
        <input type="text" id="idSolusi" name="idSolusi" value="kosong" hidden>
      </form>`
  );

  gejala.map((data , index)=>{
    $("#selectGejala").append(`<option>${data.id}</option>`);
  })

  kerusakan.map((data , index)=>{
    $("#selectKerusakan").append(`<option>${data.namaKerusakan}</option>`);
  });

  caraMengatasi.map((data , index)=>{
    $("#selectSolusi").append(`<option>${data.id}</option>`);
  });
}

function onchangeCaraMengatasi(){
    let value = document.getElementById("selectSolusi").value;
    let dataCaraMengatasi = caraMengatasi.find(data => data.id === value);
    $(".cara-mengatasi").empty().append(`<textarea class='form-control' rows="4">${dataCaraMengatasi.caraMengatasi}</textarea> `);
    document.getElementById("idSolusi").value = value

    onchangeField()
}

function onchangeKerusakan(){
    let value = document.getElementById("selectKerusakan").value;
    let dataKerusakan = kerusakan.find(dataKeru => dataKeru.namaKerusakan === value);
    document.getElementById("idKerusakan").value = dataKerusakan.id

    onchangeField()
}

function onchangeGejala(){
    let value = document.getElementById("selectGejala").value;
    let dataGejala = gejala.find(data => data.id === value);
    $(".gejala").empty().append(`<textarea class='form-control' rows="2">${dataGejala.gejala}</textarea> `);
    document.getElementById("idGejala").value = value

    onchangeField()
}

function onchangeField(){
    let valueCaraMengatasi = document.getElementById("idSolusi").value;
    let valueKerusakan = document.getElementById("idKerusakan").value;
    let valueGejala = document.getElementById("idGejala").value;
   
    if(valueCaraMengatasi.startsWith("S") === true && valueKerusakan.startsWith("K") === true && valueGejala.startsWith("G") === true){
        keputusan.map((data , index)=>{
            if(data.idgejala === valueGejala && data.idkerusakan === valueKerusakan && data.idsolusi === valueCaraMengatasi){
                $("#submitAdd").attr("name", "cancelAdd");
                $("#submitAdd").attr("type", "button");
            }else{
                $("#submitAdd").attr("name", "add");
                $("#submitAdd").attr("type", "submit");
            }
        });
    }
}

</script>

<?php

  if(isset($_POST['delete'])){

    $id = $_POST['id'];
    $namaKerusakan = $_POST['nama-kerusakan'];

    $query1=$query1="update keputusan SET namakerusakan='".$_POST['nama-kerusakan']."' WHERE idkerusakan='$id'";
    mysqli_query($konek_db, $query1);

                    
    header('location: keputusan.php');
  }

  
  if(isset($_POST['add'])){

    $query1="INSERT INTO keputusan VALUES ( '".$_POST['idGejala']."','".$_POST['idKerusakan']."','".$_POST['idSolusi']."')";
    mysqli_query($konek_db, $query1);
                    
    header('location: keputusan.php');
  }


?>

<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>