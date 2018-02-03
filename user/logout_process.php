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

	$_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" width="20px;"> Account Successfully logout!';
    header("Location:../index");
	$_SESSION['class'] = 'success';	
	
	} else {
		echo mysql_error();
	}
?>