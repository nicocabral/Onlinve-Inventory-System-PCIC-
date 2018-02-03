<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
mysql_query("DELETE FROM pcic_accounts WHERE id = '$id'") or die(mysql_error());
header('location:systemuserTable');
mysql_close($con);
?>