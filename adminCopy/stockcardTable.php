<?php date_default_timezone_set('Asia/Manila');?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$(document).ready(function() {
    $(".table-row").dblclick(function() {
        window.document.location= $(this).data("href");
    });
});
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
<style>
@media (min-width:0px;) and (max-width:400px;){
	.mydiva{
		width:33.33%;
		float:left;
		}
	
	}
	@media (min-width:401px;) and (max-width:600px;){
	.mydiva{
		width:25%;
		float:left;
		}
	
	}
	@media (min-width:601px;) and (max-width:1200px;){
	.mydiva{
		width:16.66%;
		float:left;
		}
	
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
        <tr style="text-align:center; font-size:14px; background-color:#3C6; color:#FFF; font-weight:bold;">
       
        <td>ITEM NAME</td>
        <td>DESCRIPTION, SPECIFICATION</td>
        <td>UNIT</td>
        <td>QTY</td>
         <td>UNIT COST</td>
         <td>TOTAL COST</td>
        <td>BAL QTY</td>
        
       
       
         <td>BAL TOTAL COST</td>
        <td>DATE</td>
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$sql = mysql_query("SELECT pcic_stockcard.stockno,pcic_stockcard.stockitemname,pcic_stockcard.stockdescription,pcic_stockcard.date_recieved,pcic_items.itemno,pcic_items.specification,pcic_items.qty,pcic_items.bal_qty,pcic_items.unit,pcic_items.unit_cost,pcic_items.total_cost,pcic_items.bal_totalcost,pcic_items.date_arrival FROM pcic_stockcard LEFT JOIN pcic_items ON pcic_stockcard.stockno = pcic_items.itemno GROUP BY pcic_stockcard.stockno") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
        <tr class="table-row" data-href="inventorybackup?id=<?php echo $row['stockno'];?>" data-toggle="tooltip" title="Double Click me to View my STOCKCARD Report">
        
        <th style="center; width:auto;"><?php echo $row['stockitemname'];?></th>
        <th style="width:auto;"><?php echo  $row['stockdescription'].'-'.$row['specification'];?></th>
        <th style="text-align:center; width:auto;"><?php echo $row['unit'];?></th>
        <th style="background-color: #F30; color:#FFF;text-align:center; width:auto;"><?php echo $row['qty'];?></th>
        <th style="text-align:center; font-weight:bold;"><?php echo number_format($row['unit_cost'],2,'.',',');?></th>
        <th style="background-color:#CFC;text-align:center; font-weight:bold;"><?php echo number_format($row['total_cost'],2,'.',',');?></th>
        <th style="background-color: #F30; color:#FFF;text-align:center; font-weight:bold;"><?php echo $row['bal_qty'];
		$bal = $row['qty'];
		if($bal<=0)
		{
			$q = mysql_query("UPDATE pcic_items SET unit_cost = 0,
													total_cost = 0 WHERE qty = 0") or die (mysql_error());}
		?></td>
        
        
        
        <th style="background-color:#CFC;text-align:center; width:auto;"><?php echo number_format($row['bal_totalcost'],2,'.',',');?></th>
        <th style="text-align:center; width:130px;"><?php 
		$date = new Datetime($row['date_arrival']);
		echo $date->format('M d, Y');?></th>
       </tr>
       
                    
        <?php }
		mysql_close($con);
		$count-1;?>
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
