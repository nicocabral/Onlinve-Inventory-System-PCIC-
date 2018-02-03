<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype']=='admin'){header("location:../adminCopy/");}else{?>
<?php include('includes/head.php');?>

<body class="hold-transition skin-blue layout-top-nav" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">

<div class="wrapper" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">

 
 <?php include('includes/nav.php');?>
  <!-- Full Width Column -->
  <div class="content-wrapper" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">
    <div class="container" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">
     

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="row">
            <div class="col-lg-12">
          <div class="box-body" style="font-family:'Comic Sans MS', cursive;">
            <div class="panel panel-success">
  	<div class="panel-heading"><span class="glyphicon glyphicon-edit"></span> Update Account</div>
  	<div class="panel-body">
    <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
    <div id="logMsg"></div>
    <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
    <form method="post" action="update_accountprocess">
    <div class="row">
    	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $_SESSION['name'];?>" value="<?php echo $_SESSION['name'];?>" required>
  </div></div>
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Usertype</label>
    <input type="text" class="form-control" id="utype" name="utype" placeholder="<?php echo $_SESSION['usertype'];?>" value="<?php echo $_SESSION['usertype'];?>" required readonly="readonly">
  </div></div></div>
  <div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Position </label>
    <input type="text" class="form-control" id="position" name="position" placeholder="<?php echo $_SESSION['position'];?>" value="<?php echo $_SESSION['position'];?>" required>
  </div></div>
  	<div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Office</label>
    <select name="office" class="form-control">
    <option value="<?php echo $_SESSION['dep'];?>"><?php echo $_SESSION['dep'];?></option>
    <option></option>
    <option value="AFD">AFD</option>
    <option value="CAD">CAD</option>
    <option value="MSD">MSD</option>
    </select>
  </div></div></div>
  <button type="submit" class="btn btn-success" id="submit"><span class="glyphicon glyphicon-download-alt"></span> Update</button>
  <button type="reset" class="btn btn-default">Clear</button>
</form></div></div>
  </div>
</div>

            </div></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 01
      </div>
     <div class="row">
        <div class="col-md-9">
      <strong><div class="col-md-1"><img src="/PCIC/img/icon/inventory.png" width="70px;" class="img-responsive" /></div></strong><strong> Inventory Management System IMS &copy; <?php echo date('Y');?> <a href="#">Philippine Crop Insurance Corporation - Tacloban City</a>.</strong>
      </div></div>
    
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.0 -->
<?php include('includes/footer.php');?>
<?php } ?>
</body>
</html>