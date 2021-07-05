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

include "cek-session.php";
include "koneksi.php";
$nis = $_SESSION['pemilih'];

$pilihan = mysqli_real_escape_string($kon, $_GET['id']);
$perintah1 = mysqli_query($kon, "SELECT * FROM pilihan WHERE nis='$nis'");
$perintah2 = mysqli_query($kon, "SELECT * FROM calon WHERE id='$pilihan'");
$hasil2 = mysqli_fetch_array($perintah2);
$jumlah_vote = $hasil2['vote'];

$total_vote = ($jumlah_vote+1);
$jumlah = mysqli_num_rows( $perintah1);

	if ($jumlah>=1) {
		alert('GAGAL MEMILIH :p');
		redir('../login');
	} else {
		mysqli_query($kon, "INSERT INTO pilihan (nis,id_pilihan) values ('$nis','$pilihan')");
		mysqli_query($kon, "UPDATE calon SET vote='$total_vote' WHERE id='$pilihan'");
		alert('Sukses gan, selamat yaa');
		unset($_SESSION['pemilih']);
		redir('../login');
		}
?>