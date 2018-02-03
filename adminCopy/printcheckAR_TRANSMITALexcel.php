
   		<?php include('includes/dbconn.php');
	
		$peo = mysql_real_escape_string($_POST['peo']);
		$query = mysql_query("SELECT * FROM cf_inventory WHERE peo = '$peo' order by checkno") or die (mysql_error());
		while($row=mysql_fetch_array($query)){?>
	
      <table width="100%" style="border:1px;">
      	<p style="font-size:12px; font-weight:bold; font-family:'Comic Sans MS', cursive;"><u><center>AKNOWLEDGEMENT RECEIPT</center></u></p>
        <p>&emsp;&emsp;&nbsp;&nbsp;I HEREBY Acknoledge the receipt of the PCIC check representing payment og my claim for indemnity. Having received the check, I am waiving and relinqushing any right against the PCIC RO-8 for any loss, theft, alteration, unauthorized encashment or any other means that will forfiet or deminish the value of the check.</p>
        <tr style="border:1px solid;">
        	<th style="border:1px solid;" colspan="2"><center>NAME OF CLAIMANT:</center></th>
            <th style="border:1px solid;" colspan="2"><center>SIGNATURE:</center></th>
        </tr>
        <tr style="border:1px solid; height:40px;">
        	<td style="border:1px solid;" colspan="2">&nbsp;<strong><?php echo $row['payee_name'];?></strong></td>
            <td style="border:1px solid;" colspan="2"></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;DATE RECEIVED:</td>
            <td style="border:1px solid; width:150px;"></td>
            <td style="border:1px solid; width:auto;">&nbsp;AMOUNT</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo $row['amount'];?></strong></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;DATE OF CHECK:</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo $row['checkdate'];?></strong></td>
            <td style="border:1px solid; width:auto;">&nbsp;CHECK NO</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo $row['checkno'];?></strong></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;ID PRESENTED:</td>
            <td style="border:1px solid; width:auto;">&nbsp;</td>
            <td style="border:1px solid; width:auto;">&nbsp;ID NO</td>
            <td style="border:1px solid; width:auto;">&nbsp;</td>
        </tr>
      </table>

       



<?php }
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$peo Acknowledgement Receipt.xls");
header("Pragma: no-cache");
header("Expires: 0");exit();

?>

