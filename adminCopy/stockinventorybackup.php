<?php date_default_timezone_set('Asia/Taipei');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype']=='user'){header("location:../user/");}else{?>
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
<body class="col-lg-12">
<br />
<div class="row">
<div class="col-lg-12">
<div class="container">
<div class="col-lg-6">
<div class="col-lg-2">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;" class="btn btn-primary" data-placement="bottom"><span class="glyphicon glyphicon-print"></span> Print</a></div>
<div class="col-lg-3">
<form method="post" action="stockinventorybackupexcel">
	<input type="hidden" name="from" value="<?php echo $_POST['from']?>" />
    <input type="hidden" name="to" value="<?php echo $_POST['to']?>" />
    
	<button type="submit" class="btn btn-success" data-toggle="tooltip" title="Export data to excel?" data-placement="bottom">Export to excel</button>
</form></div>
<div class="col-lg-1">
<a href="index1" data-toggle="tooltip" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;" data-placement="bottom">Back</a></div></div>
<div class="col-lg-6"></div></div></div>
<div class="row">
<div class="col-lg-12">
<div id="div1">
<center> <p style="font-size:12px;">
        	
        <strong>Philippine Crop Insurance Corporation</strong><br>
                Regional Office No. 8 Tacloban City
            </p><hr />
                <p style="color:#000080; font-size:13px;"><strong>Report on Physical Count of Inventories</strong></p>
                 <span style="font-size:12px;">AS OF <?php 
				 $from = @mysql_real_escape_string(trim($_POST['from']));
				 						   $to = @mysql_real_escape_string(trim($_POST['to']));
										   $date = new DateTime($from);
										   $dateto = new DateTime($to); 
										   echo '<strong style="font-size:12px;">'.$date->format('M-d-Y').' &nbsp;to&nbsp; '.$dateto->format('M-d-Y').'</strong>'; ?></span>
     </center>                                
            <div class="container" style="font-size:12px;">
           
            <table width="100%" style=" border:solid 1px;">
           <tr style="font-size:12px; font-weight:bold; border:solid 1px;">
           		<td style="border:solid 1px;;"></td>
                <td colspan="3" style="text-align:center; width:auto;border:solid 1px;">
                	BALANCE AS OF<strong>
                    <?php echo $date->format('M-d-Y');?></strong>
                   
                </td>
                <td colspan="3" style="text-align:center; width:auto;border:solid 1px;">ISSUANCES</td>
                
                <td colspan="3" style="text-align:center; width:auto;border:solid 1px;">BALANCE AS OF
                	<strong><?php echo $dateto->format('M-d-Y');?></strong></td>
                    <td colspan="3" style="text-align:center; width:auto;border:solid 1px;">PURCHASES</td>
           </tr>
           <tr style="font-size:12px; font-weight:bold;border:solid 1px;">
   			<td style="text-align:center;border:solid 1px;">ITEMS</td>
           <td style="text-align:center;border:solid 1px;">QTY</td>
           <td style="text-align:center;border:solid 1px;">UNIT COST</td>
           <td style="background-color:#3FC; color:#000;border:solid 1px;text-align:center;">AMOUNT</td>
           <td style="text-align:center;border:solid 1px;">QTY</td>
           <td style="text-align:center;border:solid 1px;"> UNIT COST</td>
           <td style="background-color:#3FC; color:#000;border:solid 1px;text-align:center;">AMOUNT</td>
           <td style="text-align:center;border:solid 1px;">QTY</td>
           <td style="text-align:center;border:solid 1px;">UNIT COST</td>
           <td style="background-color:#3FC; color:#000;border:solid 1px; text-align:center;">AMOUNT</td>
           <td style="text-align:center;border:solid 1px;">QTY</td>
           <td style="text-align:center;border:solid 1px;">UNIT COST</td>
           <td style="background-color:#3FC; color:#000;border:solid 1px;text-align:center;">AMOUNT</td></tr>
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
           		
           <tr style="font-size:12px;border:solid 1px;">
           <td style=" width:auto;border:solid 1px; font-weight:bold;">&emsp;<?php echo $row['itemname'];?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['startbal'];?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['startucost'],2,'.',',');?></td>
           <td style="text-align:center; width:auto;background-color:#CFC; border:solid 1px;color:#000;"><?php echo number_format($row['startamount'], 2,'.',',');?></td>
           
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['tissuedqty'];?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['issuancecost'],2,'.',',');?></td>
           <td style="text-align:center; width:auto;background-color:#CFC;border:solid 1px; color:#000;"><?php echo number_format($row['tissuedamount'], 2,'.',',');?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $row['bal_qty'];?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($row['enducost'],2,'.',',');?></td>
           <td style="text-align:center; width:auto;background-color:#CFC;border:solid 1px; color:#000;"><?php echo number_format($row['bal_totalcost'],2,'.',',');?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           </tr>
           
           <?php }}?>
          <?php $q = mysql_query("SELECT * FROM pcic_purchase WHERE p_date BETWEEN '$from' AND '$to'") or die (mysql_error());
		  if(mysql_num_rows($q)>0){
			  while($rows = mysql_fetch_array($q)){
				  $totalpurchase = $rows['p_tcost'];
				  $totalpurchaseamount = $totalpurchaseamount + $totalpurchase;?>
          <tr>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $rows['p_itemname'];?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo $rows['p_qty'];?></td>
           <td style="text-align:center; width:auto;border:solid 1px;"><?php echo number_format($rows['p_cost'],2,'.',',');?></td>
           <td style="background-color: #CFC; color:#000; text-align:center;border:solid 1px; width:auto"><?php echo number_format($rows['p_tcost'],2,'.',',');?></td>
          </tr>
          <?php }}?>
          <tr style="border:solid 1px;">
           <td colspan="3" style="text-align:right; width:auto; font-size:12px; background-color: #06F;border:solid 1px #000; color:#FFF;"><strong>TOTAL</strong></td>
           <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		   <?php echo number_format($total, 2,'.',',');?></center></strong></td>
            <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		</center></strong></td>
            <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		</center></strong></td>
           
           <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center><?php 
		   echo number_format($totalamount, 2,'.',',');?></center></strong></td>
           <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		</center></strong></td>
        <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		</center></strong></td>
            <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center><?php 
		  
		   echo number_format($totalendamount,2,'.',',');?></center></strong></td>
          <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		</center></strong></td>
        <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center>
		</center></strong></td>
           <td  style="text-align:center; width:auto; font-size:12px; background-color: #FF0; color:#000;border:solid 1px;"> <strong><center><?php 
		   echo $totalpurchaseamount;?></center></strong></td>
          </tr>
            </table>
           
            </div>


</div></div></div></div>
<footer>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
</footer>
</body>
<?php }?>
</html>