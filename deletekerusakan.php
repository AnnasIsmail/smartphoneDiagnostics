<?php
include('koneksi.php');

$identifier = substr($_GET['id'],0 ,1);
$id = substr($_GET['id'], 1);

if($identifier === 'K'){
    $query="DELETE from kerusakan where idkerusakan='K$id'";
    mysqli_query($konek_db, $query);
    header("location:daftarkerusakan.php");
}else if($identifier === 'S'){
    $query="DELETE from caramengatasi where idsolusi='S$id'";
    mysqli_query($konek_db, $query);
    header("location:caramengatasi.php");
}else if($identifier === 'G'){
    $query="DELETE from gejala where idgejala='G$id'";
    mysqli_query($konek_db, $query);
    header("location:gejala.php");
}else if($identifier === 'D'){
    $query=$_GET['id'];
    mysqli_query($konek_db, $query);
    header("location:keputusan.php");
}
