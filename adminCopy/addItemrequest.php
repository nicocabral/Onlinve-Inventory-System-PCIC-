<?php session_start();
include('includes/dbconn.php');
	if(isset($_POST['ok'])){
	$dater = mysql_real_escape_string(trim($_POST['dater']));
	$datereq = mysql_real_escape_string(trim($_POST['datereq']));
	$itemno = mysql_real_escape_string(trim($_POST['itemno']));
	$itemname = mysql_real_escape_string(trim($_POST['itemname']));
	$des = mysql_real_escape_string(trim($_POST['des']));
	$spec = mysql_real_escape_string(trim($_POST['spec']));
	$unit = mysql_real_escape_string(trim($_POST['unit']));
	$qty = mysql_real_escape_string(trim($_POST['bqty']));
	$ucost = mysql_real_escape_string(trim($_POST['unitcost']));
	$totalcost = mysql_real_escape_string(trim($_POST['totalcost']));
	$office = 'PCIC R08';
	$dep = $_SESSION['dep'];
	$reqby = $_SESSION['name'];
	$designation = $_SESSION['position'];
	$qty1 = mysql_real_escape_string(trim($_POST['qty1']));
	$status='Pending';
	$newqty = $qty - $qty1;
	$newtcost = $ucost * $newqty;
	$reqtotalcost = $ucost * $qty1;
	$id =intval($_POST['idno']);
	$issuedqty = 0;
	$totalissuedcost = $ucost * $qty1;

		
	
	if($qty1>$qty){
		$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-remove"></span> Please request lower than qty of an item</strong>';
    header("Location:availablestocks_requestTable");
	$_SESSION['class'] = 'danger';
		
			exit();}
	if(empty($qty)){
	$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-remove"></span> Quantity must not be empty.Try again</strong>';
    header("Location:availablestocks_requestTable");
	$_SESSION['class'] = 'danger';exit();
	}else{
	$q = mysql_query("SELECT purpose from pcic_reqpurpose WHERE department = '$dep'") or die (mysql_error());
		if($row = mysql_fetch_array($q))
		$purpose = $row['purpose'];
	$query = "INSERT INTO pcic_requestitem VALUES(NULL,'$itemno','$itemname','$des','$spec','$unit','$qty1','$ucost','$reqtotalcost','$dep','$office','OFFICE SUPPLY','$status','$reqby','$designation','$datereq')";
	$result = mysql_query($query) or die(mysql_error());
	if($result){
		$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span>'.$itemname; $des; $spec.' requested!</strong>';
    header("Location:availablestocks_requestTable");
	$_SESSION['class'] = 'success';exit();
		}else{
			$_SESSION['success_msg'] = '<span class="glyphicon glyphicon-remove"></span> Sorry unable to process your request!';
    header("Location:availablestocksTable");
				
			}
	}}
	mysql_close($con);

?>