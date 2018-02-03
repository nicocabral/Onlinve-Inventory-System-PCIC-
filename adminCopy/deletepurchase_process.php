<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
mysql_query("DELETE FROM pcic_purchase WHERE id = '$id'") or die(mysql_error());
header('location:purchase_pageTable');
mysql_close($con);
?>