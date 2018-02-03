<?php session_start();if(!isset($_SESSSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype'] =='user'){header("location:../logout_process?logout=1/");}else{ ?>
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

<div class="content-loader" >
  <div class="panel panel-default">
  
 <button style="margin-bottom:5px; margin-top:5px; margin-left:5px;" class="btn btn-success" data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-plus-sign"></span> ADD ITEM PURCHASE</button>
  <div class="panel-body" style="font-family:'Comic Sans MS', cursive;">
  
   <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
      
    
        	
            <script type="text/javascript">
			function purchasetotalCost(){
				var purchaseqty = document.getElementById('pqty').value;
				var purchasecost = document.getElementById('cost').value;
				
				var totalres = parseFloat(purchasecost) * parseFloat(purchaseqty); 
				if(!isNaN(totalres)){
					document.getElementById('totalcost').value = totalres;
					}
				
				}            
            </script>
 <form class="form-horizontal" method="post" action="addpurchaseprocess">       
    <!----modal starts here--->
<div id="modal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
            <div class="modal-header" style="background-color:#0C3; color:#FFF;">
               <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icons2/paste.ico" width="45px"/> ADD PURCHASE</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
           
            <div class="modal-body">
            <div class="row">
             <div class="col-xs-6 col-sm-6 col-md-6">
               <div class="form-group has-success">
    <center><label for="inputEmail3">ITEM NAME</label></center>
    <div class="col-sm-12">
      <textarea class="form-control" id="itempurchase" name="itempurchase" required></textarea>
    </div>
  </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
   <center> <label for="inputEmail3">QTY</label></center>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="pqty" name="pqty" placeholder="0.00" onkeyup="purchasetotalCost();" required>
    </div>
  </div></div></div>
  <div class="row">
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">COST</label></center>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="cost" name="cost" placeholder="0.00" onkeyup="purchasetotalCost();" required>
    </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">TOTAL</label></center>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="totalcost" name="totalcost" placeholder="0.00" readonly="readonly">
    </div>
  </div></div></div>
  <div class="row">
  	<div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group has-success">
    <center><label for="inputEmail3">DATE</label></center>
    <div class="col-sm-12">
      <input type="date" class="form-control" id="date" name="date" required>
    </div>
  </div></div></div>
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1"><span class="glyphicon glyphicon-saved"></span> SAVE</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div>

  <!----modal starts here--->
<div id="modal1" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
            <div class="modal-header" style="background-color:#0C6; color:#FFF;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">CONFIRM ITEM PURCHASE</h4>
            </div>
            <div class="modal-body">
                <p>ARE YOU SURE YOU WANT TO SAVE THIS ITEM?</p>
                
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="save" id="save">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
            </div>
        </div>
      </div>
  </div>

</form>

<table id="example" class="table table-hover table-responsive table-condensed table-striped table-bordered">
<thead>
<tr style="background-color:#3C6; font-size:16px; color:#FFF;">
<th style="text-align:center; width:auto">ITEM NAME</th>
<th style="text-align:center; width:auto">QTY</th>
<th style="text-align:center; width:auto">UNIT COST</th>
<th style="text-align:center; width:auto">TOTAL COST</th>
<th style="text-align:center; width:auto">DATE PURCHASE</th>
<th style="text-align:center; width:auto">ACTION</th>

</tr>
</thead>
<?php include('includes/dbconn.php');
$query = mysql_query("SELECT * FROM pcic_purchase") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_array($query)){

?>
<tbody>
<tr class="table-row warning">
<td style="width:auto;"><?php echo  $row['p_itemname'];?></td>
<td style="text-align:center; width:auto;"><?php echo  $row['p_qty'];?></td>
<td style="text-align:center; width:auto;"><?php echo  number_format($row['p_cost'],2,'.',',');?></td>
<td style="text-align:center; width:auto;"><?php echo  number_format($row['p_tcost'],2,'.',',');?></td>
<td style="text-align:center; width:auto;"><?php echo  $row['p_date'];?></td>
<td style="text-align:center; width:auto; background-color:#CCC;"><a href="#modalUpdate<?php echo $row['id'];?>" data-toggle="modal" data-target="#modalUpdate<?php echo $row['id']; ?>" class="btn btn-warning"> <span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit?"></span></a> | <a href="#deleteModal<?php echo $row['id'];?>" data-toggle="modal" class="btn btn-danger" data-target="#deleteModal<?php echo $row['id'];?>"> <span class="glyphicon glyphicon-trash " data-toggle="tooltip" title="Delete"></span></a> </td>
<?php include('deletepurchase.php');
		include('editpurchase.php');?>
</tr></tbody>
<?php }}?>
</table>
</div><script type="text/javascript">
    $(window).load(function(){
        $('#modal').modal('show');
    });
</script>


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