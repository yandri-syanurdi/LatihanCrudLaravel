<?php include 'config.php';

	$json = file_get_contents('php://input');
	$_GET = json_decode($json,true);
	
    $username=$_GET['username'];
    $password=$_GET['password'];

    //function connectToDatabase() {
        // Connect to your MySQL database here
    //}   
                                    
    //connectToDatabase();
	
	if($_GET['username']!="") {
		
		$result = $link->query("SELECT * FROM `messenger_users` WHERE username='$username' AND password='$password'");

		if($result->num_rows==0){
			echo json_encode('Wrong Details');				
		}
		else{		
		echo json_encode('ok');				
		}
		
	}
	else {
		echo json_encode('try again');
	}
    
    mysqli_close($link);
?>
