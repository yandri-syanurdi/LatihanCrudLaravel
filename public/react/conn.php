<?php
	$host = "localhost" ;
	$user = "root" ;
	$pass = "";
	$db = "yandri_login" ;
	
	
	
	mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db( $db) or die (mysql_error()."database not found");





?>