<?php
session_start();
include('includes/dbconn.php');
if(isset($_POST['update'])){
    $idArr = $_POST['checked_id'];
    foreach($idArr as $id){
       $query = mysql_query("UPDATE pcic_requestitem SET status = 'Completed', purpose = 'OFFICE SUPPLY' WHERE id= '$id'") or die(mysql_error()); 
		$q = mysql_query("SELECT pcic_items.itemno,pcic_items.item_name,pcic_items.qty as itemqty,pcic_items.bal_qty,pcic_items.description,pcic_items.unit_cost,pcic_items.total_cost,pcic_items.bal_totalcost ,pcic_items.date_arrival,pcic_requestitem.id,pcic_requestitem.itemno as ritemno,pcic_requestitem.itemname,pcic_requestitem.qty,pcic_requestitem.department,pcic_requestitem.unit,pcic_requestitem.ucost,pcic_requestitem.tcots,pcic_requestitem.status,pcic_requestitem.timestamp as datestamp FROM pcic_items LEFT JOIN pcic_requestitem ON pcic_items.itemno=pcic_requestitem.itemno WHERE pcic_requestitem.id = '$id'") or die (mysql_error());	
		while( $row = mysql_fetch_assoc($q)){
		    $itemno = $row['itemno'];
			$itemname = $row['item_name'];
			$itemqty = $row['itemqty'];
			$itembalqty = $row['bal_qty'];
			$unitcost = $row['unit_cost'];
			$des = $row['description'];
			$dater = $row['date_arrival'];
			$totalcost =$row['total_cost'];
			$unit = $row['unit'];
			$baltotalcost = $row['bal_totalcost'];
			$qty = $row['qty'];
			$dep = $row['department'];
			$ucost = $row['ucost'];
			$tcost = $row['tcots'];
			$datestamp = $row['datestamp'];
			$totalcost1 = $ucost * $itemqty;
			$status = $row['status'];
			$newqty  = $itembalqty - $qty;
			$newtcost =  $ucost * $newqty;
			$totalissuedcost = $ucost * $qty;
			
			$s = mysql_query("INSERT INTO pcic_stockinventory VALUES(NULL,'$itemname','$itemqty','$unitcost','$totalcost','$qty','$unitcost','$tcost','$itembalqty','$unitcost','$baltotalcost','$datestamp','$itemno')") or die(mysql_error());
		}
	}
	if ($query){
	
	$ql = mysql_query("UPDATE pcic_items SET bal_qty = '$newqty',
					                         bal_totalcost = '$newtcost' WHERE itemno= '$id' ") or die(mysql_error());

    $sl = mysql_query("INSERT INTO  pcic_stockcard VALUES(NULL,'$itemno','$itemname','$des','$unit','$dater','$itemqty','$ucost','$totalcost1','$dep','$qty','$ucost','$totalissuedcost',NULL,'$newqty','$ucost','$newtcost','$datestamp')") or die (mysql_error());
	  
   $_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> Item Request updated!</strong>';
    header("Location:risTable");
	$_SESSION['class'] = 'success';exit();}
	else
	{ $_SESSION['success_msg'] = ' <strong><span class="glyphicon glyphicon-remove"></span> Sorry unable to process your request</strong>';
    header("Location:risTable");
	$_SESSION['class'] = 'danger';}
}

else if(isset($_POST['delete'])){
	 $idArr = $_POST['checked_id'];
    foreach($idArr as $id){
       $sql = mysql_query("DELETE FROM pcic_requestitem WHERE id = '$id'") or die(mysql_error()); 
    }
	if ($sql){
    $_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> Request deleted successfully!</strong>';
    header("Location:risTable");
	$_SESSION['class'] = 'success';exit();}else
	{ $_SESSION['success_msg'] = '<span class="glyphicon glyphicon-remove"></span> Sorry unable to process your request';
    header("Location:risTable");}
	
	}

?>