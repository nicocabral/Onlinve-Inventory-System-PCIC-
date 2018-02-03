<?php session_start();if(!isset($_SESSSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype'] =='user'){header("location:../logout_process?logout=1/");}else{ ?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="adminCopy/Assets/custom.css" />  
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link href="Assets/datatables.min.css" rel="stylesheet" type="text/css">
<link href="/PCIC/img/pcic.gif" rel="shortcut icon" />

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
<title>PCS - IMS</title>
<body style="background-image:url(/PCIC/img/bg.png); width:100%">
<div class="content-loader" style="font-family:'Comic Sans MS', cursive; background-image:url(/PCIC/img/bg.png);">
  <div class="panel panel-default">
  
 
  <div class="panel-body">
             <!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
       <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/update.png" width="50px"/> EDIT FURNITURE AND FIXTURE LEDGERCARD</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="furnitureandfixture_page"  data-toggle="tooltip" title="Close" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      
       <form method="post" action="">
      <div class="modal-body">
      <div class="row">
      <div class="col-lg-12">
      <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
      
      </div></div>
        <?php include('includes/dbconn.php');
		$id = @intval($_GET['id']);
		$sql = @mysql_query("SELECT * FROM ff_ledgercard WHERE id = '$id'") or die (mysql_error());
		if($row = mysql_fetch_array($sql)){
		?>
     	<center><strong><u><?php echo $row['itemname'];?></u></strong>  </center> <br />
        <p class="alert alert-info">NOTE: Update YEAR only</p>
      <div class="row">
       <div class="col-lg-6">
     <div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
   
      <input type="date" class="form-control" name="date" value="<?php echo $row['date'];?>">
         <input type="hidden" class="form-control" name="datep" value="<?php echo $row['date'];?>">
    </div>
  </div>
   <div class="col-lg-6">
  <div class="form-group">

    <label for="inputPassword3" class="col-sm-2 control-label">Amount</label>
    
      <input type="number" class="form-control"  placeholder="<?php echo $row['cost'];?>" readonly="readonly">
    </div>
  </div></div>
  <div class="row">
   <div class="col-lg-6">
   <div class="form-group">

    <label for="inputPassword3" class="col-sm-2 control-label">Depreciation</label>
    
      <input type="number" class="form-control"  placeholder="<?php echo $row['depreciation'];?>" readonly="readonly">
    </div>
  </div>
   <div class="col-lg-6">
   <div class="form-group">
  
    <label for="inputPassword3" class="col-sm-2 control-label" data-toggle="tooltip" title="Accumulated Depreciation Last Month">ADLM</label>
    
      <input type="number" class="form-control"  placeholder="<?php echo $row['accum_deplm'];?>" readonly="readonly" data-toggle="tooltip" title="Accumulated Depreciation Last Month">
    </div>
  </div>
  </div>
  <div class="row">
   <div class="col-lg-6">
   <div class="form-group">
  
    <label for="inputPassword3" class="col-sm-2 control-label" data-toggle="tooltip" title="Accumulated Depreciation This Month">ADTM</label>
    
      <input type="number" class="form-control"  placeholder="<?php echo $row['accum_deptm'];?>" readonly="readonly" data-toggle="tooltip" title="Accumulated Depreciation This Month">
    </div>
  </div>
   <div class="col-lg-6">
   <div class="form-group">
   
    <label for="inputPassword3" class="col-sm-2 control-label"data-toggle="tooltip" title="Net Book Value">NBV</label>
    
      <input type="number" class="form-control"  placeholder="<?php echo $row['bookvalue'];?>" readonly="readonly" data-toggle="tooltip" title="Net Book Value">
    </div>
  </div></div>	
  <?php  }?>
      </div>
      <div class="modal-footer">
        <a href="furnitureandfixture_page" type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Close</a>
        <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-floppy-save"></span> Save changes</button>
      </div>
        </form>
        
        <?php 
		
		if(isset($_POST['save'])){
			
			$date = mysql_real_escape_string(trim($_POST['date']));
			$datep = trim($_POST['datep']);
			$id = intval(trim($_GET['id']));
			$isdate = new DateTime($date);
			$dd = date('Y',strtotime($date));
			$e = date('m',strtotime($date));
			
			$dated = new DateTime($datep);
			$eno = 0;
			$checkdate = mysql_query("SELECT * FROM ff_ledgercard WHERE id = '$id'") or die (mysql_error());
				if($rows = mysql_fetch_array($checkdate)){
					$d= $rows['date'];
					$eno = $row['ffid'];
						$sql = mysql_query("SELECT date,ffid FROM ff_ledgercard WHERE ffid = '$eno' GROUP by ffid") or die (mysql_error());
							if(mysql_num_rows($sql)>0){
									while($r = mysql_fetch_array($sql)){
											$c = $r['date'];
											$da = new DateTime($c);
											if(date('Y',strtotime($c))> date('Y',strtotime($date))){
													$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, Unable to update on &nbsp;' .$isdate->format('M d, Y').' this item acquired on '.$da->format('M d, Y').'</strong>';
    header("Location:myModalupdateledgerff?id=$id");
	$_SESSION['class'] = 'danger';				
			exit();									
												}
												if(date('Y',strtotime($c))>=date('Y',strtotime($date))){
														if(date('m',strtotime($c))>date('m',strtotime($date))){
															$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, Unable to update on &nbsp;' .$isdate->format('M d, Y').' this item acquired on '.$da->format('M d, Y').'</strong>';
    header("Location:myModalupdateledgerff?id=$id");
	$_SESSION['class'] = 'danger';					
	exit();														}
												else {
		$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; '.$name.' Unable to update on &nbsp;' .$isdate->format('M d, Y').' Due to Duplicated date as of '.$isdate->format('M d, Y').'</strong>';
    header("Location:myModalupdateledgerff?id=$id");
	$_SESSION['class'] = 'danger';exit();
		}
													}
			if(date('Y',strtotime($date)) > date('Y',strtotime($datep))){
					$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, Unable to update on &nbsp;' .$isdate->format('M d, Y').' this item last updated on '.$dated->format('M d, Y').' please update according to its designated year</strong>';
    header("Location:myModalupdateledgerff?id=$id");
	$_SESSION['class'] = 'danger';					
	exit();										
				}else{
			$query = mysql_query("SELECT date,ffid FROM ff_ledgercard WHERE Year(date) = '$dd' AND Month(date) > '$e' AND ffid = '$eno'") or die (mysql_error());
								if(mysql_num_rows($query)>0){
							$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" style="width:20px;"><strong> Oooops! Sory, &nbsp; Unable to update on ' .$isdate->format('M d, Y').' Due to Duplicated date as of '.$isdate->format('M d, Y').' please update according to its designated date</strong>';
    header("Location:myModalupdateledgerff?id=$id");
	$_SESSION['class'] = 'danger';exit();
											
											}else {
								$queryupdate = mysql_query("UPDATE ff_ledgercard SET date = '$date' WHERE id = '$id'") or die (mysql_error());
					if($queryupdate){	
					 $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" style="width:20px;"><strong> Updated on ' .$isdate->format('M d, Y'). ' Updated successfully</strong>';				
				header("location:myModalupdateledgerff?id=$id");
					$_SESSION['class'] = 'success';}
					else {
						$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-remove-sign></span></strong> Sorry Unable to process your request"';					
					header("location:myModalupdateledgerff?id=$id");
					$_SESSION['class'] = 'danger';
						}							
												
												}
				}
										}
								}
						
					
					}
			}?>
    </div>
  
  </div>
</div>
  <script type="text/javascript">
    $(window).load(function(){
        $('#modal').modal('show');
    });
</script>


</div>
</div>
</div>
</body>
<script type="text/javascript" src="assets/datatables.min.js"></script>
<?php } ?>