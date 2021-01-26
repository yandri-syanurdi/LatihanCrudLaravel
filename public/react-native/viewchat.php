<?php
include 'connectionsku.php';

$pengirim = $_GET['idPengirim'];
$penerima = $_GET['idPenerima'];


if($_GET['idPengirim'] > $_GET['idPenerima']){
	$a = $_GET['idPenerima'];
	$b = $_GET['idPengirim'];
	$idchats = $a . $b;
}
else{
	$a = $_GET['idPengirim'];
	$b = $_GET['idPenerima'];
	$idchats = $a . $b;
}

//$result = mysqli_query($link, "SELECT * FROM chat where id_pengirim = '$pengirim' and id_penerima = '$penerima' " );
$result = mysqli_query($link, " SELECT * FROM chat where id_chat = '$idchats' " );

if ($result === FALSE) {
    die(mysqli_error());
}

if(mysqli_num_rows($result)){
	while($row[] = mysqli_fetch_assoc($result)){
		$json = json_encode($row);	
	}
}else { 
	//echo 'result not found';
	//$json = json_encode('Wrong Details');	
	$json = json_encode(0);
}

		//if($mysqli_num_rows($result)==0){
		//	$json = json_encode('Wrong Details');				
		//}
		//else{		
		//		while($row[] = mysqli_fetch_assoc($result)){
		//			$json = json_encode($row);	
		//		}
		//}

echo $json;

mysqli_close($link);