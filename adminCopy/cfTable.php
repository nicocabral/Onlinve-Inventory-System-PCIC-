
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
 	<div class="col-lg-3"><p data-toggle="tooltip" title="Search Check by?" data-placement="bottom" class="pull-right" style="padding-top:10px;"><strong>Status Check:</strong></p></div>
    <form method="post" action="getcheckdata">   
 <div class="col-lg-6">
    <div class="input-group">
      <select name="filtercheck" class="form-control">
    <option></option>
  
     <option value="CANCELLED">Cancelled</option>
    <option value="CLAIMED">Claimed</option>
    <option value="UN-CLAIMED">Un-Claimed</option>
    <option value="REPLACE">Replace</option>
    <option value="STALE">Stale</option>
    <option value="W/O AR">W/O AR</option>
    <option value="PCIC R08">PCIC R08</option>						
    </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default pull-left"><span class="glyphicon glyphicon-search"></span> Submit</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<!-- /.row -->
  
    </form>
  
 </div>
 <div class="col-lg-6">
 <div class="col-lg-3"><p  class="pull-right" style="padding-top:10px;"><strong>Search PEO:</strong></p></div>
   <form method="post" action="getcheckPEOdata">   
 <div class="col-lg-6">
    <div class="input-group">
  
      <select name="peo" class="form-control">
   	<option></option>    
    <option value="Abuyog">Abuyog</option>
    <option value="BILIRAN">Biliran</option>
    <option value="DIST 1">DIST 1</option>
    <option value="DIST II">DIST II</option>
    <option value="Ormoc">Ormoc</option>
    <option value="NORTHERN SAMAR">Northern Samar</option>
     <option value="WESTERN SAMAR">Western Samar</option>
    <option value="EASTERN SAMAR">Eastern Samar</option>
    
    
    <option value="Southern Leyte">Southern Leyte</option>
    <option value="PCIC R08">PCIC R08</option>
   </select>						
    </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-success pull-left"><span class="glyphicon glyphicon-search"></span> Submit</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<!-- /.row -->
  
    </form>
 
 </div>
</div>
<form  method="post" action="action" onSubmit="return delete_confirm();">
<div class="col-lg-12" style="margin-bottom:5px;">
<div class="col-lg-9">

</div>
<span class="pull-right">
<button type="submit" class="btn btn-danger" name="deletecheck"><span class="glyphicon glyphicon-trash"></span> Delete Entries</button></span></div>

  
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-family:'Comic Sans MS', cursive; font-size:12px;">

        
        <thead>
        <tr style="background-color:#3C6; color:#FFF; font-size:14px; font-weight:bold;">
        <td style="text-align:center;"><input type="checkbox" name="select_all" id="select_all" class="form-control" value=""/></td>
        <td style="text-align:center;"> CHECK NO</td>
        <td style="text-align:center;">CHECK DATE</td>
        <td style="text-align:center;">PAYEE</td>
        <td style="text-align:center;">ADDRESS</td>
        <td style="text-align:center;">AMOUNT</td>
    
        <td style="text-align:center;">OR #</td>
        <td style="text-align:center;">DV #</td>
        <td style="text-align:center;">DATE RECIEVED</td>
        <td style="text-align:center;">STATUS</td>
        
        <td style="width:95px; text-align:center;">ACTION</td>
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$sql ="SELECT * FROM cf_inventory";
	$res = mysql_query($sql) or die (mysql_error());
	$count = 0;
	$stat = '';
	$statclass = '';
	
	while($row = mysql_fetch_assoc($res)){
 	$count++;
	if($row['checkno']==''){
		$stat = 'danger';}
		else {$stat = '';}
	if($row['status']=='Stale'){
		$stat='Warning';}
		
	if($row['status']=='CLAIMED'){
		$stat = 'success';
		}
	else if($row['status']=='Un-claimed'){$stat= 'danger';}
	else if($row['status']=='')
	{$stat = '';}
	else if($row['status']!='CLAIMED' || $row['status']!='UN-CLAIMED' || $row['status']!='REPLACE' || $row['status']!='STALE' || $row['status']!='W/O AR' || $row['status']!='PCIC R08') {
		$stat = 'info';
		}
		
 ?>
        <tr class="table-row <?php echo $stat;?>">
        <td><center><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></center></td>
        <th style="width:auto; text-align:center;">  <?php echo $row['checkno'];?></th>
        <th style="width:auto; font-size:11px; color:#090;"><?php echo $row['checkdate'];?></th>
     
       <th style="width:auto;"><?php echo $row['payee_name'];?></th>
       <th style="width:auto;"><?php echo $row['address'];?></th>
       <th style="text-align:center; color: #F30;"><?php echo number_format($row['amount'],2,'.',',');?></th>
       
        <th style="text-align:center;"><?php echo $row['orno'];?></th>
        <th style="text-align:center;"><?php echo $row['dvno'];?></th>
        <th style="font-size:11px; color:#00F; text-align:center;"><?php  
		
		echo $row['date_recieved'];?></th>
        <th><center><span class="label label-<?php echo $stat;?>" style="font-size:12px; margin-top:50px;"><?php echo $row['status'];?></span></center></th>
       
       
        <th style="text-align:center; width:auto; background-color:#CCC;"> <div class="btn-group">
    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
     Action<span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="cf_edit_modal?id=<?php echo $row['id']?>" data-toggle="tooltip" title="Edit check"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
      <li><a href="cf_update_modal?id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Update check"><span class="glyphicon glyphicon-open"></span> Update</a></li>
    </ul>
  </div><?php /*?> <a href="#deleteModal<?php echo $row['id'];?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id'];?>"<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete?"></span></a><?php */?> </th>
        </tr>
    <?php 
	 /*?>include('cf_delete_modal.php');<?php */?>
                    
        <?php }?>
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
