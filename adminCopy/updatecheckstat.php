<?php session_start();
include('includes/dbconn.php');
if(isset($_POST['update'])){
	$from = intval($_POST['checknofrom']);
	$to = intval($_POST['checknoto']);
	$peo = mysql_real_escape_string(trim($_POST['peo']));
	$stat = mysql_real_escape_string(trim($_POST['stat']));
	$date = mysql_real_escape_string(trim($_POST['date']));

	$sql = "UPDATE cf_inventory SET status = '$stat', date_recieved = '$date' WHERE peo = '$peo' AND checkno BETWEEN '$from' AND '$to'";
	$result = mysql_query($sql) or die (mysql_error());
	if($result == true){
		echo '<script>window.alert("Updated Successfully!");
					  window.location.assign("cf_inventory_page.php");</script>';
	}else {
	echo '<script>window.alert("Sorry Unable to process your request!");
					  window.location.assign("cf_inventory_page.php");</script>';
	}
}
?>