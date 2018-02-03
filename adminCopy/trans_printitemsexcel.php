<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body style="font-size:12px;">
<center>
 <p style="font-size:12px;">
               <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>

                <p style="color:#000080; font-size:12px;"><strong>Schedule of Property and Equipment</strong>
                											<p style=" color:#F30;"><strong>AS OF <?php $m = intval($_POST['month']);
																										$year = intval($_POST['year']);
															$month = '';
															if($m==1){
																$month = 'JANUARY';
																}else if($m==2){$month='FEBRUARy';}else if($m==3){$month='MARCH';}
																else if($m==4){$month = 'APTRIL';}else if($m==5){$month='MAY';}
																else if($m==6){$month='JUNE';}else if($m==7){$month = 'JULY';}
																else if($m==8){$month='AUGUST';}else if($m==9){$month='SEPTEMBER';
																}else if($m==10){$month='OCTOBER';}else if($m==11){$month='NOVEMBER';}else if($m==12){$month='DECEMBER';}	echo $month.'&nbsp;'.$year;?></strong> </p></p></center>
              	
            
          <table style="border:solid 1px; font-size:12px;" width="100%">
          <thead style="border:solid 1px; font-size:12px;">
          	<tr style="font-size:12px;border:solid 1px;">
            	<th style="text-align:center;border:solid 1px;">ITEM</th>
                <th style="text-align:center;border:solid 1px;">QTY</th>
                <th style="text-align:center;border:solid 1px;">AMOUNT</th>
                <th style="text-align:center;border:solid 1px;">DATE ACQUIRED</th>
                <th style="text-align:center;border:solid 1px;">SALVAGE VALUE</th>
                <th style="text-align:center;border:solid 1px;">MONTHLY DEPN</th>
                <th style="text-align:center;border:solid 1px;">ACCUM DEPN LAST MONTH</th>
                <th style="text-align:center;border:solid 1px;">ACCUM DEPN THIS MONTH</th>
                <th style="text-align:center;border:solid 1px;">BOOK VALUE</th>
            </tr>
          	</thead>
            <tr style="color:#F30; border:solid 1px;">
                <td colspan="9">&nbsp;<strong><u>TRANSPORTATION EQUIPMENT</u></strong></td></tr>
            <tbody style="border:solid 1px; font-size:12px;">
            
            <?php include('includes/dbconn.php');
			$bval = 0;
					$adtm =0;
					$t = 0;
					$tmdep = 0;
					$adlm = 0;
					$adm = 0;
					$dep = 0;
					$totaladlm = 0;
					$bv = 0;
					$a = 0;
					$b=0;
			 $q = mysql_query("SELECT transportation_ledgercard.itemname AS itemname,transportation_ledgercard.tid AS tid ,transportation_ledgercard.cost AS cost,
								 transportation_ledgercard.depreciation AS depreciation,
								 transportation_ledgercard.accum_deplm AS paccumdep, transportation_ledgercard.accum_deptm AS accumdep,transportation_ledgercard.date,
								 transportation_ledgercard.bookvalue as bookval,transportation_equipment.tid,transportation_equipment.qty,transportation_equipment.s_val,transportation_equipment.m_dep,transportation_equipment.e_life
								  FROM transportation_ledgercard LEFT JOIN transportation_equipment ON 
								  transportation_ledgercard.tid = transportation_equipment.tid WHERE transportation_equipment.m_dep =0 AND transportation_equipment.e_life =0") or die ( mysql_error());
								  if(mysql_num_rows($q)>0){
									  while($r = mysql_fetch_array($q)){
										  $t = $t + $r['cost'];
						$tmdep = $tmdep + $r['m_dep'];
						$dep = $dep+$r['paccumdep'];
						$adm = $adm+$r['accumdep'];
						$bval = $bval + $r['bookval'];
						$a = $r['cost'] - $r['accumdep'];
						$b = $r['cost'] - $r['paccumdep'];
									
								  ?>
                                 
            <tr style="font-size:12px;border:solid 1px;">
                <td style="border:solid 1px;"><strong> &emsp;<?php echo $r['itemname'];?></strong></td>
                <td style="text-align:center;border:solid 1px;"><?php echo $r['qty'];?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($r['cost'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php 
				$d = $r['date'];
				$isd = new DateTime($d);
				echo $isd->format('M d, Y');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($r['s_val'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($r['m_dep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;font-weight:bold; color:red;"><?php echo number_format($r['paccumdep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px; background-color:#CFC;"><?php echo number_format($r['accumdep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($r['bookval'],2,'.',',');?></td>
                </tr>
                <?php }}?>
            <?php include('includes/dbconn.php');
			
					$sql = "SELECT transportation_ledgercard.itemname AS itemname,transportation_ledgercard.tid AS tid ,transportation_ledgercard.cost AS cost,
								 transportation_ledgercard.depreciation AS depreciation,
								 transportation_ledgercard.accum_deplm AS paccumdep, transportation_ledgercard.accum_deptm AS accumdep,transportation_ledgercard.date,
								 transportation_ledgercard.bookvalue as bookval,transportation_equipment.tid,
								 transportation_equipment.qty,transportation_equipment.s_val,transportation_equipment.m_dep,transportation_equipment.date_acquired
								  FROM transportation_ledgercard LEFT JOIN transportation_equipment ON 
								  transportation_ledgercard.tid = transportation_equipment.tid WHERE year(transportation_ledgercard.date) LIKE '$year%' AND  Month(transportation_ledgercard.date) = '$m'";
					$result=mysql_query($sql) or die (mysql_error());
					
					if(mysql_num_rows($result)>0){
						while($row = mysql_fetch_array($result)){ 
						$t = $t + $row['cost'];
						$tmdep = $tmdep + $row['m_dep'];
						$dep = $dep+$row['paccumdep'];
						$adm = $adm+$row['accumdep'];
						$bval = $bval + $row['bookval'];

						?>
            	<tr style="font-size:12px;border:solid 1px;">
                <td style="border:solid 1px;"><strong>&emsp;<?php echo $row['itemname'];?></strong></td>
                <td style="text-align:center;border:solid 1px;"><?php echo $row['qty'];?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($row['cost'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php 
				$d = $row['date_acquired'];
				$isd = new DateTime($d);
				echo $isd->format('M d, Y');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($row['s_val'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($row['m_dep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;font-weight:bold; color:red;"><?php echo number_format($row['paccumdep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;background-color:#CFC;"><?php echo number_format($row['accumdep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($row['bookval'],2,'.',',');?></td>
                </tr>
                <?php }}else{
					
					echo'<strong style="color:red;">NO AVAILABLE DATA IN DATABASE AS OF '.$month.'</strong>';}?>
                 <?php
				$depreciation = "SELECT * FROM ff_depreciated WHERE Year(date)>='$year' AND Month(date)<'$m'";
				$res = mysql_query($depreciation) or die (mysql_error());
				if(mysql_num_rows($res)>0){
					while($deprow = mysql_fetch_array($res)){
						$t = $t + $deprow['cost'];
						$tmdep = $tmdep + $deprow['dep'];
						$dep = $dep + $deprow['deplastm'];
						$adm = $adm + $deprow['depthism'];
						$bval = $bval + $deprow['bookvalue'];
				?>
				<tr style="border:1px solid; font-size:12px;">
                <td style="border:solid 1px;"><strong>&emsp;<?php echo $deprow['itemname'];?></strong></td>
                <td style="text-align:center;border:solid 1px;"><?php echo $deprow['qty'];?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($deprow['cost'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php 
				
				$isda = new DateTime($deprow['dateacquired']);
				echo $isda->format('M d, Y');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($deprow['bookvalue'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($deprow['dep'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px; color:red;"><?php echo number_format($deprow['deplastm'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px; background-color:#CFC;"><?php echo number_format($deprow['depthism'],2,'.',',');?></td>
                <td style="text-align:center;border:solid 1px;"><?php echo number_format($deprow['bookvalue'],2,'.',',');?></td>
                
                </tr>              
                <?php }}?>       
                <tr></tr>
                <tr>
                <td colspan="2" style="border:solid 1px #000;background-color:#039; color:#FFF; font-weight:bold; font-size:12px; text-align:right;">TOTAL</td>
                <td style="color:#F30;border:solid 1px; text-align:center; font-weight:bold;"><?php echo number_format($t,2,'.',',');?></td>
                 <td style="color:#F30;border:solid 1px;text-align:center; font-weight:bold;" colspan="2"></td>
                 <td style="color:#F30;border:solid 1px;text-align:center; font-weight:bold;"><?php echo number_format($tmdep,2,'.',',');?></td>
                  <td style="color:#F30;border:solid 1px;text-align:center; font-weight:bold; font-weight:bold; color:red;"><?php echo number_format($dep,2,'.',',');?></td>
                   <td style="color:#F30;border:solid 1px;text-align:center; font-weight:bold; background-color:#CFC;"><?php echo number_format($adm,2,'.',',');?></td>
                    <td style="color:#F30;border:solid 1px;text-align:center; font-weight:bold;"><?php echo number_format($bval,2,'.',',');?></td></tr>
            </tbody>
          
          </table>
          <?php      
 
		 header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=.$month.$year. TRANSPORTATION PPE Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?>  
           </body>

</html>