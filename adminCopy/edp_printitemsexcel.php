
      
<center>
 <p style="font-size:12px;">
               <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>


                <h3 style="color:#000080; font-size:12px;"><strong>Schedule of Property and Equipment</strong>
                											<p style=" color:#F30;"><strong>AS OF <?php $m = intval($_POST['month']);
																										$year = intval($_POST['year']);
															$month = '';
															if($m==1){
																$month = 'JANUARY';
																}else if($m==2){$month='FEBRUARy';}else if($m==3){$month='MARCH';}
																else if($m==4){$month = 'APTRIL';}else if($m==5){$month='MAY';}
																else if($m==6){$month='JUNE';}else if($m==7){$month = 'JULY';}
																else if($m==8){$month='AUGUST';}else if($m==9){$month='SEPTEMBER';
																}else if($m==10){$month='OCTOBER';}else if($m==11){$month='NOVEMBER';}else if($m==12){$month='DECEMBER';}	echo $month.'&nbsp;'.$year;?></strong> </p></h3>
              	
          </center>
          
          <table  width="100%" style="border: 1px;">
          <thead style="border: 1px;">
          	<tr style="font-size:12px; border:solid 1px;">
            	<th style="text-align:center;border: 1px;">ITEM</th>
                <th style="text-align:center;border: 1px;">QTY</th>
                <th style="text-align:center;border: 1px;">AMOUNT</th>
                <th style="text-align:center;border: 1px;">DATE ACQUIRED</th>
                <th style="text-align:center;border: 1px;">SALVAGE VALUE</th>
                <th style="text-align:center;border: 1px;">MONTHLY DEPN</th>
                <th style="text-align:center;border: 1px;">ACCUM DEPN LAST MONTH</th>
                <th style="text-align:center;border: 1px;">ACCUM DEPN THIS MONTH</th>
                <th style="text-align:center;border: 1px;">BOOK VALUE</th>
            </tr>
          	</thead>
            <tr style="color:#F30; border: 1px;">
                <td colspan="9">&nbsp;<strong><u>EDP EQUIPMENT</u></strong></td></tr>
            <tbody style="border: 1px;">
            
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
			 $q = mysql_query("SELECT edp_ledgercard.itemname AS itemname,edp_ledgercard.eno AS eno ,edp_ledgercard.cost AS cost,
								 edp_ledgercard.depreciation AS depreciation,
								 edp_ledgercard.accumdep_lastmonth AS paccumdep, edp_ledgercard.accumdep_thismonth AS accumdep,edp_ledgercard.date,
								  edp_ledgercard.bookvalue as bookval,edp_equipement.e_no,edp_equipement.qty,edp_equipement.s_value,edp_equipement.monthly_dep,edp_equipement.e_life
								  FROM edp_ledgercard LEFT JOIN edp_equipement ON 
								  edp_ledgercard.eno = edp_equipement.e_no WHERE edp_equipement.monthly_dep =0 AND edp_equipement.e_life =0") or die ( mysql_error());
								  if(mysql_num_rows($q)>0){
									  while($r = mysql_fetch_array($q)){
										  $t = $t + $r['cost'];
						$tmdep = $tmdep + $r['monthly_dep'];
						$dep = $dep+$r['paccumdep'];
						$adm = $adm+$r['accumdep'];
						$bval = $bval + $r['bookval'];
						$a = $r['cost'] - $r['accumdep'];
						$b = $r['cost'] - $r['paccumdep'];
									
								  ?>
                                 
            <tr style="font-size:12px;border: 1px;">
                <td style="border: 1px;"><strong>&emsp;<?php echo $r['itemname'];?></strong></td>
                <td style="text-align:center;border: 1px;"><?php echo $r['qty'];?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($r['cost'],2,'.',',');?></td>
                <td style="text-align:center;border:1px;"><?php 
				$d = $r['date'];
				$isd = new DateTime($d);
				echo $isd->format('M d, Y');?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($r['s_value'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($r['monthly_dep'],2,'.',',');?></td>
                <td style="text-align:center; font-weight:bold; color:red;border: 1px;"><?php echo number_format($r['paccumdep'],2,'.',',');?></td>
                <td style="text-align:center; background-color:#CFC;border: 1px;"><?php echo number_format($r['accumdep'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($r['bookval'],2,'.',',');?></td>
                </tr>
                <?php }}?>
            <?php include('includes/dbconn.php');
			
					$sql = "SELECT edp_ledgercard.itemname AS itemname,edp_ledgercard.eno AS eno ,edp_ledgercard.cost AS cost,
								 edp_ledgercard.depreciation AS depreciation,
								 edp_ledgercard.accumdep_lastmonth AS paccumdep, edp_ledgercard.accumdep_thismonth AS accumdep,edp_ledgercard.date,
								  edp_ledgercard.bookvalue as bookval,edp_equipement.e_no,edp_equipement.qty,edp_equipement.s_value,edp_equipement.monthly_dep,edp_equipement.date_acquired
								  FROM edp_ledgercard LEFT JOIN edp_equipement ON 
								  edp_ledgercard.eno = edp_equipement.e_no WHERE year(edp_ledgercard.date) LIKE '$year%' AND  Month(edp_ledgercard.date) = '$m'";
					$result=mysql_query($sql) or die (mysql_error());
					$res = '';
					$eno = '';
					if(mysql_num_rows($result)>0){
						while($row = mysql_fetch_array($result)){ 
						$t = $t + $row['cost'];
						$tmdep = $tmdep + $row['monthly_dep'];
						$dep = $dep+$row['paccumdep'];
						$adm = $adm+$row['accumdep'];
						$bval = $bval + $row['bookval'];
						$eno = $row['eno'];
						?>
            	<tr style="font-size:12px;border: 1px;">
                <td style="border: 1px;"><strong>&emsp;<?php echo $row['itemname'];?></strong></td>
                <td style="text-align:center;border: 1px;"><?php echo $row['qty'];?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($row['cost'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px;"><?php 
				$d = $row['date_acquired'];
				$isd = new DateTime($d);
				echo $isd->format('M d, Y');?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($row['s_value'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($row['monthly_dep'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px; font-weight:bold;color:red;"><?php echo number_format($row['paccumdep'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px; background-color:#CFC;"><?php echo number_format($row['accumdep'],2,'.',',');?></td>
                <td style="text-align:center;border: 1px;"><?php echo number_format($row['bookval'],2,'.',',');?></td>
                </tr>
                <?php
				
				 }}else{echo'<strong style="color:red;">NO AVAILABLE DATA IN DATABASE AS OF '.$month.'</strong>';}?>
					<?php
				$depreciation = "SELECT * FROM edp_depreciated WHERE Year(date)>='$year' AND Month(date)<'$m'";
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
                <tr style="border:1px solid; font-size:12px;">
                </tr>
               
                <tr style="border: 1px;">
                <td colspan="2" style="background-color:#039;border: 1px #000; color:#FFF; font-weight:bold; font-size:12px; text-align:right;">TOTAL</td>
                <td style="color:#F30;border: 1px; text-align:center; font-weight:bold;"><?php echo number_format($t,2,'.',',');?></td>
                 <td style="color:#F30;border: 1px; text-align:center; font-weight:bold;" colspan="2"></td>
                 <td style="color:#F30;border: 1px; text-align:center; font-weight:bold;"><?php echo number_format($tmdep,2,'.',',');?></td>
                  <td style="color:#F30;border: 1px; text-align:center; font-weight:bold; color:#red;"><?php echo number_format($dep,2,'.',',');?></td>
                   <td style="color:#F30; text-align:center;border: 1px; font-weight:bold; background-color:#CFC;"><?php echo number_format($adm,2,'.',',');?></td>
                    <td style="color:#F30; text-align:center; border: 1px;font-weight:bold;"><?php echo number_format($bval,2,'.',',');?></td></tr>
            </tbody>
          
          </table>
            <?php      
 
		 header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=.$month.$year. EDP PPE Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?>
