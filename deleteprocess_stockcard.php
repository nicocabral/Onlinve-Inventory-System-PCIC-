<?php 
session_start();
include('includes/dbconn.php');
$getid = intval($_GET['id']);
$query = "DELETE FROM pcic_stockcard WHERE id = '$getid'";
$result = mysql_query($query) or die (mysql_error());
if($result==true){
		$_SESSION['success_msg'] = '<span class="glyphicon glyphicon-ok"></span> Stock/s deleted successfully!';
		$_SESSION['class'] = 'success';
		header("location:stockcard_pageTable");
	}
	else {
		$_SESSION['success_msg'] = '<span class="glyphicon glyphicon-remove"></span> Sorry! Unable to process your request.';
		$_SESSION['class'] = 'danger';
		header("location:stockcard_pageTable");
		}
		mysql_close($con);
?>