<?php 
session_start();
include('includes/dbconn.php');
	if(isset($_POST['submit'])){
		$itemno = $_POST['itmno'];
		$itemname = $_POST['itemname'];
		$qty = mysql_real_escape_string(trim($_POST['qty']));
		$dep = mysql_real_escape_string(trim($_POST['dep']));
		$query = mysql_query("INSERT INTO pcic_app VALUES(NULL,'$itemno','$itemname','$qty',NULL,'$dep',now())") or die (mysql_error());
		if($query){
			header("location:app_Table");
			}
			else {echo '<script>window.alert("Sorry unable to process your request!");
								window.location("location:app_Table");</script>';}
		}
?>