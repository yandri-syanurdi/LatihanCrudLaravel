<?php
include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	
	$id = $obj['id'];
	$name = $obj['name'];
	$email = $obj['email'];
	//$gambar = $obj['gambar'];
	//$phone_number = $obj['phone_number'];
	
	//if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', phone_number='$phone_number' WHERE id='$id'" )){
	if(mysqli_query($link, "UPDATE users SET name='$name', email='$email' WHERE id='$id'" )){
			echo json_encode('Update succsessfully');
	}else {
			echo json_encode('Update field');
	}
	
	mysqli_close($link);