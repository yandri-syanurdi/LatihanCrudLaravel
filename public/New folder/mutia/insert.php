<?php
	include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	//$pilihan = $obj['pilihan'];
	//$pilihan = implode(", ",array_keys($obj['pilihan']));
	//$pilihan = implode(", ",array_values($obj['pilihan']));
	$pilihan = implode(" ",array_values($obj['pilihan']));
	
	
	//$id_nums = array(1,6,12,18,24);

	//$pilihan = implode(", ", $id_nums); 

	
	if(mysqli_query($link, "INSERT INTO multiple (pilihan) VALUES('$pilihan')" )){
			echo json_encode('Insert succsessfully');
	}else {
			echo json_encode('Insert field');
	}
	
	mysqli_close($link);