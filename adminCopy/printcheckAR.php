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
<body>
<br />
<div class="row" style="margin-bottom:10px;">
<div class="col-lg-12">
<div class="col-lg-6">
<div class="col-lg-2">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;" class="btn btn-primary" data-placement="bottom"><span class="glyphicon glyphicon-print"></span> Print</a>
</div>
<div class="col-lg-3">
<form method="post" action="printcheckARexcel">
	<input type="hidden" name="peo" value="<?php echo @mysql_real_escape_string($_POST['peo']);?>" />
    <input type="hidden" name="from" value="<?php echo @mysql_real_escape_string($_POST['checknofrom']);?>" />
    <input type="hidden" name="to" value="<?php echo @mysql_real_escape_string($_POST['checknoto']);?>" />
<?php $dis = '';
$dis1 = '';
$btnname = '';
if($_POST['checknofrom']==''){
$dis = 'printcheckAR_TRANSMITALexcel';
$dis1 = 'peoCopy';
$btnname = 'btnpeo';}
	else {
$dis = 'printcheckAR_TRANSMITALexcelcopy';
$dis1 = 'checknoCopy';
$btnname = 'btncheckrange';
	}


?>
    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Export data to Excel" data-placement="bottom" name="<?php echo $dis?>">Export to Excel</button>
</form>
</div>
<div class="col-lg-1">
<form method="post" action="printcheckARstatupdate">
<!-- Modal -->
<div class="modal fade" id="myModalpage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-saved"></span> Update Status</h4>
      </div>
      <div class="modal-body">
        <p style="font-size:14px;">PCIC - IMS (CF - Inventory) asking if you want to update status to <strong>Transmitted</strong> as of 
        </p>
        <div class="input-group">
  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-calendar"></i> </span>
  <input type="date" class="form-control" required name="dateupdate"/>

  </div>
        <input type="hidden" name="peo" value="<?php echo @mysql_real_escape_string($_POST['peo']);?>" />
        <input type="hidden" name="address" value="<?php echo @mysql_real_escape_string($_POST['address']);?>" />
<input type="hidden" name="from" value="<?php echo @intval($_POST['checknofrom']);?>" />
    <input type="hidden" name="to" value="<?php echo @intval($_POST['checknoto']);?>" />
     <input type="hidden" name="ckfrom" value="<?php echo @intval($_POST['cknofrom']);?>" />
      <input type="hidden" name="ckto" value="<?php echo @intval($_POST['cknoto']);?>" />
      </div>
      <div class="modal-footer">
        <a href="cf_inventory_page" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> NO</a>
        <button type="submit" class="btn btn-success" name="<?php echo $btnname;?>"><span class="glyphicon glyphicon-ok"></span> YES</button>
      </div>
    </div>
  </div>
</div>
<a href="#myModalpage" data-toggle="modal" data-target="#myModalpage" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;" data-placement="bottom">Back</a>
</form>
</div>
</div>
<div class="col-lg-3">
<div class="pull-right">
<form method="post" action="printcheckAR_TRANSMITAL" target="_blank">
<input type="hidden" name="peo" value="<?php echo @mysql_real_escape_string($_POST['peo']);?>" />
<input type="hidden" name="address" value="<?php echo @mysql_real_escape_string($_POST['address']);?>" />
<input type="hidden" name="from" value="<?php echo @mysql_real_escape_string($_POST['checknofrom']);?>" />
    <input type="hidden" name="to" value="<?php echo @mysql_real_escape_string($_POST['checknoto']);?>" />
    <input type="hidden" name="ckfrom" value="<?php echo @intval($_POST['cknofrom']);?>" />
      <input type="hidden" name="ckto" value="<?php echo @intval($_POST['cknoto']);?>" />
  <div class="btn-group" role="group" aria-label="...">
  
  <button  type="submit" class="btn btn-default" name="<?php echo $dis1;?>"><span class="glyphicon glyphicon-print"></span> Print AR </button></div>
  
  
  </form>
  
  </div></div>
  <div class="col-lg-3">
<div class="pull-left">
  <form method="post" action="<?php echo $dis;?>">
<input type="hidden" name="peo" value="<?php echo @mysql_real_escape_string($_POST['peo']);?>" />
<input type="hidden" name="from" value="<?php echo @mysql_real_escape_string($_POST['checknofrom']);?>" />
    <input type="hidden" name="to" value="<?php echo @mysql_real_escape_string($_POST['checknoto']);?>" />

  <button type="submit" name="peoprint" class="btn btn-default"  data-placement="bottom"><span class="glyphicon glyphicon-save-file"></span> Export to Excel</button>
 

    </form>
    </div>
