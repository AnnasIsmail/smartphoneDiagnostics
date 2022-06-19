<?php
include('koneksi.php');

$id = substr($_GET['id'], 1);

$query="DELETE from kerusakan where idkerusakan='K$id'";
mysqli_query($konek_db, $query);

$query="DELETE from caramengatasi where idkerusakan='S$id'";
mysqli_query($konek_db, $query);

$query="DELETE from gejala where idgejala='G$id'";
mysqli_query($konek_db, $query);

header("location:daftarkerusakan.php");
?>