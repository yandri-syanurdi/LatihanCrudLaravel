<?php
	include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	$name = $obj['name'];
	$email = $obj['email'];
	$phone_number = $obj['phone_number'];
	$pengirim = $obj['pengirim'];
	$penerima = $obj['penerima'];
	//$idchat = $pengirim . $penerima;
	
	if($obj['pengirim'] > $obj['penerima']){
		$a = $obj['penerima'];
		$b = $obj['pengirim'];
		$idchat = $a . $b;
	}
	else{
		$a = $obj['pengirim'];
		$b = $obj['penerima'];
		$idchat = $a . $b;
	}
	//$gabung = $obj['name'] . $obj['name'];
	//$gabung = $name . $name;
	
	//$result = mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$name', '$email', '$phone_number')" );
	
	//if(mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$gabung', '$email', '$phone_number')" )){
	if(mysqli_query($link, "INSERT INTO usersme(name, pengirim, penerima, idchat, email, phone_number) VALUES('$name', '$pengirim', '$penerima', '$idchat', '$email', '$phone_number')" )){
			echo json_encode('Insert succsessfully');
	}else {
			echo json_encode('Insert field');
	}
	
	mysqli_close($link);