<?php
	include 'connections.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	$kegiatan = $obj['kegiatan'];
	
	$tanggal_mulai = date('Y-m-d', strtotime($obj['tanggal_mulai']));
	
	
	
	//$tgl_lahir = date('Y-m-d', strtotime($obj['tgl_lahir']));
	//$obj['tgl_lahir'] = $tgl_lahir;
	
	
	//$tanggal_selesai = $obj['tanggal_selesai'];
	
	$tanggal_selesai = date('Y-m-d', strtotime($obj['tanggal_selesai']));
	
	
	//$gabung = $obj['name'] . $obj['name'];
	//$gabung = $name . $name;
	
	//$result = mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$name', '$email', '$phone_number')" );
	
	//if(mysqli_query($link, "INSERT INTO users(name, email, phone_number) VALUES('$gabung', '$email', '$phone_number')" )){
	if(mysqli_query($link, "INSERT INTO schedule(kegiatan, tanggal_mulai, tanggal_selesai) VALUES('$kegiatan', '$tanggal_mulai', '$tanggal_selesai')" )){
			echo json_encode('Insert succsessfully');
	}else {
			echo json_encode('Insert field');
	}
	
	mysqli_close($link);