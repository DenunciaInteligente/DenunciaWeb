
<?php
	$host 	= "localhost";
	$user 	= "root";
	$pass 	= "root";
	$db		= "database_denuncias";

	$conx = mysqli_connect($host,$user,$pass);
	mysqli_select_db($conx,$db);
?>