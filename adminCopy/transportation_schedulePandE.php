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
<div class="col-md-3">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;"><img src="/PCIC/img/icon/printer.ico"  width="35px;"/></a>

<a href="transportation_page" data-toggle="tooltip" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;">Back</a>
 </div>
<br /><br />

<div id="div1">
<div class="row">
      
<center>
 <p style="font-size:12px;">
               <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>
<div style="text-align:center;">
                <h3 style="color:#000080; font-size:12px;"><strong>Schedule of Property and Equipment</strong>
                											<p style=" color:#F30;"><strong>AS OF <?php $m = $_POST['month'];
																										$fm = $_POST['fmonth'];
																								$date = ($m);
																								$isdate = new DateTime($date);
																								echo $isdate->format('M d, Y');?></strong> </p></h3>
              	
                 </div>
            <div class="container">
          
          <table class="table table-bordered table-condensed table-responsive table-striped" width="100%">
          <thead>
          	<tr style="font-size:12px;">
            	<th style="text-align:center;">ITEM</th>
                <th style="text-align:center;">QTY</th>
                <th style="text-align:center;">AMOUNT</th>
                <th style="text-align:center;">DATE ACQUIRED</th>
                <th style="text-align:center;">SALVAGE VALUE</th>
                <th style="text-align:center;">MONTHLY DEPN</th>
                <th style="text-align:center;">ACCUM DEPN LAST MONTH</th>
                <th style="text-align:center;">ACCUM DEPN THIS MONTH</th>
                <th style="text-align:center;">BOOK VALUE</th>
            </tr>
          	</thead>
            <tr style="color:#F30;">
                <td colspan="9"><strong><u>OFFICE EQUIPMENT</u></strong></td></tr>
            <tbody>
            <?php include('includes/dbconn.php');
					$sql = "SELECT transportation_ledgercard.*,
					transportation_equipment.itemname,
					transportation_equipment.tid,
					transportation_equipment.qty,
					transportation_equipment.s_val,
					SUM(transportation_ledgercard.accum_deptm) as adtm ,
					SUM(transportation_ledgercard.accum_deplm) as paccumdep 
					FROM transportation_ledgercard LEFT JOIN transportation_equipment ON transportation_ledgercard.tid = transportation_equipment.tid 
					WHERE transportation_ledgercard.date BETWEEN '$fm' AND '$m' GROUP by transportation_ledgercard.tid ORDER by transportation_ledgercard.date  ";
					$result=mysql_query($sql) or die (mysql_error());
					$bval = 0;
					$adtm =0;
					$t = 0;
					$tmdep = 0;
					$adlm = 0;
					$adm = 0;
					
					if(mysql_num_rows($result)>0){
						while($row = mysql_fetch_array($result)){ 
						$t = $t+$row['cost'];
						$tmdep = $tmdep + $row['depreciation'];
						$adlm = $adlm+$row['paccumdep'];
						$adm = $adm + $row['adtm'];
						$bval = $bval + $row['bookvalue'];
							?>
            	<tr style="font-size:12px;">
                <td><strong><?php echo $row['itemname'];?></strong></td>
                <td style="text-align:center;"><?php echo $row['qty'];?></td>
                <td style="text-align:center;"><?php echo $row['cost'];?></td>
                <td style="text-align:center;"><?php 
				$d = $row['date'];
				$isd = new DateTime($d);
				echo $isd->format('M d, Y');?></td>
                <td style="text-align:center;"><?php echo $row['s_val'];?></td>
                <td style="text-align:center;"><?php echo $row['depreciation'];?></td>
                <td style="text-align:center;"><?php echo number_format($row['paccumdep'],2,'.','');?></td>
                <td style="text-align:center;"><?php echo number_format($row['adtm'],2,'.','');?></td>
                <td style="text-align:center;"><?php echo number_format($row['bookvalue'],2,'.','');?></td>
                </tr>
                <?php }}else {echo'<strong style="color:red;">NO AVAILBLE DATA IN DATABASE AS OF &nbsp;'. $m .'</strong>';}?>
                <tr>
                <td colspan="2" style="background-color:#039; color:#FFF; font-weight:bold; font-size:12px; text-align:right;">TOTAL</td>
                <td style="color:#F30; text-align:center; font-weight:bold;"><?php echo number_format($t,2,'.','');?></td>
                 <td style="color:#F30; text-align:center; font-weight:bold;" colspan="2"></td>
                 <td style="color:#F30; text-align:center; font-weight:bold;"><?php echo number_format($tmdep,2,'.','');?></td>
                  <td style="color:#F30; text-align:center; font-weight:bold;"><?php echo number_format($adlm,2,'.','');?></td>
                   <td style="color:#F30; text-align:center; font-weight:bold;"><?php echo number_format($adm,2,'.','');?></td>
                    <td style="color:#F30; text-align:center; font-weight:bold;"><?php echo number_format($bval,2,'.','');?></td></tr>
            </tbody>
          
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

</footer>
</body>
<?php }?>
</html>