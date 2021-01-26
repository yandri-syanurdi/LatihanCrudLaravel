<?php
include 'configku.php';

$result = mysqli_query($link, "SELECT * FROM schedule");

if(mysqli_num_rows($result)){
	while($row[] = mysqli_fetch_assoc($result)){
		$json = json_encode($row);
		
	}
	
}else { 
	//echo 'result not found';
	$json = json_encode(0);

}

echo $json;

mysqli_close($link);