<?php
include 'connections.php';

$result = mysqli_query($link, "SELECT * FROM users");

if(mysqli_num_rows($result)){
	while($row[] = mysqli_fetch_assoc($result)){
		$json = json_encode($row);
		
	}
	
}else { 
	echo 'result not found';

}

echo $json;

mysqli_close($link);