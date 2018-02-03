<?php date_default_timezone_set('Asia/Manila');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype']=='user'){header("location:../user/");}else{?>
<head>
 <link rel="shortcut icon" href="/PCIC/img/pcic.gif" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PCIC - IMS</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link href="assets/datatables.min.css" rel="stylesheet" type="text/css">

</head>
<script type="text/javascript" src="Assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
<script type="text/javascript">
	window.history.forward();
	function noback(){
			window.history.forward();
		}
</script>
<body class="col-lg-12">
<br /><p></p>

<div class="row">
 
<div class="col-lg-12">
<div class="col-md-6">
<div class="col-lg-2">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;" class="btn btn-primary" data-placement="bottom"><span class="glyphicon glyphicon-print"></span> Print</a></div>
<div class="col-lg-3">
<form method="post" action="inventorybackupexcel">
<input type="hidden" name="id" value="<?php echo $itemname = $_GET['id'];?>" />
<button class="btn btn-success" data-toggle="tooltip" title="Export data to excel" data-placement="bottom">Export to Excel</button>
</form>
</div>
<div class="col-lg-1">
<a href="stockcardTable" data-toggle="tooltip" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;" data-placement="bottom">Back</a></div>
 </div>
 <div class="col-lg-6"></div></div></div>
 
<div id="div1" style="font-size:12px;">
<div class="row">
 <div class="col-lg-12">     
<center>
 <p>
               Republic of the Philippines<br>
                Department of Agriculture<br>
                <strong>Philippine Crop Insurance Corporation</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center><hr />
<div style="text-align:center;">
                <p style="color:#000080; font-size:12px;"><strong>STOCK CARD</strong></p>
              	
                 </div>
            <div class="container" style="font-size:12px;">
            <span class="pull-right" style="font-size:12px;">STOCK NO.<?php
				include('includes/dbconn.php');
				$itemname = intval(trim($_GET['id']));
				 $s = mysql_query("SELECT stockno FROM pcic_stockcard WHERE stockno = '$itemname'") or die (mysql_error());
				if($r=mysql_fetch_array($s)){ echo '<strong>'.$r['stockno'].'</strong>';}?></span>
           
            <table width="100%" style="border: solid 1px;">
            
            <tr style="border: solid 1px;">
            <?php include('includes/dbconn.php');
			$itemname = intval(($_GET['id']));
			
			$sql = mysql_query("SELECT pcic_stockcard.stockno,pcic_stockcard.stockitemname,pcic_stockcard.stockunit,pcic_stockcard.stockdescription,pcic_items.specification,pcic_items.itemno FROM pcic_stockcard LEFT JOIN pcic_items ON pcic_stockcard.stockno = pcic_items.itemno WHERE pcic_stockcard.stockno = '$itemname' GROUP by pcic_stockcard.stockno") or die (mysql_error());
			if($row=mysql_fetch_assoc($sql)){?>
            <td colspan="5" style="font-size:12px;border: solid 1px;"><strong>ITEM :</strong> &emsp;<?php echo '<strong style="font-size:12px;">'.$row['stockitemname'].'</strong>'; ?>
            				<br /><strong>UNIT :</strong> &emsp;<?php echo '<strong style="font-size:12px;">'.$row['stockunit'].'</strong>';?></td>
            <td colspan="6" style="font-size:12px;border: solid 1px;"><strong>DESCRIPTION :</strong> &emsp;<?php echo '<strong style="font-size:12px;">'.$row['stockdescription'].'&nbsp;'.$row['specification'].'</strong>';}?></td></td>
            </tr>
           
            <tr style="font-size:12px;border: solid 1px;">
            <td colspan="4" style="text-align:center;border: solid 1px;"><strong>RECIEVED</strong></td>
            <td colspan="4" style="text-align:center;border: solid 1px;"><strong>ISSUED</strong></td>
            <td colspan="3" style="text-align:center;border: solid 1px;"><strong>BALANCE</strong></td></tr>
   
            <tr style="font-size:12px;border: solid 1px;">
            <th style="text-align:center; width:auto;border: solid 1px;">DATE</th>
            <th style="text-align:center; width:auto;  font-weight:bold;border: solid 1px;">QTY</th>
            <th style="text-align:center;border: solid 1px; width:auto;  font-weight:bold">UNIT COST</th>
            <th style="text-align:center;border: solid 1px; width:auto; font-weight:bold">TOTAL COST</th>
            <th style="text-align:center;border: solid 1px; width:auto;">ISSUED TO</th>
            <th style="text-align:center;border: solid 1px; width:auto; background-color: #0FC; color:#000; font-weight:bold">QTY</th>
            <th style="text-align:center;border: solid 1px; width:auto; font-weight:bold">UNIT COST</th>
            <th style="text-align:center;border: solid 1px; width:auto; background-color: #0FF; color:#000; font-weight:bold">TOTAL COST</th>
            <th style="text-align:center;border: solid 1px; width:auto;background-color: #3F9; color:#000; font-weight:bold">BAL QTY</th>
            <th style="text-align:center;border: solid 1px; width:auto; font-weight:bold">UNIT COST</th>
            <th style="text-align:center;border: solid 1px; width:auto;background-color: #3FC; color:#000; font-weight:bold">TOTAL COST</th>
            </tr>
             
            
            
             <?php include('includes/dbconn.php');
			$search = intval(trim($_GET['id']));
			
				$query = mysql_query("SELECT * FROM pcic_stockcard WHERE stockno = '$search'")or die(mysql_error());			
				$stockstarttotalcost = 0;
				$stockissuedqty = 0;
				$stockissuedtotalcost = 0;
				$stockendbalqty = 0;
				$stockendtotalcost = 0;
				$stockendbal = 0;
				$stockendamount = 0;
				$issuedqty = 0;
				$issuedtamount = 0;
				$stockcost = 0;
				$dater = '';
				$rqty = '';
				$rcost = '';
				$rtcost = '';
				
				if(mysql_num_rows($query)>0){
				
					
			?>
            <?php while($row=mysql_fetch_assoc($query)){
				$stockendbal = $row['stockendbal'];
				$stockendamount = $row['stocktotalcost'];
				$stockcost = $row['stockcost'];
				
				$issuedqty = $row['issuedqty'];
				$issuedcost = $row['issuedcost'];
				$issuedtamount = $row['issuedtotalcost'];
				if($row['status'] =='Updated'){
				$dater = 'RECIEVED';
				$rqty = '<strong>'.number_format($row['recieved_qty'],2,'.',',').'</strong>';
				$rcost = '<strong>'.number_format($row['recieved_cost'],2,'.',',').'</strong>';
				$rtcost = '<strong>'.number_format($row['recievedtotalcost'],2,'.',',').'</strong>';
					}else{$dater = '';
					$rqty = '';
					$rcost='';
					$rtcost='';}
				?>
            
            <tr style="font-size:12px;border: solid 1px;">
            
            <td  style="text-align:center; width:auto;border: solid 1px;"><?php
			$isdate = $row['date'];
			$dates = new DateTime($isdate); 
			echo $dater.'&nbsp;'.$dates->format('M - d - Y');?></td>
            
           <td style="text-align:center;border: solid 1px; width:auto"><?php echo $rqty;?></td>
           <td style="text-align:center;border: solid 1px; width:auto"><?php echo $rcost;?></td>
           <td style="text-align:center;border: solid 1px; width:auto"><?php echo $rtcost;?></td>
            <td style="text-align:center;border: solid 1px; width:auto;"><?php echo $row['issueddep'];?></td>
            <td style="text-align:center;border: solid 1px; width:auto; background-color: #0FC; color:#000;"><?php echo $row['issuedqty'];?></td>
            <td style="text-align:center;border: solid 1px; width:auto;"><?php echo number_format($row['issuedcost'],2,'.',',');?></td>
            <td style="text-align:center;border: solid 1px; width:auto;background-color:#0FF; color:#000;"><?php echo number_format($row['issuedtotalcost'],2,'.',',');?></td>
            <td style="text-align:center;border: solid 1px; width:auto; background-color: #3F9; color:#000;"><?php  
				//if(empty($issuedqty) && empty($issuedtamount) && empty($issuedcost))
//				{$stockendbal = '';
//				$stockendamount = '';
//				$stockcost = '';}else{
					$stockendbal = $row['stockendbal'];
					$stockcost = $row['issuedcost'];
					$stockendamount = $row['stocktotalcost'];
					
			
			echo $stockendbal;?></td>
            <td style="text-align:center;border: solid 1px; width:auto;"><?php echo number_format($stockcost,2,'.',',');?></td>
            <td style="text-align:center;border: solid 1px; width:auto;background-color: #3FC; color:#000;"><?php echo number_format($stockendamount,2,'.',',');?></td>
            </tr>
            
            <?php 
			$stockstarttotalcost =$row['recievedtotalcost'];
			$stockissuedqty = $stockissuedqty+$row['issuedqty'];
			$stockissuedtotalcost = $stockissuedtotalcost+$row['issuedtotalcost'];
			$stockendbalqty =$row['stockendbal'];
			$stockendtotalcost =$row['stocktotalcost'];
				   }}
