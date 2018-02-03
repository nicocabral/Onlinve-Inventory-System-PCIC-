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
<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").dblclick(function() {
        window.document.location= $(this).data("target");
    });
});
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
   session_start();
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
        <tr>
       
        <td>ITEM NAME</td>
        <td>DESCRIPTION, SPECIFICATION</td>
        <td>QTY</td>
        <td>BAL QTY</td>
        <td>UNIT</td>
        <td>UNIT COST</td>
        <td>TOTAL COST</td>
        <td>DATE ARRIVAL</td>
        <td>STATUS</td>
    
        <td>ACTION</td>
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$sql = mysql_query("SELECT * FROM pcic_items") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
        <tr class="table-row" >
        
        <th style="text-align:center; width:auto;"><?php echo $row['item_name'];?></th>
        <th style="text-align:center; width:auto;"><?php echo  $row['description'].'-'.$row['specification'];?></th>
        <th style="text-align:center; width:auto;"><?php echo $row['qty'];?></th>
        
        <th style="background-color: #3CF; color: #000; text-align:center; font-weight:bold;"><?php echo $row['bal_qty'];
		$bal = $row['qty'];
		if($bal<=0)
		{
			$q = mysql_query("UPDATE pcic_items SET unit_cost = 0,
													total_cost = 0 WHERE qty = 0") or die (mysql_error());}
		?></td>
        <th style="text-align:center; width:auto;"><?php echo $row['unit'];?></th>
        <th style="background-color: #6FC; color: #000; text-align:center; font-weight:bold;"><?php echo $row['unit_cost'];?></th>
        <th style="background-color:#FFFF00; color: #000; text-align:center; font-weight:bold;"><?php echo $row['total_cost'];?></th>
        <th style="text-align:center; width:auto;"><?php echo $row['date_arrival'];?></th>
        <th style="text-align:center; width:auto;"><?php
		$stat = $row['bal_qty'];
		$status = '';
		if ($stat<=0){
		$status='out of stock';
		$update = mysql_query("UPDATE pcic_items SET qty = 0,
													 total_cost = 0,
													 bal_totalcost = 0 WHERE bal_qty = 0") or die (mysql_error());}
		else
		$status = 'Available';
		 echo '<span  style=" font-size:14px;"><strong>'.$status.'</strong></span>';?></th>
          
        <th style="text-align:center; width:auto;"><a href="#appModal<?php echo $row['id'];?>" data-toggle="modal" data-target="#appModal<?php echo $row['id'];?>" class="btn btn-default	">Manage</a></th>
        </tr>
        <?php include('appmodal.php');
			  ?>
                    
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