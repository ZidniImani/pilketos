<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    include "../koneksi.php";
    include "../cek-admin.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online Based</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../asset/css/style.css" />
    <script src="../../asset/js/jquery.min.js"></script>
    <script src="../../asset/js/bootstrap.min.js"></script>
</head>
<body>
<!-- HEADER !-->
	<nav class="navbar">
    	<div class="container-fluid">
        <div class="wellcenter">
        	<div class="navbar-header" style="margin-top:-15px;">
            	<a class="navbar-brand" href="#"><img height="55px" width="170px" src="../../asset/img/logo.png" /></a>
            </div>
            <div>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="beranda.php" class="btn btn-warning"><span class="glyphicon glyphicon-log-in"></span> Back</a></li>
                </ul>
            </div>
        </div>
       	</div>
    </nav>
<?php
    if(isset($_REQUEST['command'])){
        if($_REQUEST['command']=='clear'){
            @mysqli_query($kon, "UPDATE pilihan set validasi ='1'");
            header('location:cek-pemilih.php');
        }
    }
?>
<script type="text/javascript">
    function cleardata(){
        if(confirm('baginda sudah yakin?')){
            document.form1.command.value='clear';
            document.form1.submit();
        }
    }
</script>
<!-- Content !-->
<div class="well wellcenter">
    <form name="form1">
        <input type="hidden" name="command">
    </form>
    <h3 style="color:#09f">Cek Keberhasilan Pemilih</h3><br>
    <?php
        $query = mysqli_query($kon, "SELECT * FROM pilihan where validasi = '0'")or die(mysqli_error($kon));
        $jmlh = mysqli_num_rows( $query);
        if($jmlh < 1){
            echo "Tunggu data masuk";
        }elseif($jmlh>0){
        ?>
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
            while($hasil = mysqli_fetch_array($query)){
                $nis = $hasil['nis'];
                $ceknama = mysqli_query($kon, "SELECT * FROM pemilih where nis = '$nis'") or die(mysqli_error($kon));
                $cek = mysqli_fetch_array($ceknama);
    ?>
            <tr>
                <td><?php echo $cek['nis']; ?></td>
                <td><?php echo $cek['nama']; ?></td>
                <td><?php echo $cek['kelas']; ?></td>
                <td style="text-align:center"><a href="lock.php" class="label label-success">Sukses</a></td>
            </tr>
    <?php
            }
    ?>
        </tbody>
        </table><br>
        <div class="floatright">
            <input type="button" class="btn btn-warning" onclick="cleardata()" value="Clear All">
        </div>
        <div class="clearfix"></div>
    <?php
        }
    ?>
</div>