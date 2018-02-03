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

<div class="content-loader" >
  <div class="panel panel-default">
  
 <button style="margin-bottom:5px; margin-left:5px; margin-top:5px;" class="btn btn-success" data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-plus-sign"></span> ADD USER</button>
  <div class="panel-body" style="font-family:'Comic Sans MS', cursive;">
  
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
 <form class="form-horizontal" method="post" action="addsystemuserprocess">       
    <!----modal starts here--->
     
<div id="modal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
            <div class="modal-header" style="background-color:#0C3; color:#FFF;">
             <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/adminCopy/img/admin.png" width="40px"/> ADD USER</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
            <div class="modal-body">
             <?php 
 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
      <div class="row">
      	<div class="col-xs-6 col-sm-6 col-md-6">
               <div class="form-group has-success">
   <center> <label for="inputEmail3">NAME</label></center>
    <div class="col-sm-12">
       <input type="text" class="form-control" id="accountname" name="accountname" placeholder="Account name" required>
    </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
   <center> <label for="inputEmail3">USERNAME</label></center>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="uname" name="uname" placeholder="Account username" required>
    </div>
  </div></div></div>
  <div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
    <center><label for="inputEmail3">PASSWORD</label></center>
    <div class="col-sm-12">
      <input type="password" class="form-control" id="pass" name="pass" placeholder="*************" required>
    </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
   <center> <label for="inputEmail3">RE-TYPE PASSWORD</label></center>
    <div class="col-sm-12">
      <input type="password" class="form-control" id="passconfirm" name="passconfirm" placeholder="*************" required>
    </div>
  </div></div></div>
  <div class="row">
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">USER TYPE</label></center>
    <div class="col-sm-12">
      <select id="accounttype" name="accounttype" class="form-control">
      <option>-----SELECT USER TYPE------</option>
      <option value="admin">ADMIN</option>
      <option value="user">USER</option>
      </select>
    </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">DEPARTMENT</label></center>
    <div class="col-sm-12">
     <select id="dep" name="dep" class="form-control">
     <option>-----SELECT DEPARTMENT-----</option>
     <option value="AFD">AFD</option>
     <option value="CAD">CAD</option>
     <option value="MSD">MSD</option>
     </select>
    </div>
  </div></div>
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">POSITION</label></center>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="pos" name="pos" placeholder="Account Position" required>
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
                <h4 class="modal-title">CONFIRM USER ACCOUNT</h4>
            </div>
            <div class="modal-body">
                <p>ARE YOU SURE YOU WANT TO SAVE THIS ACCOUNT?</p>
                
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="save" id="save">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
            </div>
        </div>
      </div>
  </div>

</form>
<!--------------------------------------------------------------------------------------------------------->
<form class="form-horizontal" method="post" action="addsystemuserprocess">       
    <!----modal starts here--->
     
<div id="modal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
            <div class="modal-header" style="background-color:#0C3; color:#FFF;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ADD NEW SYSTEM USER ACCOUNT</h4>
            </div>
            <div class="modal-body">
               <div class="form-group has-success">
    <label for="inputEmail3" class="col-sm-2 control-label">ACCOUNT NAME</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="accountname" name="accountname" placeholder="Account name" required>
    </div>
  </div>
  <div class="form-group has-success">
    <label for="inputEmail3" class="col-sm-2 control-label">ACCOUNT USERNAME</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="uname" name="uname" placeholder="Account username" required>
    </div>
  </div>
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
    <label for="inputEmail3" class="col-sm-2 control-label">ACCOUNT PASSWORD</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="pass" name="pass" placeholder="*************" required>
    </div>
  </div>
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
    <label for="inputEmail3" class="col-sm-2 control-label">RE-TYPE ACCOUNT PASSWORD</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passconfirm" name="passconfirm" placeholder="*************" required>
    </div>
  </div>
  <div class="form-group has-success">
    <label for="inputEmail3" class="col-sm-2 control-label">ACCOUNT TYPE</label>
    <div class="col-sm-10">
      <select id="accounttype" name="accounttype" class="form-control">
      <option>-----SELECT ACCOUNT TYPE------</option>
      <option value="admin">ADMIN</option>
      <option value="user">USER</option>
      </select>
    </div>
  </div>
  <div class="form-group has-success">
    <label for="inputEmail3" class="col-sm-2 control-label">ACCOUNT POSITION</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pos" name="pos" placeholder="Account Position" required>
    </div>
  </div>
   <div class="form-group has-success">
    <label for="inputEmail3" class="col-sm-2 control-label">ACCOUNT DEPARTMENT</label>
    <div class="col-sm-10">
     <select id="dep" name="dep" class="form-control">
     <option>-----SELECT DEPARTMENT-----</option>
     <option value="AFD">AFD</option>
     <option value="CAD">CAD</option>
     <option value="MSD">MSD</option>
     </select>
    </div>
  </div>
                
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
                <h4 class="modal-title">CONFIRM USER ACCOUNT</h4>
            </div>
            <div class="modal-body">
                <p>ARE YOU SURE YOU WANT TO SAVE THIS ACCOUNT?</p>
                
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="save" id="save">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
            </div>
        </div>
      </div>
  </div>

