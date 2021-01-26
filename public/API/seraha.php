<?php
include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	$files = $_FILES;
	
	 $folderUpload = "upload/images";
	//$target_dir = "/gambars";
	//$target_dir = "gambars";
	

	if(!file_exists($folderUpload)) {
		mkdir($folderUpload, 0777, true);
	}
		
	// set random image file name with time
	//$target_dir = $target_dir . "/" .rand() . '_' . time() . ".jpeg";
	
	// $namaGambar = $folderUpload . "/" .rand() . '_' . time() . ".jpeg";
	$namaGambar = $folderUpload . "/"  . time() . ".jpeg";
	
	$id = $obj['id'];
	$name = $obj['name'];
	$email = $obj['email'];
	$gambar = $namaGambar;

	if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$gambar' WHERE id='$id'" )){
		echo json_encode('Update succsessfully');
	}else {
			echo json_encode('Update field');
	}
	mysqli_close($link);
	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $gambar)) {
		// $id = $obj['id'];
		// $name = $obj['name'];
		// $email = $obj['email'];
		// $gambar = $target_dirs;
		//$phone_number = $obj['phone_number'];
		
		// //if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', phone_number='$phone_number' WHERE id='$id'" )){
		// if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$gambar' WHERE id='$id'" )){
		// 		echo json_encode('Update succsessfully');
		// }else {
		// 		echo json_encode('Update field');
		// }
		
		// mysqli_close($link);
		// //other
		echo json_encode([
			"Message" => "The file has been uploaded.",
			"Status" => "OK"
		]);
	} else {
   echo json_encode([
			"Message" => "Sorry, there was an error uploading your file.",
			"Status" => "Error"
		]);
	}
	
	
	
		// $id = $obj['id'];
		// $name = $obj['name'];
		// $email = $obj['email'];
		// $gambar = $target_dirs;
		// if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$gambar' WHERE id='$id'" )){
		// 		echo json_encode('Update succsessfully');
		// }else {
		// 		echo json_encode('Update field');
		// }
		// mysqli_close($link);
	
	
	