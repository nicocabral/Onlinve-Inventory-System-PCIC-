<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body style="font-size:12px;">
<center>
 <p style="font-size:12px;">
              
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
            <p style="font-size:12px;"><strong>REQUISITION AND ISSUE SLIP</strong><br />
            </p>   
</center>
        <table width="100%" style="border:solid 1px;">
       <thead style="border:solid 1px;">
      	<tr>
        <td colspan="4" style="border:solid 1px;">
        Division:&emsp; <?php include("includes/dbconn.php");
			session_start();
			$print = mysql_real_escape_string(trim($_POST['printsel']));
			$date = mysql_real_escape_string(trim($_POST['date']));
			$dep = mysql_real_escape_string(trim($_POST['dep']));
			$office = '';
			$query = mysql_query("SELECT * FROM pcic_requestitem WHERE status = '$print' AND department='$dep' AND timestamp='$date'") or die (mysql_error());
			if($rows = mysql_fetch_array($query)){
				echo '<strong>'.$rows['department'].'</strong>';
				$office = $rows['office'];
			}else {echo '<span style="color:#F00;">No record found</span>';}
?></td>
<td style="border:solid 1px;" colspan="4">
Office :&emsp;<?php echo '<strong>'.$office.'</strong>';?></td>
        </tr>  
        <tr style="border:solid 1px;">
        <th style="text-align:center; width:auto;border:solid 1px;">No</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Unit</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Item Name</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Description ,Specification</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Request Quantity</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Issued Quantity</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Date Request</th>
        <th style="text-align:center; width:auto;border:solid 1px;">Remarks</th>
       
      
        </tr>
        </thead>
        <tbody style="border:solid 1px;">
 <?php include('includes/dbconn.php');
 $printsel = mysql_real_escape_string(trim($_POST['printsel']));
 	$sql = mysql_query("SELECT * FROM pcic_requestitem WHERE status = '$printsel' AND department='$dep' AND timestamp = '$date'") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
         <tr class="table-row" style="border:solid 1px;">
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $count?></td>
        <td style=" width:auto;border:solid 1px;">&emsp;<?php echo $row['unit'];?></td>
        <td style=" width:auto;border:solid 1px;">&emsp;<?php echo $row['itemname'];?></td>
        <td style=" width:auto;border:solid 1px;">&emsp;<?php echo  $row['description'] . '&nbsp; , &nbsp;'.$row['specicfication'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['qty'];?></td>
        <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['qty'];?></td>
         <td style="text-align:center; width:auto;border:solid 1px;"><?php
		$isdate = new DateTime($row['timestamp']);  
		echo $isdate->format('M d, Y');?></td>
        <td style="text-align:center; width:auto;"><?php echo $row['status'];?></td>
    
        </tr>
         <?php }$count-1;?>
        </tbody>
       
       <tr style="font-size:12px; border: solid 1px;">
        <td style="border:solid 1px;" colspan="8">
        <center>*****Nothing Follows*****</center></td></tr>
        <tr style=" font-size:12px; border: solid 1px;">
        <td style="border:solid 1px;" colspan="6"><em>Purpose: &emsp;</em><u>
        <?php $q ="SELECT * FROM pcic_requestitem where status ='$printsel' order by timestamp desc";
			$res = mysql_query($q)or die(mysql_error());
		if($rowss = mysql_fetch_array($res)){
			echo $rowss['purpose'];}else {echo ' ';}?></u>
            </td>
        <td style="border:solid 1px;" colspan="2">
             <p class="pull-right" style="font-size:12px;">No. of Items: <strong><?php echo $count?></strong></p></td>
       </tr>
       </table>
      	<table style="border:solid 1px; font-size:12px;" width="100%">
        <tr style="width:auto;border:solid 1px;">
        <td style="text-align:center; width:auto;" colspan="2">
    	<em>Requested by:</em>
   
       </td>
      
       <td style="text-align:center; width:auto;" colspan="2">
       <em>Approved by:</em>
      
       </td>
       <td style="text-align:center; width:auto;" colspan="2">
       <em>Issued by:</em>
       
       </td>
   
       <td style="text-align:center; width:auto;" colspan="2">
    	<em>Recieved by:</em>
      </td>
       </tr>
       <tr style="width:auto; border:solid 1px;">
        <th style="text-align:center; width:auto; " colspan="2">
       <?php $s =mysql_query("SELECT * FROM pcic_requestitem WHERE department='$dep'") or die(mysql_error());
		if($rows1 = mysql_fetch_array($s)){echo '<strong>'.$rows1['requested_by'].'<br><em>'.$_SESSION['position'].'</em></strong>';}?></th>
      
       <th style="text-align:center; width:auto;border:solid 1px;" colspan="2">
       
      <strong>MENELEO N. MEDINO <br /><em>COD-AFD</em></strong>
       </th>
       <th style="text-align:center; width:auto;border:solid 1px;" colspan="2">
       
       <strong>VICTORIANA E. UBALDO<br /><em> ADMIN SERVICES OFFICER III</em></strong>
       </th>
       <th style="text-align:center; width:auto;border:solid 1px;" colspan="2">
        <?php $s =mysql_query("SELECT * FROM pcic_requestitem WHERE department='$dep'") or die(mysql_error());
		if($rows1 = mysql_fetch_array($s)){echo '<strong>'.$rows1['requested_by'].'<br><em>'.$_SESSION['position'].'</em></strong>';}?>
       </th>
       </tr>
       </table>
      <?php      
 $d = new DateTime($date);
$dd = $d->format('M d, Y');
		 header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename='.$dd.RIS.xls");
header("Pragma: no-cache");
header("Expires: 0");
           ?> 
   </body>

</html>