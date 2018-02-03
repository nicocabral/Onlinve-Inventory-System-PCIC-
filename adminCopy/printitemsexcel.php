
<center>
 <p style="font-size:12px;">
               
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>


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
 <?php include('includes/dbconn.php');
 $ot = 0;
 $otbal = 0;
 	$year = mysql_real_escape_string(trim($_POST['year']));
 	$sql = "SELECT pcic_items.*,pcic_stockcard.stockno,pcic_stockcard.date_recieved FROM pcic_items LEFT JOIN pcic_stockcard ON pcic_items.itemno = pcic_stockcard.stockno WHERE Year(pcic_stockcard.date_recieved) = '$year' AND pcic_items.category = 'Non-consumable' group by pcic_items.itemno";
	
	$count = 0;
	$totalnc = 0;
	$tnc = 0;
	$totalall = 0;
	$totalendamount = 0;
	$res = mysql_query ($sql) or die (mysql_error());
	if(mysql_num_rows($res)){
	while($row = mysql_fetch_assoc($res)){
		number_format($totalbalamount = $row['bal_totalcost'], 2,'.','');
		$tnc = $tnc + $totalbalamount;
		number_format($totalcost = $row['total_cost'], 2,'.','');
		$totalnc = $totalnc + $totalcost;
		
 	$count++;
 ?>
        <tr style="border:solid 1px; ">
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php echo $count?></td>
        <td style="width:auto;border:solid 1px;font-weight:bold;">&emsp;<?php echo $row['item_name'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['unit'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['qty'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['unit_cost'],2,'.',',');?></td>
        <td style="text-align:center; width:auto;border:solid 1px; background-color:#CFC;"><?php echo number_format($row['total_cost'],2,'.',',');?></td>
         <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['bal_qty'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['unit_cost'],2,'.',',');?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;background-color:#CFC;"><?php echo number_format($row['bal_totalcost'],2,'.',',');?></td>
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
 	$sql = "SELECT pcic_items.*,pcic_stockcard.stockno,pcic_stockcard.date_recieved FROM pcic_items LEFT JOIN pcic_stockcard ON pcic_items.itemno = pcic_stockcard.stockno WHERE Year(pcic_stockcard.date_recieved) = '$year' AND pcic_items.category = 'Consumable' group by pcic_items.itemno";
	
 
	$count = 0;
	$total = 0;
	$t = 0;
	$totalall = 0;
	$totalendamount = 0;
	$res = mysql_query ($sql) or die (mysql_error());
	if(mysql_num_rows($res)){
	while($row = mysql_fetch_assoc($res)){
		number_format($totalbalamount = $row['bal_totalcost'], 2,'.','');
		$t = $t + $totalbalamount;
		number_format($totalcost = $row['total_cost'], 2,'.','');
		$total = $total + $totalcost;
		
 	$count++;
 ?>
        <tr style="border:solid 1px; ">
        <td style=" text-align:center;width:auto;border:solid 1px;"><?php echo $count?></td>
        <td style="width:auto;border:solid 1px;font-weight:bold;">&emsp;<?php echo $row['item_name'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['unit'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['qty'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['unit_cost'],2,'.',',');?></td>
        <td style="text-align:center; width:auto;border:solid 1px; background-color:#CFC;"><?php echo number_format($row['total_cost'],2,'.',',');?></td>
         <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['bal_qty'];?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['unit_cost'],2,'.',',');?></td>
        
        <td style="text-align:center; width:auto;border:solid 1px;background-color:#CFC;"><?php echo number_format($row['bal_totalcost'],2,'.',',');?></td>
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
       
        </tbody>
      
        </table>
      
      
      
  <?php      

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=office supplies inventory - $year.xls");
header("Pragma: no-cache");
header("Expires: 0");
	?> 