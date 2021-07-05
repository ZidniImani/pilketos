	<?php
	include "controller/koneksi.php";
	session_start();
	if(!empty($_POST)){
		extract($_POST);
		$user = mysqli_real_escape_string($kon, $_POST['nis']);
		$query = mysqli_query($kon, "SELECT * FROM pemilih where nis = '$user'")or die(mysqli_error($kon));
		$jmlh = mysqli_num_rows( $query);
		$hasil = mysqli_fetch_array($query);
		$status = $hasil['status'];
		$query2 = mysqli_query($kon, "SELECT * from pilihan where nis = '$user'")or die(mysqli_error());
		$jmlh2 = mysqli_num_rows( $query2);

		if($jmlh < 1){
			echo "<div class='alert alert-danger panelpil'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  		<strong>NIS kamu </strong> belum terdaftar, harap lapor petugas.
	</div>";
		}
		elseif($jmlh2 >= 1){
			echo "<div class='alert alert-danger panelpil'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  		<strong>Kamu</strong> sudah menggunakan hak pilih.
	</div>";
		}
		elseif($status == 0){
			echo "<div class='alert alert-danger panelpil'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  		<strong>Kamu</strong> belum cukup umur :p
	</div>";
		}
		else{
			$_SESSION['pemilih'] = $user;
			header("location:pemilihan");
		}
	}

?>