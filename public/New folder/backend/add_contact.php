<?php include 'config.php';
	
	$json = file_get_contents('php://input');
	$_GET = json_decode($json,true);
	
	
    $id=$_GET['id'];
    $password=$_GET['password'];
    $contact_username=$_GET['contact_username']; //contact_username is guaranteed to be the username of user with id

    //function connectToDatabase() {
        // Connect to your MySQL database here
		
		//https://www.sitepoint.com/community/t/database-connection-inside-a-function/7436
    //}   
                                    
    //connectToDatabase();
	
	if($_GET['id']!="") {
	
    
		$user = $link->mysql_query("SELECT * FROM `messenger_users` WHERE id='$id' AND password='$password'");
		$contact = $link->mysql_query("SELECT * FROM `messenger_users` WHERE username='$contact_username'");
		
		if (mysql_num_rows($user) > 0) {
			$row = mysql_fetch_array($contact);
			if (mysql_num_rows($contact) > 0) {
				$contact_id = $row["id"];
				$link->mysql_query("INSERT INTO `messenger_contacts`(`id`, `contact_id`) VALUES ('$id','$contact_id')");
				$result = array('result' => 0, 'contact_id' => $contact_id);
				echo json_encode($result);
			}
			else {
				$result = array('result' => -1, 'contact_id' => -1);
				echo json_encode($result);
			}
		}
	
	}
	else {
		echo json_encode('try again');
	}
	
	mysqli_close($link);
?>
