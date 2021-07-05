<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online Based</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../asset/css/style.css" />
    <script src="../../asset/js/jquery.min.js"></script>
    <script src="../../asset/js/bootstrap.min.js"></script>
</head>
  <?php
    include "../koneksi.php";
    include "../cek-admin.php";
  ?>
<body style="background:#fff;">
	<!-- HEADER !-->
  <nav class="navbar"  style="border-bottom:2px solid #ddd; padding:15px;">
      <div class="container-fluid">
          <div class="wellcenter">
          <div class="navbar-header" style="margin-top:5px;">
            	<ul class="nav nav-tabs">
				<?php
				function kelas($angkatan) {
					include "../koneksi.php";
					$query = mysqli_query($kon, "select * from pemilih where kelas like '%$angkatan %' order by kelas asc");
					while ($row = mysqli_fetch_array($query)) {
						$nama[] = $row['kelas']; }
					$nama2 = array_unique($nama);
					$jumar2 = count($nama2);
					return $nama2;
					
				}
				?>
            		<li class="dropdown">
            			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelas X <span class="caret"></span></a>
            			<ul class="dropdown-menu">
            			<?php
            				include "../koneksi.php";
							
            				foreach(kelas("X") as $apa){
            			?>
            				<li><a href="?kelas=<?php echo $apa; ?>"><?php echo $apa; ?></a></li>
            			<?php
            				}
            			?>
            			</ul>
					</li>
            		<li class="dropdown">
            			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelas XI <span class="caret"></span></a>
            			<ul class="dropdown-menu">
            			<?php
            				include "../koneksi.php";
							
            				foreach(kelas("XI") as $apa){
            			?>
            				<li><a href="?kelas=<?php echo $apa; ?>"><?php echo $apa; ?></a></li>
            			<?php
            				}
            			?>
            			</ul>
					</li>
            		<li class="dropdown">
            			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelas XII <span class="caret"></span></a>
            			<ul class="dropdown-menu">
            			<?php
            				include "../koneksi.php";
							
            				foreach(kelas("XII") as $apa){
            			?>
            				<li><a href="?kelas=<?php echo $apa; ?>"><?php echo $apa; ?></a></li>
            			<?php
            				}
            			?>
            			</ul>
					</li>
            	</ul>
            </div>	
            <div>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="beranda.php" class="btn btn-warning"><span class="glyphicon glyphicon-log-in"></span> Back</a></li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
<!-- content !-->
<?php
	if(isset($_REQUEST['command'])){
		if($_REQUEST['command']=='unlocked' && isset($_REQUEST['kelas'])){
			$kelas = $_REQUEST['kelas'];
			@mysqli_query($kon, "UPDATE pemilih set status ='1' where kelas = '$kelas'");
		}
		elseif($_REQUEST['command']=='unlock' && isset($_REQUEST['nis'])){
			$nis = $_REQUEST['nis'];
			@mysqli_query($kon, "UPDATE pemilih set status ='1' where nis = '$nis'");
		}
		elseif($_REQUEST['command']=='lock' && isset($_REQUEST['nis'])){
			$nis = $_REQUEST['nis'];
			@mysqli_query($kon, "UPDATE pemilih set status ='0' where nis = '$nis'");
		}
	}
?>
<script type="text/javascript">
	function unlock(kelas){
		if(confirm('anda sudah yakin?')){
			document.form1.command.value='unlocked';
			document.form1.kelas.value=kelas;
			document.form1.submit();
		}
	}
	function unlock1(nis,kelas){
		if(confirm('anda sudah yakin?')){
			document.form1.command.value='unlock';
			document.form1.nis.value=nis;
			document.form1.kelas.value=kelas;
			document.form1.submit();
		}
	}
	function lock1(nis,kelas){
		if(confirm('anda sudah yakin?')){
			document.form1.command.value='lock';
			document.form1.nis.value=nis;
			document.form1.kelas.value=kelas;
			document.form1.submit();
		}
	}
</script>
<div class="well wellcenter">
	<form name="form1">
		<input type="hidden" name="command">
        <input type="hidden" name="nim">
	</form>
	<div class="floatleft">
		<h2>Validasi Pemilih</h2>
	</div>
	<div class="clearfix"></div>
	<br><br>
	<?php
	 if(!isset($_GET['kelas'])){
    	echo "pilih kelas dulu";
    }elseif(isset($_GET['kelas'])){
    	extract($_GET);
    	$kelas = $_GET['kelas'];
    	echo $kelas;
   ?>
   		<div class="floatright">
           	<input type="button" class="btn btn-warning" onclick="unlock('<?php echo $kelas; ?>')" value="Unlock All">
        </div><br><br>
		<table class="table table-hover table-bordered">
          <thead style="background:#eee;">
            <tr>
              <th width="6%">NIS</th>
              <th width="30%">Nama Pemilih</th>
              <th width="15%">Kelas</th>
              <th width="13%">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
		  	$query = mysqli_query($kon, "SELECT * FROM pemilih where kelas = '$kelas' order by nis")or die(mysqli_error($kon));
			while($hasil = mysqli_fetch_array($query)){
				$nis = $hasil['nis'];
		  ?>
          	<tr>
            	<td><?php echo $hasil['nis']; ?></td>
                <td><?php echo $hasil['nama']; ?></td>
                <td><?php echo $hasil['kelas']; ?></td>
                <td style="text-align:center">
                <?php
                	$stat = $hasil['status'];
                	if($stat == 0){
						$kelas = $_GET['kelas'];
                ?>
                <a href="javascript:unlock1('<?php echo $nis; ?>','<?php echo $kelas; ?>')" class="label label-danger">Locked</a>
                <?php
            		}elseif($stat == 1){
            	?>	
            	<a href="javascript:lock1('<?php echo $nis; ?>','<?php echo $kelas; ?>')" class="label label-success">Unlocked</a>
            	<?php
            		}
            	?>
                </td>
            </tr>
            <?php
			}
			?>
            
           </tbody>
           </table>
           <div class="floatright">
           	<input type="button" class="btn btn-warning" onclick="unlock(<?php echo $kelas ?>)" value="Unlock All">
           </div>
           <div class="clearfix"></div>
	<?php
		}else{
			echo $_GET['kelas'];
		}
	?>
</div>
</body>
</html>