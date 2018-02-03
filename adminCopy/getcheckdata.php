
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
    $(".table-rows").dblclick(function() {
        window.document.location= $(this).data("href");
    });
});
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
<script type="text/javascript">
function delete_confirm(){
	var result = confirm("Are you sure to delete Check Entrie(s)?");
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
 <script>
var xmlhttp;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

function showData(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getcheckdata.php?q="+str,true);
  xmlhttp.send();
}


</script>
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
  <div class="col-lg-12">  

 <div class="col-lg-6">
 	<div class="col-lg-3"><p data-toggle="tooltip" title="Search Check by?" data-placement="bottom" class="pull-right" style="padding-top:10px;"><strong> Search Check:</strong></p></div>
   <form method="post" action="getcheckdata">   
 <div class="col-lg-6">
    <div class="input-group">
      <select name="filtercheck" class="form-control">
    <option></option>
    
     <option value="Cancelled">Cancelled</option>
    <option value="Claimed">Claimed</option>
    <option value="Un-Claimed">Un-Claimed</option>
    <option value="Replace">Replace</option>
    <option value="Stale">Stale</option>
    <option value="W/O AR">W/O AR</option>						
    </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default pull-left"><span class="glyphicon glyphicon-search"></span> Submit</button>
         <a href="cfTable" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span> Show all</a>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<!-- /.row -->
  
    </form>
 </div>
 <div class="col-lg-3">
<form method="post" action="printcheck">
	<input type="hidden" value="<?php echo @$_POST['filtercheck'];?>" name="printfiltercheck" />
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print <?php echo @$_POST['filtercheck']?> check</button>
</form>
 </div>
</div>
<form  method="post" action="action" onSubmit="return delete_confirm();">
<div class="col-lg-12" style="margin-bottom:5px;">
<div class="col-lg-9">

</div>
<span class="pull-right">
<button type="submit" class="btn btn-danger" name="deletecheck"><span class="glyphicon glyphicon-trash"></span> Delete Entries</button></span></div>
 <div id="txtHint">
  
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-family:'Comic Sans MS', cursive; font-size:12px;">

        
        <thead>
        <tr style="background-color:#3C6; color:#FFF; font-size:14px; font-weight:bold;">
        <td style="text-align:center;"><input type="checkbox" name="select_all" id="select_all" class="form-control" value=""/></td>
        <td style="text-align:center;"> CHECK NO</td>
        <td style="text-align:center;">CHECK DATE</td>
        <td style="text-align:center;">PAYEE</td>
        <td style="text-align:center;">PEO</td>
        <td style="text-align:center;">AMOUNT</td>
    
        <td style="text-align:center;">DATE RECIEVED</td>
        <td style="text-align:center;">STATUS</td>
        <td style=" text-align:center;">REMARKS</td>
        <td style="width:95px; text-align:center;">ACTION</td>
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 $que = @mysql_real_escape_string($_POST['filtercheck']);
 	$sql = mysql_query("SELECT * FROM cf_inventory WHERE status = '$que'") or die (mysql_error());
	$count = 0;
	$stat = '';
	$statclass = '';
	if(mysql_num_rows($sql)>0){
	while($row = mysql_fetch_assoc($sql)){
 	$count++;
if($row['checkno']==''){
		$stat = 'danger';}
		else {$stat = '';}
	if($row['status']=='Stale'){
		$stat='Warning';}
		
	if($row['status']!=''){
		$stat = 'warning';
		}else if($row['status']=='claimed'){
			$stat = 'success';
			}else if($row['status']=='Un-claimed'){$stat = 'danger';}else {$stat = '';}
 ?>
        <tr class="table-row <?php echo $stat;?> <?php echo $statclass;?> ">
        <td><center><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></center></td>
        <th style="width:auto; text-align:center;">  <?php echo $row['checkno'];?></th>
        <th style="width:auto; font-size:11px; color:#060;"><?php echo $row['checkdate'];?></th>
     
       <th style="width:auto;"><?php echo $row['payee_name'];?></th>
       <th style="width:auto;"><?php echo $row['address'] .'&nbsp;'.$row['peo'];?></th>
       <th style="text-align:center; color: #F30;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       
        
        <th style="font-size:11px; color:#00F;"><?php  
		echo $row['date_recieved'];?></th>
        <th><label class="label label-info" style="font-size:12px; margin-top:50px;"><?php echo $row['status'];?></label></th>
       <th style="text-align:center;"><?php echo $row['remarks'];?></th>
       
        <th style="text-align:center; width:auto; background-color:#CCC;"><a href="cf_update_modal?id=<?php echo $row['id']?>" data-toggle="tooltip" title="Update check" class="btn btn-warning"><span class="glyphicon glyphicon-send"></span> Update</a><?php /*?> <a href="#deleteModal<?php echo $row['id'];?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id'];?>"<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete?"></span></a><?php */?> </th>
        </tr>
    <?php 
	 /*?>include('cf_delete_modal.php');<?php */?>
                    
        <?php }} else {echo '<strong style="color:red;">No '.$que.' Check in database</strong>';}?>
        </tbody>
          
        </table>

  </div>
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
