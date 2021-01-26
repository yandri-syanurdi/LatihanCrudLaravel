<?php
	$host = "localhost" ;
	$user = "root" ;
	$pass = "";
	$db = "laravel-siswa" ;
	
	
	
	$konek = mysqli_connect($host,$user,$pass,$db) or die (Mysqli_errno());
	//mysqli_select_db( $db) or die (mysqli_error()."database not found");




?>