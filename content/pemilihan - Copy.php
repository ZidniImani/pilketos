<?php
	include "controller/cek-session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online Based</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
</head>
<body style="background:#ddd;">
<?php
	include "controller/koneksi.php";
	$nis = $_SESSION['pemilih'];
	$queryN = mysqli_query($kon, "SELECT * FROM pemilih where nis = '$nis'")or die(mysqli_error($kon));
	$hasilN = mysqli_fetch_array($queryN);
	$nama = $hasilN['nama'];
?>
<!-- HEADER !-->
	<nav class="navbar">
    	<div class="container-fluid">
        	<div class="navbar-header" style="margin-top:-15px;">
            	<a class="navbar-brand" href="#"><img height="55px" width="170px" src="asset/img/logo.png" /></a>
            </div>
            <div>
            	<ul class="nav navbar-nav navbar-right">
                	<li><a href="#"><span class="glyphicon glyphicon-user"></span> Hai, <?php echo $nama; ?></a></li>
                </ul>
            </div>
       	</div>
    </nav>
<!-- panel -->
	<div class="alert alert-success panelpil fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<span class="glyphicon glyphicon-check"></span> Selamat datang <strong><?php echo $nama; ?></strong> pilihlah calon dengan bijak.
	</div>
<!-- grid -->

<div class="container-fluid conpil">
<?php
	include "controller/koneksi.php";
	$query = mysqli_query($kon, "SELECT * FROM calon")or die(mysqli_error($kon));
	while($hasil = mysqli_fetch_array($query)){
?>
	<div class="col-sm-6 col-md-3 col-xs-6">
		<div class="panel panel-default">
			<div class="panel-body"><a href="controller/proses-pilih.php?id=<?php echo $hasil['id']; ?>"><div class="back"><b>PILIH</b></div></a><img width="100%" height="250px;" src="asset/img/uploads/<?php echo $hasil['foto']; ?>"></div>
			<div class="panel-footer"><b><?php echo $hasil['nama']; ?></b></div>
			<div class="panel-footer"><?php echo $hasil['kelas']; ?></div>			
			<div class="panel-footer"><?php echo $hasil['moto']; ?></div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
    	$('[data-toggle="popover"]').popover();   
		});
		</script>
        
<?php
}
?>

</div>
<div class="container conlog">
      &copy; 2015-2016. Programmed and Designed by <b>XII RPL</b>
</div>
</body>
</script>
</script>
</html>