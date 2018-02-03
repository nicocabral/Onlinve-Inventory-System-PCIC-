
<center>
 <p style="font-size:12px;">
            
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>

   		<p class="pull-right"><?php echo date('M d, Y');?></p>
		<center><p style="font-size:12px;"><strong>LIST OF INDEMNITY CHECKS AND ACKNOWLEDGEMENT RECEIPTS</strong></p></center>
        <table cellspacing="0" width="100%" style="border:solid 1px;">

        
        <thead style="border:1px solid;">
        <tr style="font-size:12px; font-weight:bold;border:1px solid;">
       
        <td style="text-align:center; border:1px solid;"> NAME OF CLAIMANT</td>
        <td style="text-align:center; border:1px solid;"> ADDRESS</td>
        <td style="text-align:center; border:1px solid;"> AMOUNT</td>
        <td style="text-align:center; border:1px solid;"> CHECK #</td>
        <td style="text-align:center; border:1px solid;"> SIGNATURE</td>
        </tr>
        </thead>
        <tbody style="font-size:12px;border:1px solid;">
 <?php include('includes/dbconn.php');
 if(isset($_POST['peo'])){
 $que = @mysql_real_escape_string($_POST['peo']);
 	$sql = "SELECT * FROM cf_inventory WHERE peo = '$que'";
	$res = mysql_query($sql) or die (mysql_error());
 }
 if(isset($_POST['checkno'])){
	 $que = @mysql_real_escape_string($_POST['peo']);
	 $from = @mysql_real_escape_string($_POST['from']);
	 $to = @mysql_real_escape_string($_POST['to']);
	 $sql = "SELECT * FROM cf_inventory WHERE peo='$que' AND checkno BETWEEN '$from' AND '$to'";
	 $res = mysql_query($sql) or die (mysql_error());}
 $count = 0;
	$total = 0;
	if(mysql_num_rows($res)>0){
	while($row = mysql_fetch_assoc($res)){
 	$count++;
	$total = $total + $row['amount'];
 ?>
        <tr style="border:1px solid;">
       
        <th style="width:auto;border:1px solid; text-align:left;">&nbsp;<?php echo $row['payee_name'];?></th>
        <th style="width:auto;border:1px solid; text-align:left;">&nbsp;<?php echo $row['address'];?></th>
     
       <th style="width:auto;border:1px solid #000; text-align:center; color:#F30;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       <th style="width:auto;border:1px solid; text-align:center;"><?php echo $row['checkno'];?></th>
       <th style="text-align:center; color: #F30;border:1px solid #000;"></th>      
        </tr>
   
                    
        <?php }} else {echo '<strong style="color:red;">No data available in database</strong>';}?>
        <tr style="border:1px solid;">
        <td colspan="2" style="font-size:14px; text-align:right; border:solid 1px;"><strong>TOTAL</strong></td>
        <td style="text-align:center; color:#F30; font-size:14px; border:solid 1px #000; "><strong><?php echo number_format($total,2,'.',',');?></strong></td>
        <td style="border:1px solid;"></td>
        <td style="border:1px solid;"></td>
        
        </tr>
        </tbody>
          
        </table>
<h4><strong>TOTAL CHECK : <?php echo $count;?></strong></h4>
     <center><p><em>I hereby acknoledge the receipt of the above indemnity checks and any loss or damage incurred is my liability.</em></p>
     Recieve by:<br />
     <u>DOMINICO S. DIGAMON</u><br /><br />
     <strong>REGIONAL MANAGER</strong></center> 
      <p class="pull-right"><em>Prepared by:</em><br /><br />
      							<strong>MA. ANGELI CASTRO PANUNCIO</strong></p>
      
  <?php     
  $date  = date('M d, Y'); 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Indemnity checks.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?> 