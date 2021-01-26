<?php include 'config.php';

	$json = file_get_contents('php://input'); 	
	$obj = json_decode($json,true);

	$email = $obj['email'];
	
	$password = $obj['password'];
	
	if($obj['email']!=""){	
	
	//$bcrypt = new Bcrypt(15);
	//$hash = $bcrypt->hash($password);
	..$isGood = $bcrypt->verify($password, $hash);
	
	//$result= $link->query("SELECT * FROM users where email='$email' and password='$password'");
	//$result= $link->query("SELECT * FROM users where email='$email' and password='$isGood'");
	$result= $link->query("SELECT * FROM users where email='$email'");
	
		if($result->num_rows==0){
			echo json_encode('Wrong Details');				
		}
		else{		
		//$hashku = loadHashByUsername($username);
		//if(password_verify($password, $hashku)){
		//	echo json_encode('ok');		
		//}
		echo json_encode('ok');				
		}
	}	
	else{
	  echo json_encode('try again');
	}

?>

