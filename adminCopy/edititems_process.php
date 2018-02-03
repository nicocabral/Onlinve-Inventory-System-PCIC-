<?php session_start();
include('includes/dbconn.php');
if(isset($_POST['update'])){
$id = intval(trim($_POST['id']));
$itemname = mysql_real_escape_string(trim($_POST['itemname']));
$description =  mysql_real_escape_string(trim($_POST['des']));
$unit = mysql_real_escape_string(trim($_POST['unit']));
$qty = mysql_real_escape_string(trim($_POST['qty']));
$bqty = mysql_real_escape_string(trim($_POST['bqty']));
$spec = mysql_real_escape_string(trim($_POST['spec']));
$ucost = mysql_real_escape_string(trim($_POST['ucost']));
$newbqty = $qty + $bqty;
$itemno = mysql_real_escape_string(trim($_POST['itemno']));


$totalcost = $ucost * $newbqty;
$tcost = $ucost * $qty;
$date = trim($_POST['date']);

if(empty($unit)|| empty($ucost) || empty($date))
{$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:stock_pageTable");
	
	$_SESSION['class'] = 'danger';exit();}
else{

$query ="UPDATE pcic_items SET 
								
								qty = '$newbqty',
								bal_qty = '$newbqty',
								
								unit_cost = '$ucost',
								total_cost = '$totalcost',
								bal_totalcost = '$totalcost',
								date_arrival = '$date'
						
								 WHERE id = '$id'";
$result = mysql_query($query) or die (mysql_error());
	$sql =mysql_query("INSERT INTO pcic_stockcard VALUES(NULL,'$itemno','$itemname','$description','$unit','$date','$qty','$ucost','$tcost',NULL,NULL,NULL,NULL,'Updated','$newbqty','$ucost','$totalcost','$date')") or die (mysql_error());
	
	if($result ==true && $sql==true){
	 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong>'.$itemname.' updated successfully</strong>';
    header("Location:stock_pageTable");
	$_SESSION['class'] = 'success';
				exit();}else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"> Sorry unable to process your request!';
    header("Location:stock_pageTable");
				exit();} }
	
}
if(isset($_POST['edit'])){
$id = intval(trim($_POST['id']));
$itemname = mysql_real_escape_string(trim($_POST['itemname']));
$description =  mysql_real_escape_string(trim($_POST['des']));
$unit = mysql_real_escape_string(trim($_POST['unit']));
$qty = mysql_real_escape_string(trim($_POST['qty']));
$bqty = mysql_real_escape_string(trim($_POST['bqty']));
$spec = mysql_real_escape_string(trim($_POST['spec']));
$ucost = mysql_real_escape_string(trim($_POST['ucost']));
$newbqty = $qty + $bqty;
$itemno = mysql_real_escape_string(trim($_POST['itemno']));
$cat = mysql_real_escape_string(trim($_POST['cat']));
$balqty = mysql_real_escape_string(trim($_POST['bqty']));
$baltc = $ucost * $balqty;
$totalcost = $ucost * $newbqty;
$tcost = $ucost * $qty;
$date = trim($_POST['date']);
	if(empty($itemname) || empty($description) || empty($unit) || empty($spec) || empty($ucost) || empty($date)||empty($cat))
{$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"> <strong>Fields must not be empty.Try again</strong>';
    header("Location:stock_pageTable");
	
	$_SESSION['class'] = 'danger';exit();}
else{

$query ="UPDATE pcic_items SET item_name = '$itemname',
								description = '$description',
								unit = '$unit',
								qty = '$qty',
								bal_qty = '$balqty',
								bal_totalcost = '$baltc',
								specification = '$spec',
								unit_cost = '$ucost',
								total_cost = '$tcost',
								
								date_arrival = '$date',
								category = '$cat'
						
								 WHERE id = '$id'";

$result = mysql_query($query) or die (mysql_error());

	if($result){
		//$sql =mysql_query("UPDATE pcic_stockcard SET stockitemname = '$itemname',
//														  stockdescription = '$description',
//														  date_recieved = '$date',
//														  stockunit = '$unit',
//														  recieved_qty = '$qty',
//														  recieved_cost = '$ucost',
//														  recievedtotalcost = '$tcost',
//														  stockendbal = '$balqty',
//														  stockcost = '$ucost',
//														  stocktotalcost = '$baltc'
//														  WHERE stockno = '$itemno'") or die (mysql_error());
//		
	 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong> &nbsp;'.$itemname.' updated successfully</strong>';
    header("Location:stock_pageTable");
	$_SESSION['class'] = 'success';
				exit();}else{
	$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"> Sorry unable to process your request!';
    header("Location:stock_pageTable");
				exit();} }
	

	
	
	}
mysql_close($con);
?>