<?php
include 'configku.php';
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	
	$id = $obj['id'];
	$kegiatan = $obj['kegiatan'];
	$tanggal_mulai = $obj['tanggal_mulai'];
	$tanggal_selesai = $obj['tanggal_selesai'];
	
	if(mysqli_query($link, "UPDATE schedule SET kegiatan='$kegiatan', tanggal_mulai='$tanggal_mulai', tanggal_selesai='$tanggal_selesai' WHERE id='$id'" )){
			echo json_encode('Update succsessfully');
	}else {
			echo json_encode('Update field');
	}
	
	mysqli_close($link);