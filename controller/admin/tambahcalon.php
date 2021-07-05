<?php
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
    include "../koneksi.php";
    include "../cek-admin.php";

$nis		= $_POST['nis'];
$nama		= $_POST['nama'];
$kelas		= $_POST['kelas'];
$motto		= $_POST['motto'];
$namafile	= $_FILES['foto']['name'];
$namafile2	= strtolower("calon-".$nama."-".$namafile);
$fileSize	= $_FILES['foto']['size'];  
$fileError	= $_FILES['foto']['error'];

if($fileSize > 0 || $fileError == 0){  

		$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../asset/img/uploads/'.$namafile2);  
		if($move){  
			mysqli_query($kon, "INSERT INTO calon (nis,nama,kelas,foto,moto) values ('$nis','$nama','$kelas','$namafile2','$motto')");
			alert('Data berhasil disimpan.');
			redir('beranda.php?#section2');
		}else{  
			echo "Gagal menyimpan";
			echo "<a href=beranda.php>Kembali</a>";
		}  
	}else{  
		echo "Gagal menyimpan foto ".$fileError;
		echo "<a href=beranda.php>Kembali</a>";
	} 

?>