<?php 
session_start();
include('includes/dbconn.php');
	if(isset($_POST['save'])){
		$eno = intval($_POST['eno']);
		$name = mysql_real_escape_string(trim($_POST['name']));
		$des = mysql_real_escape_string(trim($_POST['des']));
		$qty = trim($_POST['qty']);
		$amount = trim($_POST['tamount']);
		$date = mysql_real_escape_string(trim($_POST['date']));
		$svalue =trim($_POST['samount']);
		$mdep = trim($_POST['mdep']);
		$elife = trim($_POST['elife']);
		$a=0;
		$b=0;
		$c=0;
		if($mdep==0 && $elife==0){
			$a = $svalue;
			$b = $amount-$a;
			$c = $amount - $a;
			}else {
				$a = 0;
				$b = 0;
				$c = 0;}
		$query = mysql_query("SELECT eno FROM edp_ledgercard WHERE eno = '$eno'") or die (mysql_error());
		if(mysql_num_rows($query)>0){
			$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Sorry, Due to duplication of id. Page needs to be refresh, Thank you! For security purposes only PLEASE REFRESH THE PAGE</strong>';
    header("Location:edp");
	$_SESSION['class'] = 'danger';
			}else {
		if(empty($name) || empty($des) || empty($qty) || empty($date) || empty($svalue)){
			$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:edp");
	$_SESSION['class'] = 'danger';
			}else{
				$sql = "INSERT INTO edp_equipement VALUES(NULL,'$name','$des','$qty','$amount','$date','$elife','$svalue','$mdep','$eno')";
				$q = "INSERT INTO edp_ledgercard VALUES(NULL,'$eno','$name','$date','$amount','$a','$b','$c','$svalue')";
				$res = mysql_query($sql) or die (mysql_error());
				$result = mysql_query($q) or die (mysql_error());
				if($res && $result){
					
				 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong> ' .$name. ' save successfully</strong>';
    header("Location:edp");
	$_SESSION['class'] = 'success';exit();	
				}
				else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> Sorry unable to process your request!';
    header("Location:edp");
				exit();}} 
	
				
		
		
	
		}}
			mysql_close($con);
?>