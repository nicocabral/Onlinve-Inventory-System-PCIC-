
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
        <tr style="background-color:#3C6; color:#FFF; font-size:14px; font-weight:bold;">
       	<td>Re-stock</td>
        <td>ITEM NAME</td>
        
         <td>UNIT</td>
        <td>QTY</td>
        <td>UNIT COST</td>
        <td>TOTAL COST</td>
        <td>BAL QTY</td>
        <td>BAL TOTAL COST</td>
        <td style="width:90px;">DATE ARRIVAL</td>
        <td style="width:90px;">STATUS</td>
        
        <td style="width:100px;">ACTION</td>
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
        <th style="background-color:#CCC; text-align:center;"><a href="#myModalupdatestock<?php echo $row['id'];?>" role="button" class="btn btn-default" data-toggle="modal" data-target="#myModalupdatestock<?php echo $row['id'];?>"><span class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Re-stock item?"></span></a></th>
        <th style=" width:auto;"><?php echo $row['item_name'];?></th>
     
       <th style="text-align:center; width:auto;"><?php echo $row['unit'];?></th>
       <th style="background-color: #F30; color: #FFF;text-align:center; width:auto;"><?php echo $row['qty'];?></th>
       <th style="text-align:center; font-weight:bold;"><?php echo number_format($row['unit_cost'],2,'.',',');?></th>
       <th style="background-color:#CFC; color: #000; text-align:center; font-weight:bold;"><?php echo number_format($row['total_cost'],2,'.',',');?></th>
        <th style=" background-color: #F30; color: #FFF;text-align:center; font-weight:bold;"><?php echo $row['bal_qty'];
		$bal = $row['qty'];
		if($bal<=0)
		{
			$q = mysql_query("UPDATE pcic_items SET unit_cost = 0,
													total_cost = 0 WHERE qty = 0") or die (mysql_error());}
		?></th>
       
        
       
        <th style="background-color:#CFC; color: #000; text-align:center; font-weight:bold;"><?php echo number_format($row['bal_totalcost'],2,'.',',');?></th>
        <th style="text-align:center; width:auto; color:red;"><?php 
		$isdate = new DateTime($row['date_arrival']);
		echo $isdate->format('M d, Y');?></th>
        <th style="text-align:center; width:auto;"><?php
		$stat = $row['bal_qty'];
		$status = '';
		if ($stat<=0){
		$status='out of stock';
		$update = mysql_query("UPDATE pcic_items SET 
													 
													 bal_totalcost = 0 WHERE bal_qty = 0") or die (mysql_error());}
		else
		$status = 'Available';
		 echo '<span style=" font-size:14px;"><strong>'.$status.'</strong></span>';?></th>
       
        <th style="text-align:center; width:120px;; background-color:#CCC;"><a href="#updatestock<?php echo $row['id']?>" data-toggle="modal" data-target="#updatestock<?php echo $row['id'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit item"></span></a> | <a href="#deleteModal<?php echo $row['id'];?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['itemno'];?>"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete?"></span></a> </th>
        </tr>
        <?php include('deleteitem.php');
			    include('edititems.php');
					include('edititem.php');?>
                    
        <?php }$count-1;?>
        </tbody>
 
        </table>


</div>
</div>
</div>
<script type="text/javascript" src="assets/datatables.min.js"></script>
<script src="/PCIC/adminCopy/Assets/jquery.stickytableheaders.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
<script>
    
    var offset = $('.body').height();
    $("html:not(.legacy) table").stickyTableHeaders({fixedOffset: offset});
  </script>
