<?php include 'config.php';

	$json = file_get_contents('php://input');
	$_GET = json_decode($json,true);
	
    $id=$_GET['id'];
    $password=$_GET['password'];

    //function connectToDatabase() {
        // Connect to your MySQL database here
    //}   
                                    
    //connectToDatabase();
	
	if($_GET['id']!="") {
    
		$result = $link->mysql_query("SELECT * FROM `messenger_users` WHERE id='$id' AND password='$password'");
		
		if (mysql_num_rows($result) > 0) {
			$contacts_result = $link->mysql_query("SELECT messenger_contacts.contact_id, messenger_users.username FROM messenger_users INNER JOIN messenger_contacts ON messenger_users.id=messenger_contacts.contact_id WHERE messenger_contacts.id='$id'");
			$contacts = array();
			while($row=mysql_fetch_array($contacts_result)) { 
				$contact_id=$row['contact_id']; 
				$username=$row['username']; 
				$contacts[] = array('contact_id'=> $contact_id, 'username'=> $username);
			} 
			echo json_encode($contacts);
		}
	
	}else {
		echo json_encode('try again');
	}
	
	mysqli_close($link);
	
?>
