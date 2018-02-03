<?php session_start();
include('includes/dbconn.php');
if(isset($_POST['save'])){

$accountname = mysql_real_escape_string(trim($_POST['accountname']));
$ausername =  mysql_real_escape_string(trim($_POST['uname']));
$apass =  mysql_real_escape_string(trim($_POST['pass']));
$apassconfirm =  mysql_real_escape_string(trim($_POST['passconfirm']));
$accounttype = mysql_real_escape_string(trim($_POST['accounttype']));
$pos = mysql_real_escape_string(trim($_POST['pos']));
$dep = mysql_real_escape_string(trim($_POST['dep']));
if($apass!=$apassconfirm){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Password did not match try again</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'danger';
	$_SESSION['hasclass'] = 'has-error';exit();
}
if($apassconfirm>3){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Password must contain atleast 3 character</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'danger';
	$_SESSION['hasclass'] = 'has-error';
	exit();
	}	
	else{

if(empty($accountname) || empty($ausername) || empty($apass) || empty($apassconfirm) || empty($accounttype) || empty($pos) || empty($dep)){
 $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'danger';
	$_SESSION['hasclass'] = 'has-error';}
else{

$query ="INSERT INTO pcic_accounts VALUES(NULL,'$accountname','$ausername','$apassconfirm','$accounttype','$pos','$dep')";
$result = mysql_query($query) or die (mysql_error());
	if($result){
	 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico"><strong> '.$itemname.' save successfully</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'success';exit();
	}
	else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> Sorry unable to process your request!';
    header("Location:systemuserTable");
				exit();}}}} 
				//update........................
if(isset($_POST['update'])){
$accountname = mysql_real_escape_string(trim($_POST['accountname']));
$ausername =  mysql_real_escape_string(trim($_POST['uname']));
$apass =  mysql_real_escape_string(trim($_POST['pass']));
$apassconfirm =  mysql_real_escape_string(trim($_POST['passconfirm']));
$accounttype = mysql_real_escape_string(trim($_POST['accounttype']));
$pos = mysql_real_escape_string(trim($_POST['pos']));
$dep = mysql_real_escape_string(trim($_POST['dep']));
$id = intval($_POST['id']);
if($apass!=$apassconfirm){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Password did not match try again</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'danger';
	$_SESSION['hasclass'] = 'has-error';exit();
}
if($apassconfirm>3){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Password must contain atleast 3 character</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'danger';
	$_SESSION['hasclass'] = 'has-error';
	exit();
	}	
	else{

if(empty($accountname) || empty($ausername) || empty($apass) || empty($apassconfirm) || empty($accounttype) || empty($pos) || empty($dep)){
 $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'danger';
	$_SESSION['hasclass'] = 'has-error';}
else{

$query ="UPDATE  pcic_accounts SET  name = '$accountname',
									username = '$ausername',
									password = '$apassconfirm',
									usertype ='$accounttype',
									position = '$pos',
									office = '$dep' WHERE id = '$id'";
$result = mysql_query($query) or die (mysql_error());
	if($result){
	 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico"><strong> '.$itemname.' updated successfully</strong>';
    header("Location:systemuserTable");
	$_SESSION['class'] = 'success';exit();
	}
	else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> Sorry unable to process your request!';
    header("Location:systemuserTable");
				exit();}}}
	
	
	}
	mysql_close($con);

?>