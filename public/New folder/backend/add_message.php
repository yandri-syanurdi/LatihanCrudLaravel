<?php include 'config.php';

	$json = file_get_contents('php://input');
	$_GET = json_decode($json,true);
	
	
    $id=$_GET['id'];
    $password=$_GET['password'];
    $contact_id=$_GET['contact_id'];
    $message=$_GET['message'];

    //function connectToDatabase() {
        // Connect to your MySQL database here
    //}   
                                    
    //connectToDatabase();
	
	if($_GET['id']!="") {
    
		$user = $link->mysql_query("SELECT * FROM `messenger_users` WHERE id='$id' AND password='$password'");
		
		if (mysql_num_rows($user) > 0) {
			$query = $link->mysql_query("INSERT INTO `messenger_messages`(`from_id`, `to_id`, `message`) VALUES ('$id', '$contact_id', '$message')");
			$result = array('result' => 0);
			echo json_encode($result);
		}
		
	}
	else {
		echo json_encode('try again');
	}
	
	mysqli_close($link);
?>
