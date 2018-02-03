<?php 
session_start();
include('includes/dbconn.php');
	if(isset($_POST['save'])){
		$eno = intval($_POST['idno']);
		$id = intval($_POST['id']);
		$date = trim($_POST['date']);
		$isdate = new DateTime($date);
		$dateacquired = trim($_POST['dateacquired']);
		$qty = trim($_POST['qty']);
		$name = mysql_real_escape_string($_POST['name']);
		$dep = trim($_POST['mdep']);
		$amount = trim($_POST['amount']);
		$sval = trim($_POST['sval']);
		$elife = trim($_POST['elife']) + 1;
		$datea = trim($_POST['datea']);
		$pdate = trim($_POST['pdate']);
		$pd = date('m',strtotime($pdate))+1;
		$py = date('Y',strtotime($pdate));
		$p_date = new DateTime($pdate);
		$a = 0;
		$b = 0;
		$c = 0;
		$d = 0;
		$e = 0;
		$bval = 0;
		$bv = 0;
		$dd= 0;
		$z = 0;
		$da = new DateTime($datea);
		$checkyear = date('Y',strtotime($date));
		$checkmonth = date('m',strtotime($date));
		$date_check = date('m',strtotime($date));
		if($date_check==1){
			$date_check = $date_check + 12;
			
			}else{
				$date_check = $date_check;
				}
		
		if($pd == $date_check){
		
		$check = mysql_query("SELECT date FROM transportation_ledgercard WHERE  tid = '$eno' Group by tid") or die (mysql_error());
		if($r = mysql_fetch_array($check)){
			$z = $r['date'];
				if(date('Y',strtotime($z)) > $checkyear){
			$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y').'&nbsp; this item acquired on '.$da->format('M d, Y').'</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();
				}
			if(date('Y',strtotime($z))>=$checkyear){
				if(date('m',strtotime($z)) > $checkmonth){
					$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y').'&nbsp; this item acquired on '.$da->format('M d, Y').'</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();}else {
		$sql = mysql_query("SELECT tid,cost,date,depreciation,accum_deplm,accum_deptm,bookvalue FROM transportation_ledgercard WHERE tid = '$eno'") or die (mysql_error());
		while($row=mysql_fetch_array($sql)){
			$deplm = $row['accum_deplm'];
			$deptm = $row['accum_deptm'];
			$bookvalue = $row['bookvalue'];
			$datedep = $row['date'];
			$a = $a + $row['depreciation'];
			$b = $a + $dep;
			$bv = $row['cost'];
			$bval = $bv - $b;
			$d1 = $row['date'];
			$d = date('Y',strtotime($row['date']));
			$e = date('m',strtotime($date));
			$dd = date('Y',strtotime($date));
		}
		$checkdate = mysql_query("SELECT date,tid FROM transportation_ledgercard WHERE Year(date) = '$dd' AND Month(date) = '$e' AND tid = '$eno'") or die (mysql_error());
			if(mysql_num_rows($checkdate)>0){
				$y = 0;
				while($rows = mysql_fetch_array($checkdate)){
					$y = new DateTime($rows['date']);}
				$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y'). '&nbsp; Due to duplicated date as of '.$y->format('M d, Y').'</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();
				}
		if(number_format($bval,0,'.','')<number_format($sval,0,'.','')){
			$depreciated = "INSERT INTO t_depreciated VALUES(NULL,'$eno','$name','$datedep','$qty','$amount',0,'$deptm','$deptm','$bookvalue','Depreciated','$dateacquired')";
			$res = mysql_query($depreciated) or die (mysql_error());
			if($res){
			 $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory,'.$name.' Unable to update in ' .$isdate->format('M d, Y'). ' Exceeded designated amount in NET BOOK VALUE</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();}
			}else {
		
				$q = "INSERT INTO transportation_ledgercard VALUES(NULL,'$eno','$name','$date','$amount','$dep','$b','$a','$bval')";
				$result = mysql_query($q) or die (mysql_error());
	
				if($result){
				 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong>'.$name.' Updated on ' .$isdate->format('M d, Y'). ' Updated successfully</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'success';exit();	
				}
				else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> Sorry unable to process your request!';
    header("Location:tTable");
				exit();}}
		
		}
					
	}
	
	else{
					
		
	
		$sql = mysql_query("SELECT tid,cost,date,depreciation,accum_deplm,accum_deptm,bookvalue FROM transportation_ledgercard WHERE tid = '$eno'") or die (mysql_error());
		while($row=mysql_fetch_array($sql)){
			$deplm = $row['accum_deplm'];
			$deptm = $row['accum_deptm'];
			$bookvalue = $row['bookvalue'];
			$datedep = $row['date'];
			$a = $a + $row['depreciation'];
			$b = $a + $dep;
			$bv = $row['cost'];
			$bval = $bv - $b;
			$d1 = $row['date'];
			$d = date('Y',strtotime($row['date']));
			$e = date('m',strtotime($date));
			$dd = date('Y',strtotime($date));
			//if(date('m',strtotime($d1))==date('m',strtotime($date)) && $d == date('Y',strtotime($date))){
//	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp;'.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y'). '&nbsp; Due to duplicated date in (Month, Year or Date).</strong>';
//    header("Location:edpTable");
//	$_SESSION['class'] = 'danger';exit();
//				}
			}
			$checkdate = mysql_query("SELECT date,tid FROM transportation_ledgercard WHERE Year(date) = '$dd' AND Month(date) = '$e' AND tid = '$eno'") or die (mysql_error());
			if(mysql_num_rows($checkdate)>0){
				$y = 0;
				while($rows = mysql_fetch_array($checkdate)){
					$y = new DateTime($rows['date']);}
				$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y'). '&nbsp; Due to duplicated date as of '.$y->format('M d, Y').'</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();
				}
				$count = mysql_query("SELECT COUNT(*) as total FROM transportation_ledgercard WHERE tid = '$eno'") or die (mysql_error());
		if($counttotal = mysql_fetch_array($count))
			if($counttotal['total']==$elife){
				$depreciated = "INSERT INTO t_depreciated VALUES(NULL,'$eno','$name','$datedep','$qty','$amount',0,'$deptm','$deptm','$bookvalue','Depreciated','$dateacquired')";
			$res = mysql_query($depreciated) or die (mysql_error());
			if($res){
			 $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory,'.$name.' Unable to update in ' .$isdate->format('M d, Y'). ' Exceeded designated amount in NET BOOK VALUE</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();}
			}else {
		
				$q = "INSERT INTO transportation_ledgercard VALUES(NULL,'$eno','$name','$date','$amount','$dep','$b','$a','$bval')";
				$result = mysql_query($q) or die (mysql_error());
	
				if($result){
				 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong>'.$name.' Updated on ' .$isdate->format('M d, Y'). ' Updated successfully</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'success';exit();	
				}
				else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> Sorry unable to process your request!';
    header("Location:tTable");
				exit();}} }}}else{
						if(date('Y',strtotime($date))>$py){
			$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y'). '&nbsp; last date updated on '.$p_date->format('M d, Y').'</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();
			}
					$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.'&nbsp; Unable to update on &nbsp;' .$isdate->format('M d, Y'). '&nbsp; last date updated on '.$p_date->format('M d, Y').'</strong>';
    header("Location:tTable");
	$_SESSION['class'] = 'danger';exit();
					}}
				
			mysql_close($con);
?>