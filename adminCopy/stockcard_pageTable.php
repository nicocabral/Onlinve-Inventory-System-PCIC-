<?php date_default_timezone_set('Asia/Manila');?>
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
        <td style="text-align:center;">ITEM NAME</td>
        <td style="width:auto; text-align:center;">DATE ACQUIRED</td>
       
        
        <td style="width:auto; text-align:center;">ACTION</td>
        </tr>
        </thead>
        
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$rowid = 0;
	$sql = mysql_query("SELECT * FROM pcic_stockcard group by stockno order by stockitemname") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
	
 ?>
        <tr class="table-row" >
       <?php  $rowid = $row['id'];?>
        <th style=" width:auto;">
		<?php  echo $row['stockitemname'];?></th>
        <th style="text-align:center; width:auto; color:#000;"><?php 
		$isdate = new DateTime($row['date_recieved']);
		echo $isdate->format('M d, Y');?></th>     
        <th style="text-align:center; width:auto;; background-color:#CCC;">
        <div class="btn-group" role="group" aria-label="...">
        <a href="stockcardModal?id=<?php echo $row['stockno'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit" ></span> Edit</a> <a href="#deleteModal<?php echo $row['id'];?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete?"></span> Delete</a> 
        </div>
        </th>
        
        
        </tr>
        
       <!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash"></span> Delete</h4>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to delete <strong><?php echo $row['stockitemname']?></strong></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        <a href="deleteprocess_stockcard?id=<?php echo $row['id'];?>" type="button" class="btn btn-success">YES</a>
      </div>
    </div>
  </div>
</div>
       <?php }?>
      
                    
        <?php $count-1;?>
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
