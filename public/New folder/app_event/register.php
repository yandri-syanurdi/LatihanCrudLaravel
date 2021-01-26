<?php
/* ===== www.dedykuncoro.com ===== */
	include 'koneksi.php';
	
	class usr{}
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	
	if ((empty($email))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom email tidak boleh kosong"; 
		die(json_encode($response));
	} else if ((empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom password tidak boleh kosong"; 
		die(json_encode($response));
	} else if ((empty($confirm_password)) || $password != $confirm_password) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Konfirmasi password tidak sama"; 
		die(json_encode($response));
	} else {
		if (!empty($email) && $password == $confirm_password){
			$num_rows = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."'"));

			if ($num_rows == 0){
				$query = mysql_query("INSERT INTO users (id, email, password) VALUES(0,'".$email."','".$password."')");

				if ($query){
					$response = new usr();
					$response->success = 1;
					$response->message = "Register berhasil, silahkan login.";
					die(json_encode($response));

				} else {
					$response = new usr();
					$response->success = 0;
					$response->message = "email sudah ada";
					die(json_encode($response));
				}
			} else {
				$response = new usr();
				$response->success = 0;
				$response->message = "email sudah ada";
				die(json_encode($response));
			}
		}
	}

	mysql_close();


	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	// include_once "koneksi.php";

	// class usr{}

	// $email = $_POST["email"];
	// $password = $_POST["password"];
	// $confirm_password = $_POST["confirm_password"];

	// if ((empty($email))) {
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom email tidak boleh kosong";
	// 	die(json_encode($response));
	// } else if ((empty($password))) {
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom password tidak boleh kosong";
	// 	die(json_encode($response));
	// } else if ((empty($confirm_password)) || $password != $confirm_password) {
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Konfirmasi password tidak sama";
	// 	die(json_encode($response));
	// } else {
		// if (!empty($email) && $password == $confirm_password){
		// 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='".$email."'"));

		// 	if ($num_rows == 0){
		// 		$query = mysqli_query($con, "INSERT INTO users (id, email, password) VALUES(0,'".$email."','".$password."')");

		// 		if ($query){
		// 			$response = new usr();
		// 			$response->success = 1;
		// 			$response->message = "Register berhasil, silahkan login.";
		// 			die(json_encode($response));

		// 		} else {
		// 			$response = new usr();
		// 			$response->success = 0;
		// 			$response->message = "email sudah ada";
		// 			die(json_encode($response));
		// 		}
		// 	} else {
		// 		$response = new usr();
		// 		$response->success = 0;
		// 		$response->message = "email sudah ada";
		// 		die(json_encode($response));
		// 	}
		// }
	// }

	// mysqli_close($con);

?>	