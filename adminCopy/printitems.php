<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype'] =='user'){header("location:../user/index1");}else{?>
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
<body>
<br />
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">
<div class="col-lg-2">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print</a>
</div>
<div class="col-lg-3">
<?php $actionname = '';
if(isset($_POST['printcategory'])){
	$actionname = 'printitemsexcelcat';} else {
		$actionname = 'printitemsexcel';}?>
<form method="post" action="<?php echo $actionname?>">
	<input type="hidden" name="year" value="<?php echo $_POST['year'];?>" />
    <input type="hidden" name="category" value="<?php echo $_POST['category'];?>" />
    
    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Export data to Excel" data-placement="bottom">Export to Excel</button>
</form>
</div>
<div class="col-lg-1">
<a href="stock_page" data-toggle="tooltip" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;" data-placement="bottom">Back</a></div>
</div>
<div class="col-lg-6"></div></div></div>
<div id="div1" style="font-size:12px;">
<center>
 <p style="font-size:12px;">
                
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>

<div class="container" style="font-size:12px;">
   
		<p style="font-size:12px;"><strong>OFFICE SUPPLIES INVENTORY - <?php echo $_POST['year'];?></strong></p>
        <table width="100%" style="border:solid 1px;">
      
        <thead style="border:solid 1px;">
        <tr style="border:solid 1px;">
        <th style="text-align:center; width:auto;border:solid 1px;">No</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Item Name</th>
        
        <th style="text-align:center; width:auto;border:solid 1px;">Unit</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Quantity</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Unit Cost</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Total Cost</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Bal Quantity</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Unit Cost</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Bal Total Cost</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Date ACQUIRED            </th>
        
      
        </tr>
        </thead>
        <tbody style="border:solid 1px;">
        
         
        <!---------------Non-Consumables---------------------->
 <?php 
 
 include('includes/dbconn.php');
 if(isset($_POST['submit'])){
 $ot = 0;
 $otbal = 0;
 	$year = mysql_real_escape_string(trim($_POST['year']));
 	$sql = "SELECT pcic_items.*,pcic_stockcard.* FROM pcic_items LEFT JOIN pcic_stockcard ON pcic_items.itemno = pcic_stockcard.stockno WHERE Year(pcic_stockcard.date_recieved) = '$year' AND pcic_items.category = 'Non-consumable' group by pcic_items.itemno";
	
	$count = 0;
	$totalnc = 0;
	$tnc = 0;
	$totalall = 0;
	$totalendamount = 0;
	$res = mysql_query ($sql) or die (mysql_error());
	if(mysql_num_rows($res)){
	while($row = mysql_fetch_assoc($res)){
		number_format($totalbalamount = $row['stocktotalcost'], 2,'.','');
		$tnc = $tnc + $totalbalamount;
		number_format($totalcost = $row['recievedtotalcost'], 2,'.','');
		$totalnc = $totalnc + $totalcost;
		
 	$count++;
 ?>
        <tr style="border:solid 1px; ">
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php echo $count?></td>
        <td style="width:auto;border:solid 1px;font-weight:bold;">&emsp;<?php echo $row['item_name'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['unit'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['recieved_qty'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['recieved_cost'],2,'.',',');?></td>
        <td style="text-align:center; width:auto;border:solid 1px; background-color:#CFC;"><?php echo number_format($row['recievedtotalcost'],2,'.',',');?></td>
         <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['stockendbal'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['recieved_qty'],2,'.',',');?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;background-color:#CFC;"><?php echo number_format($row['stocktotalcost'],2,'.',',');?></td>
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php 
		$date = new Datetime($row['date_recieved']);
		echo $date->format('M d, Y');?></td>
    
        <?php }} else {echo '<strong style="color:red;">No available record</strong>';}$count-1;
		
		?>
        <tr style="border:solid 1px;">
        	<td colspan="5" style=" text-align:right;width:auto;border:solid 1px #000; color:#000; font-size:12px; font-weight:bold;"><strong style="color:red;">SUB TOTAL(Non-Consumable)</strong></td>
            <td style="text-align:center; font-size:12px;border:solid 1px; font-weight:bold; color:#000;"><strong style="color:red;"><?php
			 
			echo number_format($totalnc, 2,'.',',');?></strong></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px; border:solid 1px;font-weight:bold;"></td>
            <td style=" text-align:center; width:auto; color:#000; font-size:12px; font-weight:bold;"><strong style="color:red;"><?php echo number_format($tnc,2,'.',',');?></strong></td>
             <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
        </tr>
       
        <!---------------Consumables---------------------->
 <?php include('includes/dbconn.php');

 	$year = mysql_real_escape_string(trim($_POST['year']));
 	$sql = "SELECT pcic_items.*,pcic_stockcard.*,Min(pcic_stockcard.recieved_qty) as recieved_qty, MIN(pcic_stockcard.stocktotalcost) as stocktotalcost  FROM pcic_items LEFT JOIN pcic_stockcard ON pcic_items.itemno = pcic_stockcard.stockno WHERE Year(pcic_stockcard.date_recieved) = '$year' AND pcic_items.category = 'Consumable' group by pcic_stockcard.stockno";
	
 
	$count = 0;
	$total = 0;
	$t = 0;
	$totalall = 0;
	$totalendamount = 0;
	$res = mysql_query ($sql) or die (mysql_error());
	if(mysql_num_rows($res)){
	while($row = mysql_fetch_assoc($res)){
		number_format($totalbalamount = $row['stocktotalcost'], 2,'.','');
		$t = $t + $totalbalamount;
		number_format($totalcost = $row['recievedtotalcost'], 2,'.','');
		$total = $total + $totalcost;
		
 	$count++;
 ?>
        <tr style="border:solid 1px; ">
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php echo $count?></td>
        <td style="width:auto;border:solid 1px;font-weight:bold;">&emsp;<?php echo $row['item_name'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['unit'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['recieved_qty'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['recieved_cost'],2,'.',',');?></td>
        <td style="text-align:center; width:auto;border:solid 1px; background-color:#CFC;"><?php echo number_format($row['recievedtotalcost'],2,'.',',');?></td>
         <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['stockendbal'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['recieved_cost'],2,'.',',');?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;background-color:#CFC;"><?php echo number_format($row['stocktotalcost'],2,'.',',');?></td>
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php 
		$date = new Datetime($row['date_recieved']);
		echo $date->format('M d, Y');?></td>
    
        <?php }} else {echo '<strong style="color:red;">No available record</strong>';}$count-1;
		?>
        <tr style="border:solid 1px;">
        	<td colspan="5" style=" text-align:right;width:auto;border:solid 1px #000; color:#000; font-size:12px; font-weight:bold;">SUB TOTAL (Consumable)</td>
            <td style="text-align:center; font-size:12px;border:solid 1px; font-weight:bold; color:#000;"><?php
			 
			echo number_format($total, 2,'.',',');?></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px; border:solid 1px;font-weight:bold;"></td>
            <td style=" text-align:center; width:auto; color:#000; font-size:12px; font-weight:bold;"><?php echo number_format($t,2,'.',',');?></td>
             <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
        </tr>
         <tr style="border:solid 1px;">
        	<td colspan="5" style=" text-align:right;width:auto;border:solid 1px #000; color:#000; font-size:12px; font-weight:bold;">SUB TOTAL (Non-Consumable)</td>
            <td style="text-align:center; font-size:12px;border:solid 1px; font-weight:bold; color:#000;"><?php
			 
			echo number_format($totalnc, 2,'.',',');?></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px; border:solid 1px;font-weight:bold;"></td>
            <td style=" text-align:center; width:auto; color:#000; font-size:12px; font-weight:bold;"><?php echo number_format($tnc,2,'.',',');?></td>
             <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
        </tr>
         <tr style="border:solid 1px;">
        	<td colspan="5" style=" text-align:right;width:auto;border:solid 1px #000; background-color:#069; color:#FFF; font-size:12px; font-weight:bold;">TOTAL</td>
            <td style="text-align:center; font-size:12px;border:solid 1px #000; font-weight:bold; color:#F00;"><?php
			 $ot = $totalnc + $total; 
			echo number_format($ot, 2,'.',',');?></td>
            <td  style=" text-align:center; width:auto; color:#F00; font-size:12px;border:solid 1px #000; font-weight:bold; visibility:hidden;" colspan="2"></td>
          
            <td style=" text-align:center; width:auto; color:#F00; font-size:12px; font-weight:bold;"><?php 
			$otbal = $tnc + $t;
			echo number_format($otbal,2,'.',',');?></td>
             <td  style=" text-align:center; width:auto; color:#F00; font-size:12px;border:solid 1px #000; font-weight:bold; visibility:hidden;"></td>
        </tr>
        <?php }?>
        <?php
 if(isset($_POST['printcategory'])){
 $ot = 0;
 $otbal = 0;
 	$year = mysql_real_escape_string(trim($_POST['year']));
	$cat = mysql_real_escape_string(trim($_POST['category']));
 	$sql = "SELECT pcic_items.*,pcic_stockcard.* FROM pcic_items LEFT JOIN pcic_stockcard ON pcic_items.itemno = pcic_stockcard.stockno WHERE Year(pcic_stockcard.date_recieved) = '$year' AND pcic_items.category = '$cat' group by pcic_items.itemno";
	
	$count = 0;
	$totalnc = 0;
	$tnc = 0;
	$totalall = 0;
	$totalendamount = 0;
	$res = mysql_query ($sql) or die (mysql_error());
	if(mysql_num_rows($res)){
	while($row = mysql_fetch_assoc($res)){
		number_format($totalbalamount = $row['stocktotalcost'], 2,'.','');
		$tnc = $tnc + $totalbalamount;
		number_format($totalcost = $row['recievedtotalcost'], 2,'.','');
		$totalnc = $totalnc + $totalcost;
		
 	$count++;
 ?>
        <tr style="border:solid 1px; ">
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php echo $count?></td>
        <td style="width:auto;border:solid 1px;font-weight:bold;">&emsp;<?php echo $row['item_name'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['unit'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['recieved_qty'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['recieved_cost'],2,'.',',');?></td>
        <td style="text-align:center; width:auto;border:solid 1px; background-color:#CFC;"><?php echo number_format($row['total_cost'],2,'.',',');?></td>
         <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['stockendbal'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['recieved_cost'],2,'.',',');?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;background-color:#CFC;"><?php echo number_format($row['stocktotalcost'],2,'.',',');?></td>
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php 
		$date = new Datetime($row['date_recieved']);
		echo $date->format('M d, Y');?></td>
    
        <?php }} else {echo '<strong style="color:red;">No available record</strong>';}$count-1;
		
		?>
        <tr style="border:solid 1px;">
        	<td colspan="5" style=" text-align:right;width:auto;border:solid 1px #000; color:#000; font-size:12px; font-weight:bold;"><strong style="color:red;">SUB TOTAL(Non-Consumable)</strong></td>
            <td style="text-align:center; font-size:12px;border:solid 1px; font-weight:bold; color:#000;"><strong style="color:red;"><?php
			 
			echo number_format($totalnc, 2,'.',',');?></strong></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
            <td  style=" text-align:center; width:auto; color:#000; font-size:12px; border:solid 1px;font-weight:bold;"></td>
            <td style=" text-align:center; width:auto; color:#000; font-size:12px; font-weight:bold;"><strong style="color:red;"><?php echo number_format($tnc,2,'.',',');?></strong></td>
             <td  style=" text-align:center; width:auto; color:#000; font-size:12px;border:solid 1px; font-weight:bold;"></td>
        </tr>
    <?php }?>
        </tbody>
      
        </table>
      
      
      
   </div>
       
        </div>
</div></div></div>




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
</script>

</footer>
</body>
<?php }?>
</html>