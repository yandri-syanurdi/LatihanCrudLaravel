<?php
include 'connections.php';

	//  $randrom = (rand());

	 
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	$files = $_FILES;
	
	 $folderUpload = "upload/images";
	//$target_dir = "/gambars";
	//$target_dir = "gambars";
	

	//if(!file_exists($folderUpload)) {
	//	mkdir($folderUpload, 0777, true);
	//}
	
	if(!file_exists($folderUpload)) {
		mkdir($folderUpload, 777, true);
	}
		
	// set random image file name with time
	//$target_dir = $target_dir . "/" .rand() . '_' . time() . ".jpeg";
	
	// $namaGambar = $folderUpload . "/" .rand() . '_' . time() . ".jpeg";
	   //$namaGambar = $folderUpload."/". rand()."-".time().".jpeg";
	   //$namaGambar = $target_dir . "/" .rand() . '_' . time() . ".jpeg";
	//    $namaGambar = $folderUpload . "/"  . time() . ".jpeg";
	//$time = time() - 1 ;
	//$timecut = time()  ;
	// $namaGambar = $folderUpload."/" .time().".jpeg";

	// $namaGambar = $folderUpload."/" . time() - 1  .".jpeg";



	//$namaGambar = $folderUpload."/" . time()   .".png";
	//$namaGambar = $folderUpload."/" . date("d-M-Y") . date("H:i:s")   .".png";
		//$namaGambar = $folderUpload."/" . date("Y-m-d H:i:s") .".png";
		
		//$namaGambar = $folderUpload."/"  . date("H:i:s")   .".png";

	// $randrom = rand();

	// $namaGambar = $folderUpload."/" . $randrom   .".jpeg";
	// $namaGambar = $folderUpload."/" . rand()  .".jpeg";
	
	
	$id = $obj['id'];
	$name = $obj['name'];
	$email = $obj['email'];
	$namaGambar = $folderUpload."/" . time()   .".jpeg";
	$time = time() - 1;
	//$namaGambar = $folderUpload."/" . rand()  .".jpeg";
	
	//$namaGambar = $folderUpload."/" . date("YmdHis")  .".jpeg";

	// $namaGambar = $folderUpload."/" . 'yandri'   .".jpeg";

	
	// $gambar = $namaGambar;
	// $gambar = $folderUpload."/" . $timecut .".jpeg";

	// if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$namaGambar' WHERE id='$id'" )){
	if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$namaGambar' WHERE id='$id'" )){
	// if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$gambar' WHERE id='$id'" )){
		echo json_encode('Update succsessfully');
					

		//if(move_uploaded_file($_FILES['image']['tmp_name'], $namaGambar)) {
	
			 if(move_uploaded_file($_FILES['image']['tmp_name'], $folderUpload."/" . $time .".jpeg")) {
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
	}else {
			echo json_encode('Update field');
	}
	//mysqli_close($link);


	// $time = time() ;
	// $namaGambarku = $folderUpload."/" . $randrom   .".jpeg";

	
	
	
	
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
	
	
	