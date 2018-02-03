
<center>
 <p style="font-size:12px;">
            
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>

   
		<p style="font-size:12px;"><strong><?php echo $_POST['printfiltercheck'];?> Check</strong></p>
        <table cellspacing="0" width="100%" style="border:solid 1px;">

        
        <thead style="border:1px solid;">
        <tr style="font-size:12px; font-weight:bold;border:1px solid;">
       
        <td style="text-align:center; border:1px solid;"> CHECK NO</td>
        <td style="text-align:center; border:1px solid;">CHECK DATE</td>
        <td style="text-align:center; border:1px solid;">PAYEE</td>
        <td style="text-align:center; border:1px solid;">PEO</td>
        <td style="text-align:center; border:1px solid;">AMOUNT</td>
    
        <td style="text-align:center; border:1px solid;">DATE RECIEVED</td>
        <td style="text-align:center; border:1px solid;">STATUS</td>
        <td style=" text-align:center;border:1px solid;">REMARKS</td>
       
        </tr>
        </thead>
        <tbody style="font-size:12px;border:1px solid;">
 <?php include('includes/dbconn.php');
 $que = @mysql_real_escape_string($_POST['printfiltercheck']);
 $peo = @mysql_real_escape_string($_POST['peo']);
 	$sql = mysql_query("SELECT * FROM cf_inventory WHERE status = '$que' AND peo = '$peo'") or die (mysql_error());
	$count = 0;
	if(mysql_num_rows($sql)>0){
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
        <tr style="border:1px solid;">
       
        <th style="width:auto; text-align:center;border:1px solid;">  <?php echo $row['checkno'];?></th>
        <th style="width:auto;border:1px solid; text-align:center;"><?php echo $row['checkdate'];?></th>
     
       <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['payee_name'];?></th>
       <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['address'] .'&nbsp;'.$row['peo'];?></th>
       <th style="text-align:center; color: #F30;border:1px solid #000;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       
        
        <th style="border:1px solid; text-align:center;"><?php  
		echo $row['date_recieved'];?></th>
        <th style="border:solid 1px;">&nbsp;<?php echo $row['status'];?></th>
       <th style="text-align:center;border:1px solid;">&nbsp;<?php echo $row['remarks'];?></th>
       
       
        </tr>
   
                    
        <?php }} else {echo '<strong style="color:red;">No '.$que.' Check on '.$peo.' PEO</strong>';}?>
        </tbody>
          
        </table>

      
      
  <?php      

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$peo $que check.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?> 