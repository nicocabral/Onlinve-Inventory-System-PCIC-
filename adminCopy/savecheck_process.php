<?php session_start();
include('includes/dbconn.php');

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
	$dvno = mysql_real_escape_string($_POST['dv_no']);
	$sql = mysql_query("SELECT * FROM cf_inventory WHERE checkno = '$ckno'") or die (mysql_error());
		if(mysql_num_rows($sql)>0){
			echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-warning");
						$("#ackMsg").html("<center>Checkno already exist!</center>");
						
					</script>';
	//$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-exclamation-sign"></span> '.$ckno.' checkno already exist.</strong>';
//    header("Location:cf_inventory_page");
//	$_SESSION['class'] = 'danger';
exit();
			}else{
		if(empty($ckno) || empty($ckdate) || empty($payee) || empty($amount)){
			echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-warning");
						$("#ackMsg").html("<center>Oooops! Sorry,Fields cannot be empty. Please try again!</center>");
						
					</script>';
				//$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Oooops! Sorry,Fields cannot be empty. Please try again!</strong>';
//    header("Location:cf_inventory_page");
//	$_SESSION['class'] = 'danger';
exit();
			}
		$query ="INSERT INTO cf_inventory VALUES(NULL,'$ckno','$ckdate','$payee','$amount','$orno','$address','$peo','$stat','$part','$dr','$remarks','$id','$dvno')";
		$result = mysql_query($query) or die (mysql_error());
		if($result){
			echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-success");
						$("#ackMsg").html("<center> <strong>'.$ckno.' </strong>save successfully</center>");
					
						
					</script>';
			//$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> '.$ckno.' save successfully</strong>';
//    header("Location:cf_inventory_page");
//	$_SESSION['class'] = 'success';
exit();}
	else {
		//$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Oooops! Sorry, Unable to process your request!</strong>';
//    header("Location:cf_inventory_page");
//	$_SESSION['class'] = 'danger';
echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-warning");
						$("#ackMsg").html("<center>Sorry Unable to process your request</center>");
						
					</script>';
exit();
		}}
	mysql_close($con);
	
?>