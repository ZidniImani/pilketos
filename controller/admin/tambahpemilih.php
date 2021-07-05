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
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];

	$perintah1 = mysqli_query($kon, "SELECT * FROM pemilih WHERE nis='$nis'");
	$jumlah = mysqli_num_rows( $perintah1);
	if ($jumlah>=1) {
		alert('Gagal! NIS sudah dipakai :(');
		redir('beranda.php?#section3');
	} else {
		mysqli_query($kon, "INSERT INTO pemilih (nis,nama,kelas) VALUES ('$nis','$nama','$kelas')");
		alert('Berhasil :D');
		redir('beranda.php?#section3');
		
	}
?>