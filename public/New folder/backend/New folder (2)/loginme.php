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
		
		$result = $link->mysql_query("SELECT `id` FROM `messenger_users` WHERE username='$username' AND password='$password'");

		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			$id = array('id' => $row["id"]);
			echo json_encode($id);
		}
		else {
			$id = array('id' => -1);
			echo json_encode($id);
		}
		
	}
	else {
		echo json_encode('try again');
	}
    
    mysqli_close($link);
?>
