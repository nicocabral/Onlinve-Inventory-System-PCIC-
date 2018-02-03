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
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">
<div class="col-lg-2">
<a href="#" onclick="printContent('div1')" data-toggle="tooltip" title="Print?" style="padding-right: 10px;" class="btn btn-primary" data-placement="bottom"><span class="glyphicon glyphicon-print"></span> Print</a>
</div>
<div class="col-lg-3">
<form method="post" action="printcheckpeoexcel">
	<input type="hidden" name="printfiltercheck" value="<?php echo $_POST['printfiltercheck'];?>" />
    <input type="hidden" name="peo" value="<?php echo $_POST['peo'];?>" />
    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Export data to Excel" data-placement="bottom">Export to Excel</button>
</form>
</div>
<div class="col-lg-1">
<a href="cfTable" data-toggle="tooltip" title="Back to previous page" class="btn btn-danger" style="padding-left: 10px;" data-placement="bottom">Back</a></div>
</div>
<div class="col-lg-6"></div></div></div>
<div id="div1" style="font-size:12px;">
<center>
 <p style="font-size:12px;">
            
                <strong>PHILIPPINE CROP INSURANCE CORPORATION</strong><br>
                Regional Office No. 8 Tacloban City
            </p>
</center>

<div class="container" style="font-size:12px;">
   
		<p style="font-size:12px;"><strong><?php echo $_POST['printfiltercheck'];?> <?php echo mysql_real_escape_string($_POST['peo'])?> PEO Check </strong></p>
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
	$total = 0;
	if(mysql_num_rows($sql)>0){
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
	$total = $total + $row['amount'];
 ?>
        <tr style="border:1px solid;">
       
        <th style="width:auto; text-align:center;border:1px solid;">  <?php echo $row['checkno'];?></th>
        <th style="width:auto;border:1px solid; text-align:center;"><?php 
		$date = new DateTime($row['checkdate']);
		echo $date->format('M d, Y');?></th>
     
       <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['payee_name'];?></th>
       <th style="width:auto;border:1px solid;">&nbsp;<?php echo $row['address'] .'&nbsp;'.$row['peo'];?></th>
       <th style="text-align:center; color: #F30;border:1px solid #000;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       
        
        <th style="border:1px solid; text-align:center;"><?php  
		echo $row['date_recieved'];?></th>
        <th style="border:solid 1px;">&nbsp;<?php echo $row['status'];?></th>
       <th style="text-align:center;border:1px solid;">&nbsp;<?php echo $row['remarks'];?></th>
       
       
        </tr>
   
                    
        <?php }} else {echo '<strong style="color:red;">No '.$que.' Check on '.$peo.' PEO</strong>';}?>
        <tr style="border:1px solid;">
        	<td style="text-align:right;border:1px solid #000; font-size:14px;" colspan="4"><strong>TOTAL</strong></td>
            <td style="text-align:center; color: #F30;border:1px solid #000; font-size:14px;"><strong><?php echo number_format($total,2,'.',',');?></strong></td>
            <td colspan="3"></td>
        </tr>
        </tbody>
          
        </table>

      
      
      
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