
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
function sum(){
		var numA = document.getElementById('endbal').value;
		var numB = document.getElementById('cost').value;
		var numC = parseFloat(numA).toFixed(2) * parseFloat(numB).toFixed(2);
		if(!isNaN(numC)){
			document.getElementById('total').value = numC.toFixed(2);
			}
	}
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

    <form class="form-horizontal" method="post" action="">
    <?php include('includes/dbconn.php');
	$getid = intval($_GET['id']);
	$query = mysql_query("SELECT * FROM pcic_stockcard WHERE id = '$getid'") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){?>
   <div class="col-lg-4">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">DATE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="<?php echo $row['date'];?>" readonly="readonly">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">QTY</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="<?php echo $row['recieved_qty'];?>" readonly="readonly">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">UNIT COST</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="<?php echo $row['recieved_cost'];?>" readonly="readonly">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">TOTAL COST</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="<?php echo $row['recievedtotalcost'];?>" readonly="readonly">
    </div>
  </div>
  </div>
  
  <div class="col-lg-4">
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ISSUED TO</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="<?php echo $row['issueddep'];?>" readonly="readonly">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ISSUED QTY</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="<?php echo $row['issuedqty'];?>" readonly="readonly">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">UNIT COST</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="<?php echo $row['recieved_cost'];?>" readonly="readonly">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">TOTAL COST</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="<?php echo $row['issuedtotalcost'];?>" readonly="readonly">
    </div>
  </div>
  </div>
   <div class="col-lg-4">
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ENDBAL</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control"  value="<?php echo $row['stockendbal'];?>" name="endbal" onkeyup="sum();" id="endbal">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">COST</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" value="<?php echo $row['stockcost'];?>" name="cost" id="cost">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">TOTAL</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" value="<?php echo $row['stocktotalcost'];?>" name="total" id="total">
    </div>
    
  </div>
  <center>
  <div class="btn-group" role="group" aria-label="...">
  <input type="hidden" name="stockno" value="<?php echo $row['stockno']?>" />
  <a href="stockcardModal?id=<?php echo $row['stockno'];?>" type="button" class="btn btn-success">Cancel</a>
  <button type="submit" class="btn btn-success" name="save">Save Changes</button>

</div>
</center>
  </div>
  <?php }}?>
</form>      

</div>
</div>
</div>
<?php include('includes/dbconn.php');
if(isset($_POST['save'])){

	$a = intval(trim($_POST['endbal']));
	$b = intval(trim($_POST['cost']));
	$c = intval(trim($_POST['total']));
	$stockno = intval(trim($_POST['stockno']));
	$sql = mysql_query("UPDATE pcic_stockcard SET stockendbal = '$a',
												  stockcost = '$b',
												  stocktotalcost = '$c' WHERE id = '$getid'") or die (mysql_error());
	if($sql)
	{
		$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> Updated successfully!</strong>';
		$_SESSION['class'] = 'success';
		header('location:stockcardModal?id='.$stockno);
		}												  
	
	}?>

<script type="text/javascript" src="assets/datatables.min.js"></script>

