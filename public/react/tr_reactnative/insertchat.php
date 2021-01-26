<?php
	include 'connectionsku.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	$id_pengirim = $obj['id_pengirim'];
	$nama_pengirim = $obj['nama_pengirim'];
	$profile_pengirim = $obj['profile_pengirim'];
	$id_penerima = $obj['id_penerima'];
	$nama_penerima = $obj['nama_penerima'];
	//$id_chat = $obj['id_chat'];
	$isi_pesan = $obj['isi_pesan'];
	
	if($obj['id_pengirim'] > $obj['id_penerima']){
		$a = $obj['id_penerima'];
		$b = $obj['id_pengirim'];
		$idchats = $a . $b;
	}
	else{
		$a = $obj['id_pengirim'];
		$b = $obj['id_penerima'];
		$idchats = $a . $b;
	}
	
	//$gabung = $obj['name'] . $obj['name'];
	//$gabung = $name . $name;
	
	//$result = mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$name', '$email', '$phone_number')" );
	
	//if(mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$gabung', '$email', '$phone_number')" )){
	if(mysqli_query($link, "INSERT INTO chat(id_pengirim, nama_pengirim, profile_pengirim, id_penerima, nama_penerima, id_chat, isi_pesan) VALUES('$id_pengirim', '$nama_pengirim', '$profile_pengirim', '$id_penerima', '$nama_penerima', '$idchats', '$isi_pesan')" )){
			echo json_encode('Insert succsessfully');
	}else {
			echo json_encode('Insert field');
	}
	
	mysqli_close($link);