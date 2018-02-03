<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype']=='admin'){header("location:../adminCopy/");}else{?>
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
        <tr style="background-color:#3C6; font-size:16px; font-weight:bold; color:#FFF;">
       
        <td style="text-align:center; width:auto;">ITEM NAME</td>
        <td style="text-align:center; width:auto;">DESCRIPTION, SPECIFICATION</td>
        <td style="text-align:center; width:auto;">UNIT</td>
        <td style="text-align:center; width:auto;">QTY</td>
        <td style="text-align:center; width:auto;">UNIT COST</td>
        <td style="text-align:center; width:auto;">TOTAL COST</td>
        <td style="text-align:center; width:auto;">BAL QTY</td>
        <td style="text-align:center; width:90px;">DATE</td>
        <td style="text-align:center; width:auto;">STATUS</td>
        <td style="text-align:center; width:auto;">ACTION</td>
       
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$dep = $_SESSION['dep'];
 	$sql = mysql_query("SELECT * FROM pcic_items WHERE category='Consumable'") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
		
 	$count++;
	$stat = $row['bal_qty'];
		$cat = $row['category'];
		$status = '';
		if ($stat<=0){
		$class = 'danger';
		$status='out of stock';
		$dis = 'disabled';}
		else{
		$status = 'Available';
		$dis = 'enabled';
		$class = '';}
 ?>
        <tr class="table-row <?php echo $class;?>">
        
        <th style="width:auto;"><?php echo $row['item_name'];?></th>
        <th style="width:auto;"><?php echo  $row['description'].'-'.$row['specification'];?></th>
        <th style="text-align:center; width:auto;"><?php echo $row['unit'];?></th>
        <th style="background-color: #CFC; color: #000; text-align:center; font-weight:bold;"><?php echo $row['qty'];
		?></th>
        <th style="text-align:center; font-weight:bold;"><?php echo $row['unit_cost'];?></th>
        <th style="background-color: #CFC; color: #000;text-align:center; width:auto;"><?php echo $row['total_cost'];?></th>
        <th style="background-color: #F30; color: #FFF; text-align:center; font-weight:bold;"><?php echo $row['bal_qty'];?></th>
        <th style="text-align:center; width:auto; color:red;"><?php 
		$isdate = new DateTime($row['date_arrival']);
		echo $isdate->format('M d, Y');?></th>
        <th style="text-align:center; width:auto;"><?php
		
		 echo '<span style=" font-size:14px;"><strong>'.$status.'</strong></span>';?></th>
        <th style="text-align:center; width:auto;">
         <center> <button <?php echo $dis;?> class="btn btn-success btn-sm"><a href="#myModal<?php echo $row['id'];?>" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>">
         <span  style="
	color:#fff;

 a:hover;
 a:focus;
	text-decoration:none;
">REQUEST</span></a></button>
                                                       </center></th>
           <!-- Small modal -->
<div class="modal fade bs-example-modal-sm" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="addItemrequest">
      
      <center>
      <div class="form-group" style="padding-left:5px; padding-right:5px;">
      
      <label>INPUT QTY</label>
      <input type="number" name="qty1" id="qty1" required  class="form-control" />
       <br /><label>Date of Request</label>
      <input type="date" name="datereq" id="datereq" required  class="form-control" />
	  <input type="hidden" id="itemno" name="itemno" value="<?php echo $row['itemno'];?>">
      <input type="hidden" id="itemname" name="itemname" value="<?php echo $row['item_name'];?>">
  	  <input type="hidden" id="des" name="des" value="<?php echo $row['description'];?>">
  	  <input type="hidden" id="unit" name="unit" value="<?php echo $row['unit'];?>">
      <input type="hidden" id="qty" name="qty" value="<?php echo $row['qty'];?>">
      <input type="hidden" id="bqty" name="bqty" value="<?php echo $row['bal_qty'];?>">
      <input type="hidden" id="unitCost" name="unitcost" value="<?php echo $row['unit_cost'];?>">
       <input type="hidden" id="dater" name="dater" value="<?php echo $row['date_arrival'];?>">
        <input type="hidden" id="totalcost" name="totalcost" value="<?php echo $row['total_cost'];?>">
 
      <input type="hidden" id="idno" name="idno" value="<?php echo $row['itemno'];?>">
      <input type="hidden" id="spec" name="spec" value="<?php echo $row['specification'];?>">
  <P></p>
      <button type="submit" id="ok" name="ok" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> OK</button>
    </div></center>
   
      </form>
    </div>
  </div>
</div>   
                                                    
        
       
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