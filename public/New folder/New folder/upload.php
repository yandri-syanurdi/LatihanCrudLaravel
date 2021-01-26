<?php

$upload_folder = 'uploads/'; 
$max_size = 100000000; 
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif', 'mp4', 'gp3', 'webm');

$filename = pathinfo($_FILES['data']['name'], PATHINFO_FILENAME);

$extension = strtolower(pathinfo($_FILES['data']['name'], PATHINFO_EXTENSION));

if(!in_array($extension, $allowed_extensions)) {
 die("Invalid file extension. Only png, jpg, jpeg, gif, mp4, gp3 and webm are allowed.");
}

if($_FILES['data']['size'] > $max_size) {
 die("File exceeds maximum data size.");
}

$new_path = $upload_folder.$filename.'.'.$extension;

if(file_exists($new_path)) { 
 $id = 1;
 do {
 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($new_path));
}

move_uploaded_file($_FILES['data']['tmp_name'], $new_path);
echo 'File uploaded to: <a href="'.$new_path.'">'.$new_path.'</a>';
?>
