
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
        window.document.location= $(this).data("href");
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
      
  <h3 class="alert alert-info">CLICK EACH ROW OF EACH ITEM TO VIEW LEDGER CARD </h3> 
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-family:'Comic Sans MS', cursive; font-size:12px;">
        
        <thead>
        <tr style="background-color:#3C6; color:#FFF; font-size:14px; font-weight:bold;">
     
        <td style="text-align:center;">ITEM</td>
        <td style="text-align:center;">QTY</td>
        <td style="text-align:center;">AMOUNT</td>
        <td style="text-align:center;">DATE ACQUIRED</td>
        <td style="text-align:center;">SALVAGE VALUE</td>
        <td style="text-align:center;">MONTHLY DEP</td>
       
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$sql = mysql_query("SELECT * FROM edp_equipement") or die (mysql_error());
	$count = 0;
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
        <tr class="table-row" data-href="edpinventoryledger?id=<?php echo $row['e_no']; ?>">
        
        <td style=" width:auto;"><?php echo $row['itemname'];?></td>
     
       <td style="text-align:center; width:auto;"><?php echo $row['qty'];?></td>
       <td style="background-color: #F30; color: #FFF;text-align:center; width:auto;"><?php echo number_format($row['amount'],2,'.','');?></td>
       <td style="text-align:center; font-weight:bold;"><?php echo $row['date_acquired'];?></td>
       <td style="background-color:#CFC; color: #000; text-align:center; font-weight:bold;"><?php echo number_format($row['s_value'],2,'.','');?></td>
       <td style="background-color:#CFC; color: #000; text-align:center; font-weight:bold;"><?php echo number_format($row['monthly_dep'],2,'.','');?></td>
       
        </tr>
   		
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
