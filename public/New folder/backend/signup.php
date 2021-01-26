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
    
		$query = $link->mysql_query("SELECT `id` FROM `messenger_users` WHERE username='$username'");

		if (mysql_num_rows($query) > 0 || $username == '' || $password == '') {
			$id = array('id' => -1);
			echo json_encode($id);
		}
		else {
			$link->mysql_query("INSERT INTO `messenger_users`(`username`, `password`) VALUES ('$username', '$password')");
			$new_id_query = $link->mysql_query("SELECT `id` FROM `messenger_users` WHERE username='$username' AND password='$password'");
			$id = array('id' => -1);
			if (mysql_num_rows($new_id_query) > 0) {
				$row = mysql_fetch_array($new_id_query);
				$id = array('id' => $row["id"]);
			}
			echo json_encode($id);
		}
	}
	else {
		echo json_encode('try again');
	}
	
	mysqli_close($link);
?>
