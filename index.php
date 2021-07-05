<?php
	$p=(!isset($_GET['p']))?:$_GET['p'];
	switch($p){
		case 'home': 
		include "content/home.php"; 
		break;
		case 'login': 
		include "content/login.php"; 
		break;
		case 'pemilihan': 
		include "content/pemilihan.php"; 
		break;
		case 'tunggu':
		include "tunggu.php";
		break;
		default :
		include "error.php";
		break;
	}
?>