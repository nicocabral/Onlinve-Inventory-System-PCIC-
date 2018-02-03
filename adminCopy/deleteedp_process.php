<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
mysql_query("DELETE FROM edp_equipement WHERE e_no = '$id'") or die(mysql_error());
mysql_query("DELETE FROM edp_ledgercard WHERE eno = '$id'") or die(mysql_error());
header('location:edpTable');
mysql_close($con);
?>