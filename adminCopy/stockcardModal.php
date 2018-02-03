
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
function delete_confirm(){
	var result = confirm("Are you sure you want to process selected data?");
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
   
<form name="bulk_action_form" action="action.php" method="post" onSubmit="return delete_confirm();"/>  
      <div class="row">
      <div class="col-lg-12">
      You can Double click each row to edit data.
      <div class="pull-right">
      <strong>Action Buttons: </strong>
      <div class="btn-group" role="group" aria-label="...">
      
  <a href="stockcard_pageTable" class="btn btn-danger">Back to previous page</a>
  <button type="button" class="btn btn-danger" disabled="disabled">Update Data</button>
  <button type="button" class="btn btn-danger" disabled="disabled">Delete Data</button>
</div></div>
      </div></div>
      <hr>
      
 
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-size:14px;">
        
        <thead> <tr>
    <td colspan="5" style="text-align:left;"><?php 
		include('includes/dbconn.php');
		$getid = intval($_GET['id']);
		$query = mysql_query("SELECT stockitemname FROM pcic_stockcard WHERE stockno = '$getid' group by stockno") or die (mysql_error());
		if(mysql_num_rows($query)>0){
			while($r = mysql_fetch_array($query)){ echo '<strong>ITEM NAME: '.$r['stockitemname'].'</strong>';}}?></td>
    <td colspan="4" style="text-align:center;">ISSUED</td>
    <td colspan="4" style="text-align:center;">BALANCE</td>
    </tr>
    <tr style=" background-color:#090; color:#FFF;"> 
    	<th style="text-align:center;"></th>	
    	<th style="text-align:center;">DATE</th>
        <th style="text-align:center;">QTY</th>
        <th style="text-align:center;">UCOST</th>
        <th style="text-align:center;">TOTAL</th>
        <th style="text-align:center;">ISSUED TO</th>
        <th style="text-align:center;">QTY</th>
        <th style="text-align:center;">UCOST</th>
        <th style="text-align:center;">TOTAL</th>
        <th style="text-align:center;">QTY</th>
        <th style="text-align:center;">COST</th>
        <th style="text-align:center;">TOTAL</th>
        <th style="text-align:center"><input type="checkbox" name="select_all" id="select_all" value=""/></th>
    </tr>
 </thead>
    <tbody>
    <?php include('includes/dbconn.php');
	$id = intval($_GET['id']);
	$sql = "SELECT * FROM pcic_stockcard WHERE stockno='$id'  ";
	$res = mysql_query($sql) or die (mysql_error());
	$count = 0;
	if(mysql_num_rows($res)>0){
		while($row = mysql_fetch_array($res)){
			if($row['stockendbal']==0){
				$classs = 'danger';}else {$classs ='';}
				if($row['status'] =='Updated'){
					$class = 'success';
					$dr = 'Recieved';}else {$class = '';
					$dr = '';}
					$count++;
			?>
        <tr class="table-row <?php echo $class?>" data-href="stockcardModal_edit?id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Double Click me to edit my data entries">
        	<td class="<?php echo $classs?>"><center><?php echo $count?></center></td>
        	<td class="<?php echo $classs?>"><strong style="color: #006;"><?php 
			$date = new Datetime($row['date']);
			echo $dr.' '.$date->format('M d, Y');?></strong></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo $row['recieved_qty'];?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo number_format($row['recieved_cost'],2,'.',',');?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><strong style="color:red;"><?php echo number_format($row['recievedtotalcost'],2,'.',',');?></strong></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo $row['issueddep'];?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo $row['issuedqty'];?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo number_format($row['issuedcost'],2,'.',',');?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><strong style="color:red;"><?php echo number_format($row['issuedtotalcost'],2,'.',',');?></strong></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo $row['stockendbal'];?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><?php echo number_format($row['stockcost'],2,'.',',');?></td>
            <td style="text-align:center;" class="<?php echo $classs?>"><strong style="color:red;"><?php echo number_format($row['stocktotalcost'],2,'.',',');?></strong></td>
            <td align="center" class="<?php echo $classs?>"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>
        </tr>
        
		<?php 
		
		
		}}?>
        </tbody>
 
        </table>
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
