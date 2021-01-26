<?php

$target_dir = "upload/images";

if(!file_exists($target_dir)) {
	mkdir($target_dir, 0777, true);
}

// set random image file name with time
$target_dir = $target_dir . "/"  . time() . ".jpeg";

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