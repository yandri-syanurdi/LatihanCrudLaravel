<?php
include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	
	$id = $obj['id'];
	
	if(mysqli_query($link, "DELETE FROM users WHERE id='$id'" )){
			echo json_encode('Delete succsessfully');
	}else {
			echo json_encode('Delete field');
	}
	
	mysqli_close($link);