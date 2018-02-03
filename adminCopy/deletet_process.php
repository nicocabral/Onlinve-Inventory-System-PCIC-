<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
mysql_query("DELETE FROM transportation_equipment WHERE tid = '$id'") or die(mysql_error());
mysql_query("DELETE FROM transportation_ledgercard WHERE tid = '$id'") or die(mysql_error());
header('location:tTable');
mysql_close($con);
?>