<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
mysql_query("DELETE FROM office_equipment WHERE oid = '$id'") or die(mysql_error());
mysql_query("DELETE FROM office_ledgercard WHERE oid = '$id'") or die(mysql_error());
header('location:officeTable');
mysql_close($con);
?>