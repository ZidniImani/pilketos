<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include "../koneksi.php";
    include "../cek-admin.php";
  ?>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../asset/css/bootstrap.min.css" />
  <script src="../../asset/js/jquery.min.js"></script>
  <script src="../../asset/js/bootstrap.min.js"></script><style>
  body {
      position: relative;
  }
  .well{
    background: #fff;
    border:1px solid #ccc;
    margin-top: 20px;
  }
  th{
    text-align: center;
  }
  h2{
    color:#09f;
  }
  ul.nav-pills {
      top: 80px;
      position: fixed;
      padding: 50px;
  }
  div.col-sm-9 div {
      height: auto;
  }
  @media screen and (max-width: 810px) {
    #section1, #section2, #section3, #section41, #section42  {
        margin-left: 150px;
    }
  }
  </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
<!-- HEADER !-->
  <nav class="navbar"  style="border-bottom:2px solid #ddd; padding:15px;">
      <div class="container-fluid">
          <div class="navbar-header" style="margin-top:-15px;">
            	<a class="navbar-brand" href="#"><img height="55px" width="170px" src="../../asset/img/logo.png" /></a>
            </div>
            <div>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="../logout.php" class="btn btn-warning"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!-- nav -->
<div class="container" style="border:2px solid #ddd;">
  <div class="row" >
    <nav class="col-sm-3" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#section2">Option Calon</a></li>
        <li><a href="#section3">Option Pemilih</a></li>
        <li><a href="#section4">About</a></li>
      </ul>
    </nav>
    <!-- Overview -->
    <div class="col-sm-9">
      <div class="well">
      <div id="section1">    
      	<a style="float:right; margin-top:5px;" href="f-dashboard.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Live Statistik</a>
        <h2>Perolehan Suara</h2>
        <p>Data diurutkan dari suara terbanyak</p>
        <br>
          <table class="table table-hover table-bordered">
          <thead style="background:#eee;">
            <tr>
              <th width="10%">NIS</th>
              <th width="70%">Nama</th>
              <th width="20%">Total Suara</th>
            </tr>
          </thead>
          <tbody>
    <?php
      $query = mysqli_query($kon, "SELECT * FROM calon order by vote DESC")or die(mysqli_error($kon));
      while($hasil = mysqli_fetch_array($query)){
    ?> 
            <tr>
              <td><?php echo $hasil['nis']; ?></td>
              <td><?php echo $hasil['nama']; ?></td>
              <td><center><?php echo $hasil['vote']; ?> <span class="label label-success"> Suara</span></center></td>
            </tr>
    <?php
      }
    ?>
          </tbody>
          </table><br>
        <h2>Statistik Suara</h2>
        <p>Hasil ini merupakan perhitungan dari suara yang sudah masuk</p><br>
        <table class="table table-hover table-bordered">
          <thead style="background:#eee;">
            <tr>
              <th width="40%">Nama</th>
              <th colspan="2">Statistik</th>
            </tr>
          </thead>
          <tbody>
        </tbody>
      <?php
        $query = mysqli_query($kon, "SELECT * FROM calon order by NIS DESC")or die(mysqli_error($kon));
        $query2 = mysqli_query($kon, "SELECT * FROM pilihan")or die(mysqli_error($kon));
        $query3 = mysqli_query($kon, "SELECT * FROM pemilih")or die(mysqli_error($kon));
        $jmlh = mysqli_num_rows( $query2);
        $jmlh2 = mysqli_num_rows( $query3);
        $sisa = $jmlh2-$jmlh;
        while($hasil = mysqli_fetch_array($query)){
        if($jmlh>0){
          $present = number_format(($hasil['vote']/$jmlh)*100,2);
        }else{
          $present = 0;
        }
      ?> 
            <tr>
              <td><?php echo $hasil['nama']; ?></td>
              <td>
                <div class="progress">
                  <div class="progress-bar progress-bar-info" role="progressbar" 
                  aria-valuenow="<?php echo $present; ?>"  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $present; ?>%">
                <?php echo $present; ?>%
                </div>

              </td>
              <td width="10%"><span class="label label-success"><?php echo $present; ?>%</span></td>
            </tr>
      <?php
        }
      ?>
          </tbody>
        </table>
        <div class="panel panel-warning" style="width:20%; float:left;">
          <div class="panel-heading">Total Suara</div>
          <div class="panel-body"><center><?php echo $jmlh ?> Suara</center></div>
        </div>
        <div class="panel panel-warning" style="width:20%; float:left; margin-left:20px;">
          <div class="panel-heading">Sisa Suara</div>
          <div class="panel-body"><center><?php echo $sisa ?> Suara</center></div>
        </div>
        <a style="float:right; margin-top:30px;" onClick="return confirm('Kamu yakin?')" href="resethasil.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span> Reset</a>
      <div style="clear:both;"></div>
      </div>
      </div>
      <!-- CALON CALON CALON -->
      <div class="well">
      <div id="section2"> 
      <a style="float:right; margin-top:5px;" data-toggle="modal" data-target="#tambahcalon" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Tambah Calon</a>
        <h2>Daftar Caketos</h2>
        <p>Tambah, edit dan delete Calon</p><br>
        <table class="table table-hover table-bordered">
          <thead style="background:#eee;">
            <tr>
              <th width="6%">NIS</th>
              <th width="30%">Nama Caketos</th>
              <th width="15%">Kelas</th>
              <th width="26%">Motto</th>
              <th width="13%">Opsi</th>
            </tr>
          </thead>
          <tbody>
          <?php
		  	$query = mysqli_query($kon, "SELECT * FROM calon order by nis")or die(mysqli_error($kon));
			while($hasil = mysqli_fetch_array($query)){
		  ?>
          	<tr>
            	<td><?php echo $hasil['nis']; ?></td>
                <td><?php echo $hasil['nama']; ?></td>
                <td><?php echo $hasil['kelas']; ?></td>
                <td><?php echo $hasil['moto']; ?></td>
                <td style="text-align:center"><a href="update.php?id=calon&nis=<?php echo $hasil['nis']; ?>" class="label label-primary">Edit</a> ||
                <a onClick="return confirm('Yakin menghapus data calon?')" href="delete.php?id=calon&nis=<?php echo $hasil['nis']; ?>" class="label label-danger">Hapus</a>
                
                </td>
            </tr>
            <?php
			}
			?>
            
           </tbody>
           </table>
        
      </div>        
      </div>
      <div class="well">
      <div id="section3"> 
      	<a style="float:right; margin-top:5px;" data-toggle="modal" data-target="#tambahpemilih" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Tambah Pemilih</a>          
        <h2>Option Pemilih</h2>
        <p>Tambah dan hapus pemilih</p><br>
        <table class="table table-hover table-bordered">
          <thead style="background:#eee;">
            <tr>
              <th width="6%">NIS</th>
              <th width="30%">Nama Caketos</th>
              <th width="15%">Kelas</th>
              <th width="13%">Opsi</th>
            </tr>
          </thead>
          <tbody>
          <?php
		  	$batas = 10;
			$waaquery = mysqli_query($kon, "SELECT * FROM pemilih")or die(mysqli_error($kon));
			$jmlhdata = mysqli_num_rows( $waaquery);
			$jmlhalaman = ceil($jmlhdata / $batas);
			
			$hal = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
			$posisi = ($hal - 1) * $batas;
			$query = mysqli_query($kon, "SELECT * FROM pemilih order by nis LIMIT $posisi, $batas");
			#echo $posisi;
			while($hasil = mysqli_fetch_array($query)){
				
		  ?>
          	<tr>
            	<td><?php echo $hasil['nis']; ?></td>
                <td><?php echo $hasil['nama']; ?></td>
                <td><?php echo $hasil['kelas']; ?></td>
                <td style="text-align:center">
                <a onClick="return confirm('test')" href="delete2.php?id=calon&nis=<?php echo $hasil['nis']; ?>" class="label label-danger">Hapus</a>
                </td>
            </tr>
            <?php
			}
			?>
            
           </tbody>
           </table>
           <ul class="pagination pagination-lg">
			<li><a href="?hal=1#section3"><b><<</a></b></li>
           <?php
		   #echo prev
			if ($hal > 1) {
				$prev = $hal - 1;
				echo '<li><a href="?hal='.$prev.'#section3"><b><</a></b></li>';
			}
			
			for ($x = ($hal - 3); $x < (($hal + 3) + 1); $x++) {
				if (($x > 0) AND ($x <= $jmlhalaman)) {
					if ($x == $hal) {
						echo "<li class=active><a href='?hal=$x#section3'><b>$x</a></b></li>";
					} else {
						echo "<li><a href='?hal=$x#section3'><b>$x</b></a></li>";
					}
				}
			}
			
			if ($hal != $jmlhalaman) {
				$next = $hal + 1;
				echo '<li><a href="?hal='.$next.'#section3"><b>></a></b></li>';
			}
			?>
			<li><a href="?hal=<?php echo $jmlhalaman; ?>#section3"><b>>></a></b></li>
            </ul>
            <br><br>
           <a style="float:right; margin-top:5px;" href="validasipemilih.php" class="btn btn-warning"><span class="glyphicon glyphicon-log-in"></span> Validasi Pemilih</a>&nbsp;&nbsp;&nbsp;
           <a style="float:right; margin-top:5px;" href="cek-pemilih.php" class="btn btn-warning"><span class="glyphicon glyphicon-log-in"></span> Cek Pemilih</a>
           <a style="float:left; margin-top:5px;" data-toggle="modal" data-target="#import" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Import</a>  
           <div style="clear:both"></div>  
      </div>
      </div>
      <div class="well">
      <div id="section4">         
        <h2>About</h2>
        <p>All Right Reserved by RPL16</p>
      </div>      
      </div>
    </div>
  </div>
  <!-- POPUPS-->
  	<!-- tambah calon -->
  	 <div class="modal fade" id="tambahcalon" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Calon</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="tambahcalon.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="email">NIS:</label>
                        <input name="nis" class="form-control" id="nis" placeholder="Masukan NIS" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="email">Nama:</label>
                        <input name="nama" class="form-control" id="nama" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Kelas:</label>
                        <input name="kelas" class="form-control" id="kelas" placeholder="Masukan Kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Motto:</label>
						<textarea class="form-control" name="motto" id="motto" placeholder="Masukkan Motto"></textarea>
                        <!-- <input type="motto" class="form-control" id="motto" placeholder="Masukan Motto"> !-->
                    </div>
					<div class="form-group">
                        <label for="email">Pilih Foto:</label>
                        <input type="file" name="foto" required/>
                    </div>
                    <button type="submit" class="btn btn-info">Daftar</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </form>
                </div>
            </div>
        </div>
	</div>
	
	<div class="modal fade" id="tambahpemilih" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Pemilih</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="tambahpemilih.php" method="post">
                    <div class="form-group">
                        <label for="email">NIS:</label>
                        <input type="nis" class="form-control" name="nis" id="nis" placeholder="Masukan NIS">
                    </div>
                    <div class="form-group">
                        <label for="email">Nama:</label>
                        <input type="nama" class="form-control" name="nama" id="nama" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Kelas:</label>
                        <input type="kelas" class="form-control" name="kelas" id="kelas" placeholder="Masukan Kelas">
                    </div>
                    <button type="submit" class="btn btn-info">Daftar</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </form>
                </div>
            </div>
        </div>
	</div>
	
	<!-- import pemilih -->
	<div class="modal fade" id="import" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Import Formulir Pemilih</h4>
                </div>
                <div class="modal-body">
                    <form action="importpemilih.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" /><br>
					<input type="submit" name="button" value="Import" />
     				</form><br>
    				<a href="../../asset/import/formulir.xls" class="button">Unduh formulir pemilih</a>
				</div>
            </div>
            </div>
        </div>
	</div>
</body>
</html>                                   
