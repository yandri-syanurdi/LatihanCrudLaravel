<?php include 'configku.php';

	$json = file_get_contents('php://input'); 	
	$obj = json_decode($json,true);

	$email = $obj['email'];
	
	$password = $obj['password'];
	
	if($obj['email']!=""){	
	
	$result= $link->query("SELECT * FROM users where email='$email'");

		if($result->num_rows==0){
			echo json_encode('Wrong Details');				
		}
		else{		
		
			
				echo json_encode('ok');
				
		}
	}	
	else{
	  echo json_encode('try again');
	}

?>

