<?php include 'configku.php';


	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	
	$role = 'siswa';
	 // name store into $name.
	$name = $obj['name'];
	// same with $email.
	$email = $obj['email'];
	// same with $password.
	$password = $obj['password'];
	//$gambar = 'upload/images/default.png';
	//$gambar = 'upload/images/default.png';
	$gambar = 'uploads/default.png';
	//$gambar = 'default.png';
	$remember_token = 'XfFwiX59dC1vWF5apUglVL6yXBze05ylgsehq1I0uFuxQU0P3YqLsiJWbku5';
	//$created_at = Carbon::now()->format('Y-m-d H:i:s);
	$created_at = date('Y-m-d H:i:s');
	//https://tecadmin.net/get-current-date-and-time-in-php/
	
	
	//date('Y/m/d');           //  2017/02/27
	//date('m/d/Y');           //  02/27/2017
	//date('H:i:s');           //  08:22:26
	//date('Y-m-d H:i:s');     //  2017-02-27 08:22:26
	
	
	
	if($obj['email']!="")
	{
	
	$result= $link->query("SELECT * FROM users where email='$email'");
	
	
		if($result->num_rows>0){
			echo json_encode('email already exist');  // alert msg in react native		 		
		}
		else
		{		
		  // $add = $link->query("insert into users (name,email,password) values('$name','$email','$password')");
		  
		  $add = $link->query("insert into users (role,name,email,password,gambar,remember_token,created_at) values('$role','$name','$email','$password','$gambar','$remember_token','$created_at')");
			
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

