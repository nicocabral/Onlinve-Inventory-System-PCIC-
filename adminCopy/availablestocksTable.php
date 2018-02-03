<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype']=='user'){header("location:../user/");}else{?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="adminCopy/Assets/custom.css" />  
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link href="Assets/datatables.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="Assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
<div class="content-loader">
  <div class="panel panel-default">
  
 
  <div class="panel-body">
   <?php 
   
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
     
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-family:'Comic Sans MS', cursive; font-size:12px;">
        
        <thead>
        <tr style="background-color:#3C6; color:#FFF; font-size:14px; font-weight:bold;">
       
        <td>ITEM NAME</td>
        <td>DESCRIPTION, SPECIFICATION</td>
        <td>UNIT</td>
        <td>QTY</td>
        <td>UNIT COST</td>
        <td>TOTAL COST</td>
        <td>BAL QTY</td>
        <td>BAL TOTAL COST</td>
        <td width="150px;">DATE ARRIVAL</td>
        <td width="100px;">STATUS</td>
       
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$sql = mysql_query("SELECT * FROM pcic_items") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
        <tr class="table-row ">
        
        <th style=" width:auto;"><?php echo $row['item_name'];?></th>
        <th style=" width:auto;"><?php echo  $row['description'].'-'.$row['specification'];?></th>
        <th style="text-align:center; width:auto;"><?php echo $row['unit'];?></th>
        <th style="text-align:center; font-weight:bold;"><?php echo $row['qty'];
		$bal = $row['qty'];
		if($bal<=0)
		{
			$q = mysql_query("UPDATE pcic_items SET unit_cost = 0,
													total_cost = 0 WHERE qty = 0") or die (mysql_error());}
		?></th>
        <th style="text-align:center; font-weight:bold;"><?php echo number_format($row['unit_cost'],2,'.',',');?></th>
        <th style="background-color: #CFC; color: #000;text-align:center; font-weight:bold;"><?php echo number_format($row['total_cost'],2,'.',',');?></th>
        <th style="text-align:center; width:auto;"><?php echo $row['bal_qty'];?></th>
        <th style="background-color: #CFC; color: #000;text-align:center; font-weight:bold;"><?php echo number_format($row['bal_totalcost'],2,'.',',');?></th>
        <th style="text-align:center; width:140px;; color:red;"><strong><?php 
		$isdate = new DateTime($row['date_arrival']);
		echo $isdate->format('M d, Y');?></strong></th>
        <th style="text-align:center; width:auto;"><?php
		$stat = $row['bal_qty'];
		$status = '';
		if ($stat<=0){
		$status='out of stock';}
		else
		$status = 'Available';
		 echo '<span style=" font-size:14px;"><strong>'.$status.'</strong></span>';?></th>
        
       
        <?php }$count-1;?>
        </tbody>
        
        </table>
       


</div>
</div>
</div>
<script type="text/javascript" src="assets/datatables.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
<?php } ?>