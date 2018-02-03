<?php session_start();
include('includes/dbconn.php');
$id = intval($_SESSION['id']);
$name = mysql_real_escape_string(trim($_POST['name']));
$utype = mysql_real_escape_string(trim($_POST['utype']));
$position = mysql_real_escape_string(trim($_POST['position']));
$office = mysql_real_escape_string(trim($_POST['office']));

if(empty($name) || empty($utype) || empty($position) || empty($office))
{$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Fields must not be empty</strong>';
    header("Location:update_account");
	$_SESSION['class'] = 'danger';
	exit();}
else {
$query ="UPDATE pcic_accounts SET name = '$name',
								
								  usertype = '$utype',
								  position = '$position',
								  office = '$office' WHERE id = '$id' ";
$result = mysql_query($query);
	if($result){
	$_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok.ico" class="img-responsive" width="30px;"> <strong>Account updated.Please log out to take effect</strong>';
    header("Location:update_account");
	$_SESSION['class'] = 'success';exit();}else{
					$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Sorry unable to process your request!</strong>';
    header("Location:update_account");
	$_SESSION['class'] = 'danger';
					exit();} 
	}mysql_close($con);

?>