<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include "../koneksi.php";
    include "../cek-admin.php";
  ?>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../asset/css/bootstrap.min.css" />
  <script src="../../asset/js/jquery.min.js"></script>
  <script src="../../asset/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		$nis = $_GET['nis'];
		if(empty($nis)){
			header("location:beranda.php#section2");	
		}
		$query = mysqli_query($kon, "SELECT * FROM calon where nis = '$nis'");
		$hasil = mysqli_fetch_array($query);
			
	function alert($alert){
		echo "<script type='text/javascript'>
			alert('".$alert."');
			</script>";
	}
	function redir($redir){
		echo "<script type='text/javascript'>
			document.location='".$redir."';
			</script>";
	}


	?>
	<div class="container" style="border:0px solid #ccc; width:50%; margin-top:5%">
    	<p align="center">
        	<h2 align="center" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;color:#09F;">Edit Calon</h2>
        	<div class="container" style="border-top:2px solid #09f; width:70%; margin-top:10px"><br>
            <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-striped" align="center" border="0px" width="100%">
                <tr>
                	<th>Nama</th>
                    <th> : </th>
                    <td><input class="form-control" type="text" value="<?php echo $hasil['nama']; ?>" name="nama"/></td>
                </tr>
                 <tr>
                	<th>Kelas</th>
                    <th> : </th>
                    <td><input class="form-control" type="text" value="<?php echo $hasil['kelas']; ?>" name="kelas"/></td>
                </tr>
                 <tr>
                	<th>Motto</th>
                    <th> : </th>
                    <td><textarea name="moto" class="form-control" type="text" style="height:100px;"><?php echo $hasil['moto']; ?></textarea></td>
                </tr>
                </tr>
                <tr>
                	<th rowspan="2">Foto</th>
                    <th rowspan="2"> : </th>
                    <td><img src="../../asset/img/uploads/<?php echo $hasil['foto']; ?>" width="100px" height="120px"></td>
                </tr>
                <tr>
                	<td><input type="file" name="dp" /></td>
                </tr>
                <tr>
                	<td colspan="3" align="center"><input type="submit" class="btn btn-success" value="Submit" /></td>
                </tr>
            </table>
            </form>
            <?php
				if(!empty($_POST)){
					extract($_POST);
					$nama = mysqli_real_escape_string($kon, $_POST['nama']);
					$kelas = mysqli_real_escape_string($kon, $_POST['kelas']);
					$moto = mysqli_real_escape_string($kon, $_POST['moto']);
					$namafile	= $_FILES['dp']['name'];
					$namafile2	= strtolower("calon-".$nama."-".$namafile);
					$fileSize	= $_FILES['dp']['size'];  
					$fileError	= $_FILES['dp']['error'];
					
					if(empty($namafile)){
						$query = mysqli_query($kon, "UPDATE calon set nama = '$nama', kelas = '$kelas', moto = '$moto' where nis = '$nis'"); 
						if($query){
							alert('Sukses');
							redir('beranda.php#section2');	
						}
					}else{
						$move = move_uploaded_file($_FILES['dp']['tmp_name'], '../../asset/img/uploads/'.$namafile2);
						$query = mysqli_query($kon, "UPDATE calon set nama = '$nama', kelas = '$kelas', moto = '$moto', foto = '$namafile2' where nis = '$nis'"); 
						if($query){
							alert('Sukses');
							redir('beranda.php#section2');	
						}
					}
				}
			?>
           </div>
        </p>
    </div>
</body>
</html>