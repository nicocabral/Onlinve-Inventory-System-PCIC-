
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
<script type="text/javascript">
function update_confirm(){
	
		var result = confirm("Are you sure you want to process selected request?");
		if(result){
			return true;
			}else{
			return false;
	}
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>
<div class="content-loader" style="font-family:'Comic Sans MS', cursive;">
  <div class="panel panel-default">
  
 
  <div class="panel-body">
  <!-----Print Modal------->
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalPrint" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#0C3;">
    <div class="row">
        <div class="col-md-12">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/printer.ico" width="45px"/> Print Request by:</span>
       </div> 

                                    </div></div>
      <div class="modal-body">
       <form method="post" action="printrequest">
       Print:<span style="padding-left:1px;"><select id="printsel" name="printsel" class="form-control">
       <option value="Completed">Completed</option>
       <option value="Pending">Pending</option>
       </select><br /><p></p>
       Date:<br />
       <input type="date" name="date" class="form-control"/>
       </span><br />
       <center><button name="printreq" id="printreq" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Print</button></center>
       </form>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
   <?php 
   session_start();
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo @$_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
 <form name="bulk_action_form" action="updaterequest" method="post" onSubmit="return update_confirm();" />
        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        
        <thead>
        <tr style="background-color:#3C6; color:#FFF; font-size:16px;">
        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>
        <th style="text-align:center; width:auto;">ITEM NAME</th>
        <th style="text-align:center; width:auto;">DESCRIPTION, SPECIFICATION</th>
        <th style="text-align:center; width:auto;">UNIT</th>
        <th style="text-align:center; width:auto;">QTY</th>
        <th style="text-align:center; width:auto;">UNIT COST</th>
        <th style="text-align:center; width:auto;">TOTAL COST</th>
        <th style="text-align:center; width:auto;">DEP</th>
        <th style="text-align:center; width:90px;;">DATE REQ</th>
        <th style="text-align:center; width:auto;">REMARKS</th>
        
        </tr>
        </thead>
        <tbody>
 <?php include('includes/dbconn.php');
 	$dep=$_SESSION['dep'];
	$name =$_SESSION['name'];
 	$sql = mysql_query("SELECT * FROM pcic_requestitem WHERE status !=' ' AND department ='$dep' AND requested_by='$name' ORDER by timestamp desc") or die (mysql_error());
	$count = 0;
	$dis = '';
	if(mysql_num_rows($sql)>0){
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
 ?>
        <tr class="table-row">
        <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>
        <td><?php echo $row['itemname'];?></td>
        <td><?php echo  $row['description'].'&nbsp,'.$row['specicfication'];?></td>
        <td style="text-align:center;"><?php echo  $row['unit'];?></td>
        <td style="background-color: #F30; color: #FFF; text-align:center; font-weight:bold;"><?php echo $row['qty'];?></td>
        <td style="text-align:center; font-weight:bold;"><?php echo $row['ucost'];?></td>
        <td style="background-color: #CFC; color: #000; text-align:center; font-weight:bold;"><?php echo $row['tcots'];?></td>
        <td><?php echo $row['department'];?></td>
        <td style="color:red;"><?php 
		$isdate = new DateTime($row['timestamp']);
		echo $isdate->format('M d, Y');?></td>
         <td style="text-align:center;"><?php
		$stat = $row['status'];
		
		 echo '<center><span  style=" font-size:14px;"><strong>'.$stat.'</strong></span></center>';?></td>
      
        </tr>
        
        <?php }}
		else {
			$dis = 'disabled';}$count-1;?>
        
        </tbody>
        </table>
        <hr />
        <div class="row">
        <div class="col-md-6">
       
       <button class="btn btn-danger" <?php echo $dis;?> id="delete" name="delete" type="submit" data-toggle="tooltip" title="Delete Request?"><span class="glyphicon glyphicon-trash"></span> Delete request</button> 
       
       </div>
       <div class="col-md-6">
       
     <a href="#modalPrint" data-toggle="modal" data-target="#modalPrint" class="pull-left"><img src="/PCIC/img/icon/printer.ico" width="40px;" class="img-responsive" data-toggle="tooltip" title="Print request?" /></a>
       </div></div>
        </form>


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
