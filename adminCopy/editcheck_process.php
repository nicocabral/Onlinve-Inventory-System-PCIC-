<?php session_start();
include('includes/dbconn.php');
	$idno = trim($_POST['id']);
	$ckno = mysql_real_escape_string(trim($_POST['ckno']));
	$ckdate = mysql_real_escape_string(trim($_POST['ckdate']));
	$payee = mysql_real_escape_string(trim($_POST['payee']));
	$address = mysql_real_escape_string(trim($_POST['address']));
	$orno = mysql_real_escape_string(trim($_POST['orno']));
	$amount = mysql_real_escape_string(trim($_POST['amount']));
	$peo = mysql_real_escape_string(trim($_POST['peo']));
	$stat = mysql_real_escape_string(trim($_POST['stat']));
	$part = mysql_real_escape_string(trim($_POST['part']));
	$dr = mysql_real_escape_string(trim($_POST['dr']));
	$remarks = mysql_real_escape_string(trim($_POST['remarks']));
	$id = mysql_real_escape_string(trim($_POST['idtidno']));
	$dvno = mysql_real_escape_string(trim($_POST['dv_no']));
		//if(empty($ckno) || empty($payee) ||  empty($amount)){
//				$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Oooops! Sorry,Fields cannot be empty. Please try again!</strong>';
//    header("Location:cfTable");
//	$_SESSION['class'] = 'danger';exit();
//			}
$sql = mysql_query("SELECT checkno FROM cf_inventory WHERE checkno = '$ckno'") or die (mysql_error());
if(mysql_num_rows($sql)>0){
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Oooops! Sorry, Unable to process your request! Duplicate Check no '.$ckno.'</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'danger';exit();
	}else{
		$query ="UPDATE cf_inventory  SET checkno = '$ckno',
										  checkdate = '$ckdate',
										  payee_name = '$payee',
										  amount = '$amount',
										  orno = '$orno',
										  address = '$address',
										  peo = '$peo',
										  status = '$stat',
										  particular = '$part',
										  date_recieved = '$dr',
										  remarks = '$remarks',
										  dvno = '$dvno',
										  idtypeandno = '$id' WHERE id ='$idno'";
		$result = mysql_query($query) or die (mysql_error());
		if($result){
			$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> Check no: '.$ckno.' Updated successfully</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'success';exit();}
	else {
		$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Oooops! Sorry, Unable to process your request!</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'danger';exit();
		}}
	mysql_close($con);
	
?>