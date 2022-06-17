<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/styleDiagnosa.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link rel="icon" href="img/2.png">
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


<!--   Akhir bagian Menu pada Header -->
<div class="container-fluid">


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Pilih Jenis Hp
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Pilih</a></li>
    <li><a class="dropdown-item" href="#">Android</a></li>
  </ul>
</div>
    <div class="col-sm-8 text-left">
      <center><h2>DIAGNOSA KERUSAKAN</h2></center>
        <form id="form1" name="form1" method="post" action="diagnosa.php">
				<label for="sel1">Jenis Hp</label>
				<select class="form-control" name="hp" onChange='this.form.submit();'>
				<option>Pilih</option>
                <option>ANDROID</option>
  		</select>
              </form>
       <br>
        <form id="form2" name="form2" method="post" action="diagnosa.php">
 			<?php
            if(isset($_POST['hp']))
                  if($_POST['hp']!="jenishp"){
                echo  "<br><label>Ciri Kerusakan</label><br>";
 			$tampil="select * from gejala where  jenishp= \"".$_POST['hp']."\"";
			$query= mysqli_query($konek_db,$tampil);
                while($hasil=mysqli_fetch_array($query)){
					echo "<input type='checkbox' value='".$hasil['gejala']."' name='gejala[]' /> ".$hasil['gejala']."<br>";
			}
                  }
					?>


        <br>
        <button type="submit" name ="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK Kerusakan</button><br><br>
            <div class="panel panel-info">
                <div class="panel-heading">HASIL DIAGNOSA</div>
                <div class="panel-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Kerusakan</th>
							<th>Nama Kerusakan</th>
                            <th>Jenis hp</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
         <?php
        if(isset($_POST['submit'])){
            $gejala = $_POST['gejala'];
            $jumlah_dipilih = count($gejala);
           for($x=0;$x<$jumlah_dipilih;$x++){
                       $tampil ="select DISTINCT p.idkerusakan, p.namakerusakan, p.jenishp from basispengetahuan b, kerusakan p where b.gejala='$gejala[$x]' and p.namakerusakan=b.namakerusakan group by namakerusakan";
                       $result = mysqli_query($konek_db, $tampil);
                       $hasil  = mysqli_fetch_array($result);

                    }
               echo "
                           <tr>
        			             <td>".$x."</td>
                                 <td>".$hasil['idkerusakan']."</td>
					             <td>".$hasil['namakerusakan']."</td>
                                 <td>".$hasil['jenishp']."</td>
                                 <td><a href=\"hasildiagnosa.php?id=".$hasil['idkerusakan']."\"><i class='glyphicon glyphicon-search'></i></a></td>
        		          </tr>

                               ";
        }

                ?>
                    </table>
            </div>
                    </div>
                </div>
        </form>

    </div>
  </div>
</div>


</div>



<footer class="container-fluid text-center">
  <p>Diagnosis Smartphone, Copyright 2022 &copy;</p>
</footer>

<script language="JavaScript" type="text/javascript">

function checkDiagnosa(){
    return confirm('Apakah sudah benar gejalanya?');
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>
