<?php 
	$connection = new mysqli('127.0.0.1', 'root','','dbcamellof1');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
		
?>