<?php
include 'connections.php';

	

	 
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	$files = $_FILES;
	
	
		
	$id = $obj['id'];
	$name = $obj['name'];
	$email = $obj['email'];
	
	 //$folderUpload = "upload/images" . "/" . $name;
	  $folderUpload = "upload/images";
	
	
	if(!file_exists($folderUpload)) {
		mkdir($folderUpload, 777, true);
	}
	
	//$namaGambar = $folderUpload."/" . rand() . time()  .".jpeg";
	 //$namaGambar = $folderUpload . "/" .rand() . '_' . time() . ".jpeg";
	 
	  $namaGambar = $folderUpload . "/"  . time() . ".jpeg";
	//$namaGambar = $folderUpload."/". rand()."-".time().".jpeg";
	//$namaGambar = $name;
	//$namaGambar = $folderUpload . "/" . $obj['name'] . ".jpeg";
	
	

	 //if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$namaGambar' WHERE id='$id'" )){
		//echo json_encode('Update succsessfully');
					
					
		

		if(move_uploaded_file($_FILES['image']['tmp_name'], $namaGambar)) {
	
			
				// $id = $obj['id'];
				// $name = $obj['name'];
				// $email = $obj['email'];
				// $gambar = $gambar;
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
	//}else {
	//		echo json_encode('Update field');
	//}
	
	//mysqli_close($link);


	

	
	
	
	
		// $id = $obj['id'];
		// $name = $obj['name'];
		// $email = $obj['email'];
		// $gambar = $target_dirs;

		 if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$namaGambar' WHERE id='$id'" )){
		 		echo json_encode('Update succsessfully');
		 }else {
		 		echo json_encode('Update field');
		 }
		 mysqli_close($link);
	
	
	