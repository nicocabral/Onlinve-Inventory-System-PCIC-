<?php session_start();
include('includes/dbconn.php');
if(isset($_POST['save'])){

$itemname = mysql_real_escape_string(trim($_POST['itempurchase']));
$pqty =  mysql_real_escape_string(trim($_POST['pqty']));
$cost = mysql_real_escape_string(trim($_POST['cost']));
$totalcost = mysql_real_escape_string(trim($_POST['totalcost']));
$date = mysql_real_escape_string(trim($_POST['date']));

if(empty($itemname) || empty($pqty) || empty($pqty) || empty($cost) || empty($totalcost) || empty($date)){
 $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:purchase_pageTable");
	$_SESSION['class'] = 'danger';}
else{

$query ="INSERT INTO pcic_purchase VALUES(NULL,'$itemname','$pqty','$cost','$totalcost','$date')";
$result = mysql_query($query) or die (mysql_error());
	if($result){
	 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico"><strong> '.$itemname.' save successfully</strong>';
    header("Location:purchase_pageTable");
	$_SESSION['class'] = 'success';exit();
	}
	else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png"> Sorry unable to process your request!';
    header("Location:purchase_pageTable");
				exit();}}} 
	mysql_close($con);

?>