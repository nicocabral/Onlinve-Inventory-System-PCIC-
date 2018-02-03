<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
mysql_query("DELETE FROM fixtureandfurniture WHERE ffid = '$id'") or die(mysql_error());
mysql_query("DELETE FROM ff_ledgercard WHERE ffid = '$id'") or die(mysql_error());
header('location:ffTable');
mysql_close($con);
?>