<?php include('includes/dbconn.php');
session_start();
if(isset($_POST['btnpeo'])){
	$peo = mysql_real_escape_string($_POST['peo']);
	$date = mysql_real_escape_string(trim($_POST['dateupdate']));
	$newDate = new DateTime($date);
	$t = 'Transmitted &nbsp;'.$newDate->format('M d, Y');
	$sql = mysql_query("SELECT * FROM cf_inventory WHERE status = ' ' AND peo = '$peo'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
	$query = mysql_query("UPDATE cf_inventory set status = '$t' WHERE peo = '$peo'") or die (mysql_error());
	if($query==true){
		header("location:cf_inventory_page");}else {
			echo '<script>window.alert("Sorry unable to process your request");
						  window.location("cf_inventory_page");</script>';}
	}else {exit();}}
	//--------------------------------------------------------------------------------
else if(isset($_POST['btncheckrange'])){
		$peo = mysql_real_escape_string($_POST['peo']);
		$from = intval($_POST['from']);
		$to = intval($_POST['to']);
		$date = mysql_real_escape_string(trim($_POST['dateupdate']));
	$newDate = new DateTime($date);
	$t = 'Transmitted &nbsp;'.$newDate->format('M d, Y');
		$sql = mysql_query("SELECT * FROM cf_inventory WHERE status = ' ' AND peo = '$peo' AND checkno BETWEEN '$from' AND '$to'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		$query = mysql_query("UPDATE cf_inventory set status = '$t' WHERE peo = '$peo' AND checkno BETWEEN '$from' AND '$to'") or die (mysql_error());
		if($query==true){
			header("location:cf_inventory_page");
			}else{
				echo '<script>window.alert("Sorry unable to process your request");
						  window.location("cf_inventory_page");</script>';
				}
	}
	else {exit();}
	}
	//===============================================================================
else if (isset($_POST['btnpeoaddress'])){
	$address = mysql_real_escape_string(trim($_POST['adddress']));
	//$f = intval($_POST['ckfrom']);
	//$t = intval($_POST['ckto']);
	$date = mysql_real_escape_string(trim($_POST['dateupdate']));
	$newDate = new DateTime($date);
	$t = 'Transmitted &nbsp;'.$newDate->format('M d, Y');
		$sql = mysql_query("SELECT * FROM cf_inventory WHERE status = ' ' AND address = '$address'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		$query = mysql_query("UPDATE cf_inventory set status = '$t' WHERE address = '$address'") or die (mysql_error());
		if($query==true){
			header("location:cf_inventory_page");
			}else{
				echo '<script>window.alert("Sorry unable to process your request");
						  window.location("cf_inventory_page");</script>';
				}
	}
	else {exit();}
	
	}
	//==============================================================================
	else if (isset($_POST['btncheckrangeaddress'])){
	$address = mysql_real_escape_string(trim($_POST['adddress']));
	$f = intval($_POST['ckfrom']);
	$to = intval($_POST['ckto']);
	$date = mysql_real_escape_string(trim($_POST['dateupdate']));
	$newDate = new DateTime($date);
	$t = 'Transmitted &nbsp;'.$newDate->format('M d, Y');
		$sql = mysql_query("SELECT * FROM cf_inventory WHERE status = ' ' AND address = '$address' AND checkno BETWEEN '$from' AND '$to'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		$query = mysql_query("UPDATE cf_inventory set status = '$t' WHERE address = '$address' AND checkno BETWEEN '$f' AND '$to'") or die (mysql_error());
		if($query==true){
			header("location:cf_inventory_page");
			}else{
				echo '<script>window.alert("Sorry unable to process your request");
						  window.location("cf_inventory_page");</script>';
				}
	}
	else {exit();}
	
	}
	
?>