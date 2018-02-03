<?php session_start();
include('includes/dbconn.php');
$uid = intval($_SESSION['id']);
$uname =  mysql_real_escape_string($_POST['uname']);
$pword = mysql_real_escape_string($_POST['pword']);
$pwordr = mysql_real_escape_string(trim($_POST['pwordr']));
if($pword !=$pwordr){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Password did not match try again</strong>';
    header("Location:change_password");
	$_SESSION['class'] = 'danger';exit();
	}
if($pword>=3 && $pwordr>=3){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Password must contain atleast 3 character</strong>';
    header("Location:change_password");
	$_SESSION['class'] = 'warning';exit();
	}else{

if(empty($uname) || empty ($pword) || empty($pwordr)){
$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Please check your fields</strong>';
    header("Location:change_password");
	$_SESSION['class'] = 'danger';
	exit();}
else {
$sql ="UPDATE pcic_accounts SET 
								  username = '$uname',
								  password = '$pwordr'
								   WHERE id = '$uid' ";
$res = mysql_query($sql);
}if($res){
	$_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok.ico" class="img-responsive" width="30px;"> <strong>Password Change.Please log out to take effect</strong>';
    header("Location:change_password");
	$_SESSION['class'] = 'success';exit();}else{
					$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Sorry unable to process your request!</strong>';
    header("Location:change_password");
	$_SESSION['class'] = 'danger';
					exit();} }
	mysql_close($con);

?>