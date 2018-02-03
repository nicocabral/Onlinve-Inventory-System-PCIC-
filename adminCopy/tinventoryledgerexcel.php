<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body style="font-size:12px;">
<center>
 <p style="font-size:12px;">
              
                <strong>Philippine Crop Insurance Corporation</strong><br>
                Regional Office No. 8 Tacloban City
            </p>

                <p style="color:#000080; font-size:12px;"><strong>PROPERTY, PLANT AND EQUIPMENT LEDGER CARD</strong></p>
              	
                 </div>
            
            <span>NO.<?php
				include('includes/dbconn.php');
				$itemname = intval(trim($_POST['id']));
				 $s = mysql_query("SELECT tid FROM transportation_ledgercard WHERE tid = '$itemname'") or die (mysql_error());
				if($r=mysql_fetch_array($s)){ echo '<strong>'.$r['tid'].'</strong>';}?></span></center>
           
            <table width="100%" style="border:1px solid;">
   
            <tr style="font-size:12px;border:1px solid;">
            <td  colspan="8" style="border:1px solid;"><p style="font-size:12px;">&nbsp;Property, Plant and Equipment: &emsp;<?php include('includes/dbconn.php');
								$query  = mysql_query("SELECT * FROM transportation_equipment where tid = '$itemname'") or die (mysql_error());
								if($rows = mysql_fetch_array($query)){echo '<strong>'.$rows['itemname'].'</strong>';}?><p>
            													 </td>
            <th style="width:auto;border:1px solid;" colspan="2"><p style="font-size:8px;">Account Code:<br />
            									Property No.:<br />
                                                Est. Useful Life:<br />
                                                Rate of Depreciation:</p></th>
       <tr style="border:1px solid;">
       <td colspan="8" style="border:1px solid;font-size:12px;">&nbsp;Description :  &emsp;<?php include('includes/dbconn.php');
								$query  = mysql_query("SELECT * FROM transportation_equipment where tid = '$itemname'") or die (mysql_error());
								if($rows = mysql_fetch_array($query)){echo '<strong>'.$rows['des'].'</strong>';}?></td>
       		<td colspan="2" style="text-align:center;border:1px solid;">Maintenance Expenses</td></tr>
            </tr>
             <tr style="font-size:12px;border:1px solid;">
             <th style="text-align:center; width:100px;border:1px solid;">DATE</th>
             <th style="text-align:center;border:1px solid;">REFERENCE</th>
             <th style="text-align:center; width:120px;border:1px solid;">PARTICULARS</th>
             <th style="text-align:center;border:1px solid;">COSTS</th>
             <th style="text-align:center;border:1px solid;">DEPRECIATION</th>
             <th style="text-align:center;border:1px solid;">ACCUM.DEPRECIATION</th>
             <th style="text-align:center;border:1px solid;">TRASNFER/ADJUSTMENT</th>
             <th style="text-align:center;border:1px solid;">NET BOOK VALUE</th>
             <th style="text-align:center;border:1px solid;">AMOUNT</th>
             <th style="text-align:center;border:1px solid;">ACCUM. AMOUNT</th></tr>
            
            <?php include('includes/dbconn.php');
				$sql = "SELECT * FROM transportation_ledgercard WHERE tid ='$itemname'";
				$res = mysql_query($sql) or die (mysql_error());
				$dep = 0;
				$val = 0;
				$cost = 0;
				$totalamount = 0;
				$accumdep = 0;
				$name = '';
				if(mysql_num_rows($res)>0){
					while($row=mysql_fetch_array($res)){
						$totalamount = $row['cost'];
						$dep = $row['depreciation'];
						$accumdep = $row['accum_deptm'];
						$val = $row['bookvalue'];	
						$name = $row['itemname'];
						?>
            <tr style=" font-size:12px;border:1px solid;">
            <td style="border:1px solid;">&nbsp;<?php 
			$isdate = $row['date'];
			$date = new DateTime($isdate);
			echo $date->format('M - d - Y');?></td>
            <td style="border:1px solid;"></td>
            <td style="border:1px solid;"></td>
            <td style="text-align:center;border:1px solid;"><?php echo number_format($row['cost'],2,'.',',');?></td>
            <td style="text-align:center;border:1px solid;"><?php echo number_format($row['depreciation'],2,'.',',');?></td>
            <td style="text-align:center;border:1px solid;"><?php echo number_format($row['accum_deptm'],2,'.',',');?></td>
            <td style="text-align:center;border:1px solid;"></td>
            <td style="text-align:center;border:1px solid;"><?php echo number_format($row['bookvalue'],2,'.',',');?></td>
            <td style="text-align:center;border:1px solid;"></td>
            <td style="text-align:center;border:1px solid;"></td></tr>
            <?php }}?>
            
            <tr style="font-size:12px; font-weight:bold;border:1px solid;">
            	<td colspan="3" style="background-color:#039; color:#FFF;border:1px solid #000; text-align:right">TOTAL</td>
                <td style="color:#F30; text-align:center;border:1px solid;"><strong><?php echo number_format($totalamount,2,'.',',');?></strong></td>
                <td style="color:#F30; text-align:center;border:1px solid;"><strong><?php echo number_format($dep,2,'.',',');?></strong></td>
                <td style="color:#F30; text-align:center;border:1px solid;"><strong><?php echo number_format($accumdep,2,'.',',');?></strong></td>
                <td style="color:#F30; text-align:center;border:1px solid;"><strong></strong></td>
                <td style="color:#F30; text-align:center;border:1px solid;"><strong><?php echo number_format($val,2,'.',',');?></strong></td>
                <td style="color:#F30; text-align:center;border:1px solid;" colspan="2"><strong></strong></td>
            </tr>
     </table>
       <?php      
 
		 header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=.$name. TRANSPORTATION LEDGER Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?>    
         
</body>

</html>