else { ?>
       <?php }?>
			<tr>
            <td colspan="3" style="background-color:#36648B;border: solid 1px #000; color:#FFF; font-size:12px; text-align:right; width:auto;"><strong>TOTAL</strong></td>			<td style="background-color: #FFFF00; color:#000;border: solid 1px; font-size:12px; text-align:center; width:auto;"> <strong><?php 
			echo number_format($stockstarttotalcost,2,'.',',');?></strong></td>
            <td style="background-color: #FFFF00;border: solid 1px; color:#000; font-size:12px; text-align:center; width:auto;"> </td>
            <td style="background-color: #FFFF00; color:#000;border: solid 1px; font-size:12px; text-align:center; width:auto;"><strong><?php
			 echo number_format($stockissuedqty,2,'.',',');?></strong></td>
            
            <td style="background-color: #FFFF00; color:#000;border: solid 1px; font-size:12px; text-align:center; width:auto;"> </td>
            <td style="background-color: #FFFF00; border: solid 1px;color:#000; font-size:12px;border: solid 1px; text-align:center; width:auto;"><strong><?php echo number_format($stockissuedtotalcost,2,'.',',');?></strong></td>
            
             <td style="background-color: #FFFF00; border: solid 1px;color:#000; font-size:12px; text-align:center; border: solid 1px;width:auto;"><strong><?php echo number_format($stockendbalqty,2,'.',',');?></strong></td>
            <td style="background-color: #FFFF00;border: solid 1px; color:#000; font-size:12px; text-align:center; width:auto;"></td>
            <td style="background-color: #FFFF00;border: solid 1px; color:#000; font-size:12px; text-align:center; width:auto;"><strong><?php echo number_format($stockendtotalcost,2,'.',',');?></strong></td>
            
            
            </tr>
            </table>
            </div>


</div></div></div>
</div>



<footer>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});

</footer>
</body>
<?php }?>
</html>