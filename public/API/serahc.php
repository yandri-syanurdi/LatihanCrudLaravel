if(move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {
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
	
	
	$id = $obj['id'];
	$name = $obj['name'];
	$email = $obj['email'];
	$gambar = $obj['gambar'];
	//$phone_number = $obj['phone_number'];
	
	//if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', phone_number='$phone_number' WHERE id='$id'" )){
	if(mysqli_query($link, "UPDATE users SET name='$name', email='$email', gambar='$gambar' WHERE id='$id'" )){
			echo json_encode('Update succsessfully');
	}else {
			echo json_encode('Update field');
	}
	
	mysqli_close($link);