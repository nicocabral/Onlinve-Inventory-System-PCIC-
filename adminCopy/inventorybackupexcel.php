<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>   
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
       
            <span class="pull-right" style="font-size:12px;">STOCK NO.<?php
				include('includes/dbconn.php');
				$itemname = intval(trim($_POST['id']));
				 $s = mysql_query("SELECT stockno FROM pcic_stockcard WHERE stockno = '$itemname'") or die (mysql_error());
				if($r=mysql_fetch_array($s)){ echo '<strong>'.$r['stockno'].'</strong>';}?></span>
           
            <table width="100%" style="border: solid 1px;">
            
            <tr style="border: solid 1px;">
            <?php include('includes/dbconn.php');
			$itemname = intval(($_POST['id']));
			
			$sql = mysql_query("SELECT pcic_stockcard.stockno,pcic_stockcard.stockitemname,pcic_stockcard.stockunit,pcic_stockcard.stockdescription,pcic_items.specification,pcic_items.itemno FROM pcic_stockcard LEFT JOIN pcic_items ON pcic_stockcard.stockno = pcic_items.itemno WHERE pcic_stockcard.stockno = '$itemname' GROUP by pcic_stockcard.stockno") or die (mysql_error());
			
			if($row=mysql_fetch_assoc($sql)){?>
            <td colspan="5" style="font-size:12px;border: solid 1px;"><strong>ITEM :</strong> &emsp;<?php echo '<strong style="font-size:12px;">'.$row['stockitemname'].'</strong>';
			$name = $row['stockitemname']; ?>
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
			$search = intval(trim($_POST['id']));
			
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
      <?php      
 
		 header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=.$name. Stockcard Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?>



</body>
</html>