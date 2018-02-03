<?php 
session_start();
include('includes/dbconn.php');
	$del  = mysql_query("DELETE FROM upload") or die(mysql_error());
	if($del){
		 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" width="20px;"><strong> Clean successfully</strong>';
    header("Location:download");
	$_SESSION['class'] = 'success';
		
		
		}else{
			$_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" width="20px;"><strong> Sorry unable to process your request</strong>';
    header("Location:download");
	$_SESSION['class'] = 'warning';
		
			}
	
?>