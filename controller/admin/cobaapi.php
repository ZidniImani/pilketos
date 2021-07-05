<?php
	header('Content-Type:application/json');

    include "../koneksi.php";
    include "../cek-admin.php";
	$query = mysqli_query($kon, "SELECT * FROM calon")or die(mysqli_error($kon));
	

	while($hasil = mysqli_fetch_array($query)){
		$ha[] = array(
			"nis"=>$hasil['nis'],
			"nama"=>$hasil['nama'],
			"kelas"=>$hasil['kelas']
		);
	}
			
	$json = json_encode($ha, JSON_PRETTY_PRINT);
	echo $json;
	// $de = json_decode($json, true);
	
	// echo $de[0]['nama'];
	
?>