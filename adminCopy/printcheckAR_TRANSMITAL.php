
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype'] =='user'){header("location:../user/index1");}else{?>
<head>
 <link rel="shortcut icon" href="/PCIC/img/pcic.gif" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PCIC - IMS</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link href="assets/datatables.min.css" rel="stylesheet" type="text/css">

</head>
<script type="text/javascript" src="Assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
<script type="text/javascript">
	window.history.forward();
	function noback(){
			window.history.forward();
		}
</script>
<body onload="printContent('div1')" style="font-size:14px;">
<br />

<div id="div1" style="font-size:12px;">

<div class="container" style="font-size:12px;">
   		<?php include('includes/dbconn.php');
		if(isset($_POST['peoCopy'])){
		$peoCopy = @mysql_real_escape_string($_POST['peo']);
		$query1 = mysql_query("SELECT * FROM cf_inventory WHERE peo = '$peoCopy' and status = '' order by checkno") or die (mysql_error());
		$ii = 0;
		while($row=mysql_fetch_array($query1)){?>
	<table width="100%">
      <?php if ($ii%2 == 0) { // If pair, we open tr?>
      <tr>
      
      <?php } ?> 
      <td valign="top">
      <div class="row">
      <div class="col-lg-12">
      <div class="col-lg-6">
      <center>-----------------------------------------------------------------------------------------------------------------
      </center>
      
      
      <table width="100%" style="border:1px solid; font-size:14px;">
      	<p style="font-size:12px; font-weight:bold; font-family:'Comic Sans MS', cursive;"><u><center>AKNOWLEDGEMENT RECEIPT</center></u></p>
        <p>&emsp;&emsp;&nbsp;&nbsp;I HEREBY Acknoledge the receipt of the PCIC check representing payment og my claim for indemnity. Having received the check, I am waiving and relinqushing any right against the PCIC RO-8 for any loss, theft, alteration, unauthorized encashment or any other means that will forfiet or deminish the value of the check.</p>
        <tr style="border:1px solid;">
        	<th style="border:1px solid;" colspan="2"><center>NAME OF CLAIMANT:</center></th>
            <th style="border:1px solid;" colspan="2"><center>SIGNATURE:</center></th>
        </tr>
        <tr style="border:1px solid; height:40px;">
        	<td style="border:1px solid;" colspan="2">&nbsp;<strong style="font-size:14px;"><?php echo $row['payee_name'];?></strong></td>
            <td style="border:1px solid;" colspan="2"></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;DATE RECEIVED:</td>
            <td style="border:1px solid; width:150px;"></td>
            <td style="border:1px solid; width:auto;">&nbsp;AMOUNT</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo number_format($row['amount'],2,'.',',');?></strong></td>
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

        </div>
        
      </div>
       
      </div>
      </td>
        <?php if ($ii%2 == 1) { // If odd, we close tr?>
                        </tr>
                        <?php } ?>
                        </table>
                        <?php $ii++; // We increment the iterator }
?>
	 <?php }}
	  
		else if(isset($_POST['checknoCopy'])){
		$peoCheckno = @mysql_real_escape_string($_POST['peo']);
			$from = @intval($_POST['from']);
				$to = @intval($_POST['to']);
				$ii = 0;
		$query2 = mysql_query("SELECT * FROM cf_inventory WHERE peo = '$peoCheckno' AND checkno BETWEEN '$from' AND '$to' AND status='' order by checkno") or die (mysql_error());
		while($row=mysql_fetch_array($query2)){?>
	<table width="100%">
      <?php if ($ii%2 == 0) { // If pair, we open tr?>
      <tr>
      
      <?php } ?> 
      <td valign="top">
      <div class="row">
      <div class="col-lg-12">
      <div class="col-lg-6">
      <center>-----------------------------------------------------------------------------------------------------------------
      </center>
      <table width="100%" style="border:1px solid; font-size:14px;">
      	<p style="font-size:12px; font-weight:bold; font-family:'Comic Sans MS', cursive;"><u><center>AKNOWLEDGEMENT RECEIPT</center></u></p>
        <p>&emsp;&emsp;&nbsp;&nbsp;I HEREBY Acknoledge the receipt of the PCIC check representing payment og my claim for indemnity. Having received the check, I am waiving and relinqushing any right against the PCIC RO-8 for any loss, theft, alteration, unauthorized encashment or any other means that will forfiet or deminish the value of the check.</p>
        <tr style="border:1px solid;">
        	<th style="border:1px solid;" colspan="2"><center>NAME OF CLAIMANT:</center></th>
            <th style="border:1px solid;" colspan="2"><center>SIGNATURE:</center></th>
        </tr>
        <tr style="border:1px solid; height:40px;">
        	<td style="border:1px solid;" colspan="2">&nbsp;<strong style="font-size:14px;"><?php echo $row['payee_name'];?></strong></td>
            <td style="border:1px solid;" colspan="2"></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;DATE RECEIVED:</td>
            <td style="border:1px solid; width:150px;"></td>
            <td style="border:1px solid; width:auto;">&nbsp;AMOUNT</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo number_format($row['amount'],2,'.',',');?></strong></td>
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

        </div>
      </div></div>
	  <?php if ($ii%2 == 1) { // If odd, we close tr?>
                        </tr>
                        <?php } ?>
                        </table>
                        <?php $ii++; // We increment the iterator }
?><?php }}
 else if(isset($_POST['peoaddressPrint'])){
		$address = @mysql_real_escape_string($_POST['address']);
			
				$ii = 0;
		$query2 = mysql_query("SELECT * FROM cf_inventory WHERE address = '$address' AND status = '' order by checkno") or die (mysql_error());
		while($row=mysql_fetch_array($query2)){?>
	<table width="100%" >
      <?php if ($ii%2 == 0) { // If pair, we open tr?>
      <tr>
      
      <?php } ?> 
      <td valign="top">
      <div class="row">
      <div class="col-lg-12">
      <div class="col-lg-6">
      <center>-----------------------------------------------------------------------------------------------------------------
      </center>
      <table width="100%" style="border:1px solid; font-size:14px;">
      	<p style="font-size:12px; font-weight:bold; font-family:'Comic Sans MS', cursive;"><u><center>AKNOWLEDGEMENT RECEIPT</center></u></p>
        <p>&emsp;&emsp;&nbsp;&nbsp;I HEREBY Acknoledge the receipt of the PCIC check representing payment og my claim for indemnity. Having received the check, I am waiving and relinqushing any right against the PCIC RO-8 for any loss, theft, alteration, unauthorized encashment or any other means that will forfiet or deminish the value of the check.</p>
        <tr style="border:1px solid;">
        	<th style="border:1px solid;" colspan="2"><center>NAME OF CLAIMANT:</center></th>
            <th style="border:1px solid;" colspan="2"><center>SIGNATURE:</center></th>
        </tr>
        <tr style="border:1px solid; height:40px;">
        	<td style="border:1px solid;" colspan="2">&nbsp;<strong style="font-size:14px;"><?php echo $row['payee_name'];?></strong></td>
            <td style="border:1px solid;" colspan="2"></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;DATE RECEIVED:</td>
            <td style="border:1px solid; width:150px;"></td>
            <td style="border:1px solid; width:auto;">&nbsp;AMOUNT</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo number_format($row['amount'],2,'.',',');?></strong></td>
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

        </div>
      </div></div>
	  <?php if ($ii%2 == 1) { // If odd, we close tr?>
                        </tr>
                        <?php } ?>
                        </table>
                        <?php $ii++; // We increment the iterator }
?><?php }}
	  
 else if(isset($_POST['printCKno'])){
		$address = @mysql_real_escape_string($_POST['address']);
		$f = @intval($_POST['ckfrom']);
		$t = @intval($_POST['ckto']);
			
				$ii = 0;
		$query2 = mysql_query("SELECT * FROM cf_inventory WHERE address = '$address' AND checkno BETWEEN '$f' AND '$t' AND status = '' order by checkno") or die (mysql_error());
		while($row=mysql_fetch_array($query2)){?>
	<table width="100%" >
      <?php if ($ii%2 == 0) { // If pair, we open tr?>
      <tr>
      
      <?php } ?> 
      <td valign="top">
      <div class="row">
      <div class="col-lg-12">
      <div class="col-lg-6">
      <center>-----------------------------------------------------------------------------------------------------------------
      </center>
      <table width="100%" style="border:1px solid; font-size:14px;">
      	<p style="font-size:12px; font-weight:bold; font-family:'Comic Sans MS', cursive;"><u><center>AKNOWLEDGEMENT RECEIPT</center></u></p>
        <p>&emsp;&emsp;&nbsp;&nbsp;I HEREBY Acknoledge the receipt of the PCIC check representing payment og my claim for indemnity. Having received the check, I am waiving and relinqushing any right against the PCIC RO-8 for any loss, theft, alteration, unauthorized encashment or any other means that will forfiet or deminish the value of the check.</p>
        <tr style="border:1px solid;">
        	<th style="border:1px solid;" colspan="2"><center>NAME OF CLAIMANT:</center></th>
            <th style="border:1px solid;" colspan="2"><center>SIGNATURE:</center></th>
        </tr>
        <tr style="border:1px solid; height:40px;">
        	<td style="border:1px solid;" colspan="2">&nbsp;<strong style="font-size:14px;"><?php echo $row['payee_name'];?></strong></td>
            <td style="border:1px solid;" colspan="2"></td>
        </tr>
        <tr style="border:1px solid;">
        	<td style="border:1px solid; width:auto;">&nbsp;DATE RECEIVED:</td>
            <td style="border:1px solid; width:150px;"></td>
            <td style="border:1px solid; width:auto;">&nbsp;AMOUNT</td>
            <td style="border:1px solid; width:150px;">&nbsp;<strong><?php echo number_format($row['amount'],2,'.',',');?></strong></td>
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

        </div>
      </div></div>
	  <?php if ($ii%2 == 1) { // If odd, we close tr?>
                        </tr>
                        <?php } ?>
                        </table>
                        <?php $ii++; // We increment the iterator }
?><?php }}
	  
?>
   </div>
       
        </div>
</div></div></div>




<footer>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>

</footer>
</body>
<?php }?>
</html>