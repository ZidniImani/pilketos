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
  <script src="../../asset/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
      <div class="well">
      <div id="section1"><br>
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
        if($jmlh!=0){
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
        <a style="float:right; margin-top:30px;" href="resethasil.php" onclick="return confirm('Yakin mereset data? \nSemua data akan terhapus!');" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span> Reset</a>
      <div style="clear:both;"></div>
      </div>
      </div>