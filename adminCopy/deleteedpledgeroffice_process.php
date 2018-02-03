<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
//mysql_query("DELETE FROM edp_equipement WHERE e_no = '$id'") or die(mysql_error());
$q = mysql_query("DELETE FROM office_ledgercard WHERE id = '$id'") or die(mysql_error());
if ($q){
	 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong> Deleted successfully</strong>';				
					header('location:office_equipment_page');
					$_SESSION['class'] = 'success';
}

mysql_close($con);
?>