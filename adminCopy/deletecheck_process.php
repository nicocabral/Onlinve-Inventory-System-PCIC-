<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
$q = mysql_query("DELETE FROM cf_inventory WHERE id = '$id'") or die(mysql_error());
if($q == true){
	$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> Deleted Successfully</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'success';
mysql_close($con);}
else {
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Sorry Unable to process your request</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'danger';}
?>