</div>
	

</div></div>
<div id="div1" style="font-size:12px;">
<center>
 <p style="font-size:12px;">
            
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>

<div class="container" style="font-size:12px;">
   		<p class="pull-right"><?php echo date('M d, Y')?></p>
		<center><p style="font-size:12px;"><strong>LIST OF INDEMNITY CHECKS AND ACKNOWLEDGEMENT RECEIPTS</strong></p></center>
        <table cellspacing="0" width="100%" style="border:solid 1px;">

        
        <thead style="border:1px solid;">
        <tr style="font-size:12px; font-weight:bold;border:1px solid;">
       	 <td style="text-align:center; border:1px solid;">#</td>
        <td style="text-align:center; border:1px solid;"> NAME OF CLAIMANT</td>
        <td style="text-align:center; border:1px solid;"> ADDRESS</td>
        <td style="text-align:center; border:1px solid;"> AMOUNT</td>
        <td style="text-align:center; border:1px solid;"> CHECK #</td>
        <td style="text-align:center; border:1px solid;"> SIGNATURE</td>
        </tr>
        </thead>
        <tbody style="font-size:12px;border:1px solid;">
 <?php include('includes/dbconn.php');
 if(isset($_POST['save'])){
 $que = @mysql_real_escape_string($_POST['peo']);
 	$sql = "SELECT * FROM cf_inventory WHERE peo = '$que' AND status = '' order by checkno ";
 	$res = mysql_query($sql) or die (mysql_error());
 }
 if(isset($_POST['printcheckno']))
 	{
		$que = @mysql_real_escape_string($_POST['peo']);
		$from = @intval($_POST['checknofrom']);
		$to = @intval($_POST['checknoto']);
		$sql = "SELECT * FROM cf_inventory WHERE peo = '$que' AND checkno BETWEEN '$from' AND '$to' AND status = '' order by checkno";
		$res = mysql_query($sql) or die (mysql_error());
		}
if(isset($_POST['printckno'])){
	$que = @mysql_real_escape_string(trim($_POST['address']));
	$from = @intval($_POST['cknofrom']);
	$to = @intval($_POST['cknoto']);
	$sql = "SELECT * FROM cf_inventory WHERE address = '$que' AND checkno BETWEEN '$from' AND '$to' AND status = '' order by checkno";
		$res = mysql_query($sql) or die (mysql_error());
	}
if(isset($_POST['peoAddressprint'])){
	$que = @mysql_real_escape_string(trim($_POST['address']));
	
	$sql = "SELECT * FROM cf_inventory WHERE address = '$que' AND status = '' order by checkno";
		$res = mysql_query($sql) or die (mysql_error());
	}

	$count = 0;
	$total = 0;
	if(mysql_num_rows($res)>0){
	while($row = mysql_fetch_assoc($res)){
 	$count++;
	$total = $total + $row['amount'];
 ?>
        <tr style="border:1px solid;">
       <th style="width:auto;border:1px solid; text-align:center;"><?php echo $count;?></th>
        <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['payee_name'];?></th>
        <th style="width:auto;border:1px solid; ">&nbsp;<?php echo $row['address'];?></th>
     
       <th style="width:auto;border:1px solid #000; text-align:center; color:#F30;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       <th style="width:auto;border:1px solid; text-align:center;"><?php echo $row['checkno'];?></th>
       <th style="text-align:center; color: #F30;border:1px solid #000;"></th>      
        </tr>
   
                    
        <?php  }} else {echo '<strong style="color:red;">No data available in database</strong>';}?>
        <tr style="border:1px solid;">
        <td colspan="3" style="font-size:14px; text-align:right; border:solid 1px;"><strong>TOTAL</strong></td>
        <td style="text-align:center; color:#F30; font-size:14px; border:solid 1px #000; "><strong><?php echo number_format($total,2,'.',',');?></strong></td>
        <td style="border:1px solid;"></td>
        <td style="border:1px solid;"></td>
        
        </tr>
        </tbody>
          
        </table>
<h4><strong>TOTAL CHECK : <?php echo $count;?></strong></h4>
     <center><p><em>I hereby acknowledge the receipt of the above indemnity checks and any loss or damage incurred is my liability.</em></p>
     Recieve by:<br /><br />
     <u><strong>DOMINICO S. DIGAMON</strong></u><br />
     <strong>REGIONAL MANAGER</strong></center> 
      <p class="pull-right" style="font-size:10px;"><em>Prepared by:</em><br /><br />
      							MA. ANGELI CASTRO PANUNCIO</p>
                            
      
   </div>
       
        </div>
</div></div></div>




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