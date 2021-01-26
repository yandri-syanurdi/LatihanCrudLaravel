<?php
	include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	$files = $_FILES;
	
	$folderUpload = "upload/imgs";
	
	if(!file_exists($folderUpload)){
		mkdir($folderUpload, 777, true);
	}
	
	$namaGambar = $folderUpload."/". rand()."-".time().".jpeg";
	
if(move_uploaded_file($files['photo']['tmp_name'], $namaGambar )){
	$name = $obj['name'];
	$email = $obj['email'];
	$phone_number = $obj['phone_number'];
	$gambar = $namaGambar;
	
	
	//$result = mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$name', '$email', '$phone_number')" );
	
	if(mysqli_query($link, "INSERT INTO usersku(name, email, phone_number, gambar) VALUES('$name', '$email', '$phone_number', '$gambar')" )){
			echo json_encode('Insert succsessfully');
	}else {
			echo json_encode('Insert field');,
	}
	
	mysqli_close($link);
		
		
}else { //jika gagal upload
    die(json_encode(array('isSukses' => 0, 'isMessage' => 'Gagal upload photo' )));
    
}
	
	