
<center>
 <p style="font-size:12px;">
            
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>
   
		<p style="font-size:12px;"><strong>Check as of <?php
		echo date('M d, Y');?> </strong></p>
        <table cellspacing="0" width="100%" style="border:solid 1px;">

        
        <thead style="border:1px solid;">
        <tr style="font-size:12px; font-weight:bold;border:1px solid;">
       
        <td style="text-align:center; border:1px solid;"> CHECK NO</td>
        <td style="text-align:center; border:1px solid;">CHECK DATE</td>
        <td style="text-align:center; border:1px solid;">PAYEE</td>
        <td style="text-align:center; border:1px solid;">ADDRESS</td>
        <td style="text-align:center; border:1px solid;">AMOUNT</td>
        <td style="text-align:center; border:1px solid; width:120px;">PRINTED NAME</td>
    	<td style="text-align:center; border:1px solid;width:120px;">SIGNATURE</td>
        
        <td style="text-align:center; border:1px solid;">DATE RECIEVED</td>
        <td style=" text-align:center;border:1px solid;">OR# / ID TYPE & IDNO</td>
        <td style=" text-align:center;border:1px solid;">DV No.</td>
       
        </tr>
        </thead>
        <tbody style="font-size:12px;border:1px solid;">
 <?php include('includes/dbconn.php');
if(isset($_POST['printcheckno'])){
 $from = intval($_POST['checknofrom']);
 $to = intval($_POST['checknoto']);

 	$sql = "SELECT * FROM cf_inventory WHERE checkno BETWEEN  '$from' AND '$to'";

	
	$count = 0;
	$res = mysql_query ($sql) or die (mysql_error());
	if(mysql_num_rows($res)>0){
	while($row = mysql_fetch_assoc($res)){
 	$count++;
 ?>
        <tr style="border:1px solid;">
       
        <th style="width:auto; text-align:center;border:1px solid;">  <strong style="color: #00F"><?php echo $row['checkno'];?></strong></th>
        <th style="width:auto;border:1px solid; text-align:center;"><?php 
		$cdate = new DateTime($row['checkdate']);
		echo $cdate->format('M d, Y');?></th>
     
       <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['payee_name'];?></th>
       <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['address'];?></th>
       <th style="text-align:center; color: #F30;border:1px solid #000;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       
        
        <th style="border:1px solid; text-align:center; width:120px;"></th>
        <th style="border:solid 1px; width:120px;"></th>
       <th style="text-align:center;border:1px solid;"></th>
        <th style="text-align:center;border:1px solid;"></th>
        <th style="text-align:center;border:1px solid;"><?php echo $row['dvno'];?></th>
       
       
        </tr>
   
                    
        <?php }}}else {echo '<strong style="color:red;">No data available in database</strong>';}?>
        </tbody>
          
        </table>
<?php      

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=check no from $from to  $to checks.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?> 