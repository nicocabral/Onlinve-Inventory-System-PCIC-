<?php include('includes/dbconn.php');
session_start();
$sql = mysql_query("DELETE  from pcic_reqpurpose")or die(mysql_error());
if($sql){
	header("location:index1");
	
exit();	}else {
	header('location:available_request_page');exit();}
	mysql_close($con);?>