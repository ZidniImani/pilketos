<?php
    include "../koneksi.php";
    include "../cek-admin.php";
	
	$nis = $_GET['nis'];
	$query=mysqli_query($kon, "DELETE FROM calon where nis = '$nis'")or die(mysqli_error($kon));
	if($query){
		echo "<script>
		alert('SUKSES MENGHAPUS !');
		</script>";
		header('location:beranda.php#section2');
	}
	else{
		echo "<script>
		alert('GAGAL MENGHAPUS !');
		</script>";
		header('location:beranda.php#section2');
	}

?>