</form>
<table id="example" class="table table-striped table-hover table-responsive">

<thead>
<tr style="background-color:#3C6; color:#FFF; font-size:16px;">
<th style="text-align:center; width:auto;">Name</th>
<th style="text-align:center; width:auto;">Username</th>
<th style="text-align:center; width:auto;">Password</th>
<th style="text-align:center; width:auto;">Account Type</th>
<th style="text-align:center; width:auto;">Action</th>
</tr>
</thead>
<tbody>
<?php include('includes/dbconn.php');
$query = mysql_query("SELECT * FROM pcic_accounts") or die(mysql_error());
if(mysql_num_rows($query)>0){
	while($row= mysql_fetch_array($query)){
?>

<tr class="table-row">
<td style="width:auto;"><?php echo $row['name'];?></td>
<td style="text-align:center; width:auto;"><?php echo $row['username']?></td>
<td style="text-align:center; width:auto;"><?php echo '************';?></td>
<td style="text-align:center; width:auto;"><?php echo $row['usertype'];?></td>
<td style="text-align:center; width:auto; background-color:#CCC;"><center><a href="#modal<?php echo $row['id'];?>" data-toggle="modal" data-target="#modal<?php echo $row['id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit user"></span> Edit</a> | <a href="#delete<?php echo $row['id'];?>" data-toggle="modal" data-target="#delete<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete user"></span> Delete</a></center></td>
</tr>
     
    <!----modal starts here--->
     
<div id="modal<?php echo $row['id'];?>" class="modal fade"  role='dialog'>
    <div class="modal-dialog">
     
        <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
            <div class="modal-header" style="background-color:#0C3; color:#FFF;">
            <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/adminCopy/img/admin.png" width="40px"/> EDIT USER</span>
       </div> <div class="col-lg-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div></div></div>
            <div class="modal-body">
            <form  method="post" action="addsystemuserprocess"> 
         <div class="row">
         		<div class="col-xs-6 col-sm-6 col-md-6">
               <div class="form-group has-success">
   <center> <label for="inputEmail3">NAME</label></center>
    <div class="col-sm-12">
       <input type="text" class="form-control" id="accountname" name="accountname" placeholder="Account name" value="<?php echo $row['name'];?>" required>
       <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $row['id'];?>" required>
    </div>
  </div></div>
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">USERNAME</label></center>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="uname" name="uname" placeholder="Account username" value="<?php echo $row['username'];?>" required>
    </div>
  </div></div></div><br />
  <div class="row">
  		<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
    <center><label for="inputEmail3">PASSWORD</label></center>
    <div class="col-sm-12">
      <input type="password" class="form-control" id="pass" name="pass" placeholder="*************" required>
    </div>
  </div></div>
  		<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
   <center> <label for="inputEmail3">RE-TYPE PASSWORD</label></center>
    <div class="col-sm-12">
      <input type="password" class="form-control" id="passconfirm" name="passconfirm" placeholder="*************" required>
    </div>
  </div></div></div><br />
  	<div class="row">
    		<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3" >USER TYPE</label></center>
    <div class="col-sm-12">
      <select id="accounttype" name="accounttype" class="form-control">
      <option value="<?php echo $row['usertype'];?>"><?php echo $row['usertype'];?></option>
      <option></option>
      <option value="admin">ADMIN</option>
      <option value="user">USER</option>
      </select>
    </div>
  </div></div>
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
      <center><label for="inputEmail3">DEPARTMENT</label></center>
    <div class="col-sm-12">
     <select id="dep" name="dep" class="form-control">
     <option value="<?php echo $row['office'];?>"><?php echo $row['office'];?></option>
     <option></option>
     <option value="AFD">AFD</option>
     <option value="CAD">CAD</option>
     <option value="MSD">MSD</option>
     </select>
  
    </div>
  </div></div></div><br />
  <div class="row">
  	<div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group has-success">
    <center><label for="inputEmail3" >POSITION</label></center>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="pos" name="pos" placeholder="Account Position" value="<?php echo $row['position'];?>" required>
    </div>
  </div></div></div>
             <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="update"><span class="glyphicon glyphicon-edit"></span> UPDATE</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>    
            </div>
           
        </div>
  
      </div>
  </div>



    <!----modal starts here--->
     
<div class="modal fade" id="delete<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#F00;">
        <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/adminCopy/img/delete.png" width="30px"/> DELETE USER</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
    </div></div>
      
      </div>
      <div class="modal-body">
      <h3>Are you sure you want to DELETE <?php echo '<strong style="color:#F00;">'.$row['name'].'?</strong>';?></h3>
      </div>
      <div class="modal-footer">
        <a href="deleteuser_process?id=<?php echo $row['id'];?>" role="button" class="btn btn-danger">YES</a>
        <a href="#" role="button" class="btn btn-default" data-dismiss="modal">NO</a>
      </div>
    </div>
  </div>
</div>

<?php }}?>
</tbody>
</table>
<script type="text/javascript">
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