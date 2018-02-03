<?php 
session_start();
include('includes/dbconn.php');
	if(isset($_POST['save'])){
		$eno = intval($_POST['idno']);
		$id = intval($_POST['id']);
		$name = mysql_real_escape_string(trim($_POST['name']));
		$des = mysql_real_escape_string(trim($_POST['des']));
		$qty = trim($_POST['qty']);
		$amount = trim($_POST['amount']);
		$date = mysql_real_escape_string(trim($_POST['date']));
		$svalue = trim($_POST['samount']);
		$mdep = trim($_POST['mdep']);
		$elife = trim($_POST['elife']);
	$b = 0;
		if($mdep == 0){
			$a = number_format($amount,2,'.','') - number_format($svalue,2,'.','');
			$b = $svalue;
			}else {
				$a = 0;
				$b = 0;
				}
		
		if(empty($name) || empty($des) || empty($qty) || empty($date)){
			$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:ffTable");
	$_SESSION['class'] = 'danger';
			}else{
				$sql = "UPDATE fixtureandfurniture SET itemname = '$name',
												   qty = '$qty',
												   amount = '$amount',
												   date_acquired = '$date',
												   e_life = '$elife',
												   s_val = '$svalue',
												   m_dep = '$mdep'
												   WHERE id = '$id'";
				$q = "UPDATE ff_ledgercard SET 
												itemname = '$name',
												date = '$date',
												cost = '$amount',
												depreciation = 'b',
												accum_deplm = '$a',
												accum_deptm = '$a',
												bookvalue = '$svalue'
												WHERE 
												ffid = '$eno'";
				$result = mysql_query($q) or die (mysql_error());
				$res = mysql_query($sql) or die (mysql_error());
				if($res && $result){
				 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong> ' .$name. ' Updated successfully</strong>';
    header("Location:ffTable");
	$_SESSION['class'] = 'success';exit();	
				}
				else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> Sorry unable to process your request!';
    header("Location:ffTable");
				exit();}} 
	
				
		
		
	
		}
			mysql_close($con);
?>