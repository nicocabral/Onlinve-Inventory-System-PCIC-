<?php include('includes/dbconn.php');
session_start();
if(isset($_POST['submit'])){
	$dep = mysql_real_escape_string(trim($_POST['dep']));
	$office = 'PCIC R08';
	$purpose = 'OFFICE SUPPLIES';
	
	if(empty($dep) || empty($office) || empty($purpose)){
		$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:availablestocks_page");
	$_SESSION['class'] = 'danger';
		
		}
	else {
		$sql = "INSERT INTO pcic_reqpurpose VALUES(NULL,'$dep','$office','$purpose')";
		$result = mysql_query($sql) or die (mysql_query());
	if($result){
		 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico"><strong>You can now request stocks</strong>';
    header("Location:availablestocks_request_page");
	$_SESSION['class'] = 'success';exit();}
	else {
		$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> Sorry unable to process your request!';
    header("Location:availablestocksTable");
				exit();
				}
		
		}
	
	}
	mysql_close($con);



?>