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
<link href="/PCIC/admin/Assets/custom.css" rel="stylesheet" type="text/css" />
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
<br /><p></p>

<div class="row">
 
<div class="col-lg-12">
<div class="col-md-6">
<div class="col-lg-2">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;" data-placement="bottom" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print</a></div>
<div class="col-lg-3">
<form method="post" action="ffinventoryledgerexcel">
<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
<button type="submit" class="btn btn-success" data-toggle="tooltip" title="Export data to Excel" data-placement="bottom">Export to Excel</button>
</form>
</div>
<a href="ffTable" data-toggle="tooltip" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;" data-placement="bottom">Back</a>
 </div>
<div class="col-lg-6"></div></div></div>
<div id="div1" style="font-size:12px;">
<div class="row">
      
<center>
 <p style="font-size:12px;">
               
                <strong>Philippine Crop Insurance Corporation</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center><hr />
<div style="text-align:center;">
                <h3 style="color:#000080; font-size:12px;"><strong>PROPERTY, PLANT AND EQUIPMENT LEDGER CARD</strong></h3>
              	
                 </div>
            <div class="container" style="font-size:12px;">
        <?php
				include('includes/dbconn.php');
				$itemname = intval(trim($_GET['id']));
				?>
           
            <table width="100%" style="border:1px solid;">
   
            <tr style="font-size:12px;border:1px solid;">
            <td  colspan="8" style="border:1px solid;"><p style="font-size:12px;">&nbsp;Property, Plant and Equipment: &emsp;<?php include('includes/dbconn.php');
								$query  = mysql_query("SELECT * FROM fixtureandfurniture where ffid = '$itemname'") or die (mysql_error());
								if($rows = mysql_fetch_array($query)){echo '<strong>'.$rows['itemname'].'</strong>';?><p>
            													 </td>
            <th style="width:auto;border:1px solid;" colspan="2"><p style="font-size:11px; text-align:left;">Account Code:<br />
            									Property No.: <strong style="color:red;"><?php echo $rows['ffid'];?></strong><br />
                                                Est. Useful Life: <strong style="color:red;"><?php echo $rows['e_life'].' Months'; ?></strong><br />
                                                Rate of Depreciation:</p></th><?php }?>
       <tr style="border:1px solid;">
       <td colspan="8" style="border:1px solid;font-size:12px;">&nbsp;Description :  &emsp;<?php include('includes/dbconn.php');
								$query  = mysql_query("SELECT * FROM fixtureandfurniture where ffid = '$itemname'") or die (mysql_error());
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
				$sql = "SELECT * FROM ff_ledgercard WHERE ffid ='$itemname'";
				$res = mysql_query($sql) or die (mysql_error());
				$dep = 0;
				$val = 0;
				$cost = 0;
				$totalamount = 0;
				$accumdep = 0;
				if(mysql_num_rows($res)>0){
					while($row=mysql_fetch_array($res)){
						$totalamount = $row['cost'];
						$dep = $row['depreciation'];
						$accumdep = $row['accum_deptm'];
						$val = $row['bookvalue'];	
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
            </div>


</div></div></div>
</div>



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