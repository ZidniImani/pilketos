<?php
$arr[]= array(
    "alas"=>$_POST['alas'],
	"tinggi"=>$_POST['tinggi']
);
print_r($arr);
if (empty($arr)){ 
	exit("Data empty.");
} else {
	$luas = 0.5 * $arr[0]->alas * $arr[0]->tinggi;
	echo json_encode(array("luas" => $luas));
}
?>