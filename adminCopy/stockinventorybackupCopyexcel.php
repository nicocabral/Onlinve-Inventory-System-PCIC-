
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
<center>
 <p style="font-size:12px;">
               
                 <strong>Philippine Crop Insurance Corporation</strong><br>
                Regional Office No. 8 Tacloban City
            </p>


                <p style="color:#000080; font-size:12px;"><strong>Report on Issued Supplies</strong></p>
                 <span style="font-size:12px;">AS OF <strong><?php 
				 	
				 $from = mysql_real_escape_string(trim($_POST['from']));
				 						   $to = mysql_real_escape_string(trim($_POST['to']));
										   $date = new DateTime($from);
										   $dateto = new DateTime($to); 
										   echo '<strong>'.$date->format('M-d-Y').' &nbsp;to&nbsp; '.$dateto->format('M-d-Y').'</strong>'; ?></strong></span>
           
           </center>
            <table width="100%" style="border: solid 1px;">
           <tr style="font-size:12px; font-weight:bold;border: solid 1px;">
           		<td style="border: solid 1px;"></td>
                
                <td colspan="3" style="text-align:center; width:auto;border: solid 1px;">ISSUANCES</td>
               
           </tr>
           <tr style="font-size:12px; font-weight:bold;border: solid 1px;">
   			<td style="text-align:center;border: solid 1px;">ITEMS</td>
           
           <td style="text-align:center;border: solid 1px;">QTY</td>
           <td style="text-align:center;border: solid 1px;">UNIT COST</td>
           <td style="background-color:#3FC; color:#000;border: solid 1px; text-align:center;">AMOUNT</td>
           
         </tr>
          <?php include('includes/dbconn.php');
		  		$query = "SELECT 
				pcic_stockinventory.itemno as no,
				pcic_stockinventory.id,
				pcic_stockinventory.itemname,
				pcic_stockinventory.startbal,
				pcic_stockinventory.startucost,
				pcic_stockinventory.startamount,
				SUM(pcic_stockinventory.issuanceqty) as tissuedqty,
				
				pcic_stockinventory.issuancecost,
				SUM(pcic_stockinventory.issuanceamount) as tissuedamount,
				pcic_stockinventory.endbal,
				pcic_stockinventory.enducost,
				pcic_stockinventory.endamount,
				pcic_stockinventory.date,
				pcic_items.itemno,
				pcic_items.qty,
				pcic_items.bal_qty,
				pcic_items.bal_totalcost,
				pcic_items.total_cost
			    FROM pcic_stockinventory LEFT JOIN pcic_items ON pcic_stockinventory.itemno = pcic_items.itemno WHERE pcic_stockinventory.date BETWEEN '$from' AND '$to' GROUP by no order by itemname";
				$result = mysql_query($query) or die (mysql_error());
			
				$total = 0;
				$totalstartamount = 0;
				$endamount = 0;
				$totalendamount = 0;
				$totalissuedamount = 0;
				$totalamount = 0;
				$totalpurchaseamount = 0;
				$totalpurchase = 0 ;
				
				
				if(mysql_num_rows($result)>0){
					while($row = mysql_fetch_array($result)){
					$totalstartamount = $row['startamount'];
					$total = $total + $totalstartamount;
					$endamount = $row['bal_totalcost'];
					
					$totalissuedamount =$row['tissuedamount'];
					$totalamount = $totalamount + $totalissuedamount;
					$totalendamount = $totalendamount + $endamount;	
										
					
					
						
				?>
           		
           <tr style="font-size:12px;border: solid 1px;">
           <td style=" width:auto;border: solid 1px; font-size:bold;">&emsp;<?php echo $row['itemname'];?></td>           
           <td style="text-align:center; width:auto;border: solid 1px;"><?php echo $row['tissuedqty'];?></td>
           <td style="text-align:center; width:auto;border: solid 1px;"><?php echo number_format($row['issuancecost'],2,'.',',');?></td>
           <td style="text-align:center; width:auto;background-color:#CFC;border: solid 1px; color:#000;"><?php echo number_format($row['tissuedamount'], 2,'.',',');?></td>
          
           </tr>
           
           <?php }}?>
           
         <tr style="border: solid 1px;">
           <td  style="text-align:right; width:auto; font-size:12px; background-color: #06F; color:#FFF;border: solid 1px #000;"><strong>TOTAL</strong></td>
           
            <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border: solid 1px;"> <strong><center>
		</center></strong></td>
            <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border: solid 1px;"> <strong><center>
		</center></strong></td>
           
           <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border: solid 1px;"> <strong><center><?php 
		   echo number_format($totalamount, 2,'.',',');?></center></strong></td>
          
        
          </tr>
            </table>
         <?php   
		 $f = $date->format('M d, Y');
		 $t = $dateto->format('M d, Y');
		 header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Issued Report '.$f.' to '.$t.'.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?>
</body>
</html>