<?php
include('koneksi.php');

$query="DELETE from kerusakan where idkerusakan='".$_GET['id']."'";
mysqli_query($konek_db, $query);

$query="DELETE from caramengatasi where idkerusakan='".$_GET['id']."'";
mysqli_query($konek_db, $query);

$query="DELETE from gejala where idgejala='".$_GET['id']."'";
mysqli_query($konek_db, $query);

header("location:daftarkerusakan.php");
?>