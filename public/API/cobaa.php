<?php
include 'connections.php';

	$id = $obj['id'];
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	$files = $_FILES;	
	$folderUpload = "upload/images";

	if(!file_exists($folderUpload)) {
		mkdir($folderUpload, 777, true);
	}
	
	$namaGambar = $folderUpload . "/" .rand() . '_' . time() . ".jpeg";
	
	//if(mysqli_query($link, "UPDATE users SET gambar='$namaGambar' WHERE id='$id'" )){
	
	//	echo json_encode('Update succsessfully');
					
	
			 if(move_uploaded_file($files['image']['tmp_name'], $namaGambar )) {
				 
					
				 $id = $obj['id'];
				 $name = $obj['name'];
				 $email = $obj['email'];
				 $gambar = $gambar;
				
				
				 if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$gambar' WHERE id='$id'" )){
				 		echo json_encode('Update succsessfully');
				 }else {
				 		echo json_encode('Update field');
				 }
				
				 mysqli_close($link);
				 		
					//mysqli_query($link, "UPDATE users SET gambar='$namaGambar' WHERE id='$id'" );
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
	//}else {
	//				echo json_encode('Update field');
	//}
	