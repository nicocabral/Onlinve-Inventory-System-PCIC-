<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if ($_SESSION['usertype'] =='user'){header("location:../user/");}else{?>
<?php include('includes/head.php');?>

<body class="hold-transition skin-blue layout-top-nav" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%; height:100%">

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
          <div class="box-body">
           <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
            <center><img  src="/PCIC/img/pcic_official_logo.png" width="30%" class="img-responsive img-rounded" /></center><hr /></div></div>
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