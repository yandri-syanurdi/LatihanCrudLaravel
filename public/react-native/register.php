<?php include 'config.php';


	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$name = $obj['name'];
	 
	// same with $email.
	$email = $obj['email'];
	 
	// same with $password.
	$password = $obj['password'];
	
	//$gambar = 'upload/images/default.png';
	$gambar = 'upload/images/default.png';
	//$gambar = 'default.png';
	
	
	
	if($obj['email']!="")
	{
	
	$result= $link->query("SELECT * FROM users where email='$email'");
	
	
		if($result->num_rows>0){
			echo json_encode('email already exist');  // alert msg in react native		 		
		}
		else
		{		
		  // $add = $link->query("insert into users (name,email,password) values('$name','$email','$password')");
		  
		  $add = $link->query("insert into users (name,email,password,gambar) values('$name','$email','$password','$gambar')");
			
			if($add){
				echo  json_encode('User Registered Successfully'); // alert msg in react native
			}
			else{
			   echo json_encode('check internet connection'); // our query fail 		
			}
			
			//if(mysqli_query($link, "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')" )){
			//echo json_encode('Insert succsessfully');
			//}else {
			//echo json_encode('Insert field');
			//}
				
		}
	}
	
	else{
	  echo json_encode('try again');
	}
	
	mysqli_close($link);
	
?>

