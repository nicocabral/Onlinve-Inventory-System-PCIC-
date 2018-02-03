<?php
	session_start();
	if(isset($_GET['logout'])) {
		unset ($_SESSION['id']);
		unset ($_SESSION['name']);
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		unset($_SESSION['usertype']);
		unset($_SESSION['position']);
		unset($_SESSION['office']);

		
	header("location:index");
	
	} else {
		echo mysql_error();
	}
?>