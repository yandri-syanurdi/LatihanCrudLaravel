<?php include 'configku.php';

	$json = file_get_contents('php://input'); 	
	$obj = json_decode($json,true);

	$email = $obj['email'];
	
	$password = $obj['password'];
	
	$hashed_password = password_hash($obj['password'], PASSWORD_DEFAULT);
	
	if($obj['email']!=""){	
	
	//$result= $link->query("SELECT * FROM users where email='$email'");
	$result= $link->query("SELECT * FROM users where email='$email'");
	
		if($result->num_rows==0){
			echo json_encode('Wrong Details man');				
		}
		else{		
			if(password_verify($obj['password'],$hashed_password))
			{
				echo json_encode('ok');		
			}
			else {
				echo json_encode('Wrong Details yeah');		
			}
					
		}
	}	
	else{
	  echo json_encode('try again');
	}

?>

