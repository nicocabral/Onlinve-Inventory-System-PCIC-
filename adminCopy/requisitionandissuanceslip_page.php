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
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
      <!-----Print Modal------->
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalPrint2" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#0C3;">
    <div class="row">
        <div class="col-md-12">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/printer.ico" width="45px"/> Print Request by:</span>
       </div> 

                                    </div></div>
      <div class="modal-body">
       <form method="post" action="printrequestcopy">
       <div class="row">
       <div class="col-lg-12">
       <div class="col-lg-3">
    
       <strong>Print:</strong></div>
       <div class="col-lg-9">
       <select id="printsel" name="printsel"  class="form-control">
       <option value="Completed">Completed</option>
       <option value="Pending">Pending</option>
       </select></div></div></div><p></p>
       <div class="row">
       <div class="col-lg-12">
       <div class="col-lg-3">
       <strong>Dep:</strong></div>
       <div class="col-lg-9">
       <select id="dep" name="dep" class="form-control" >
       <option value="AFD">AFD</option>
       <option value="CAD">CAD</option>
       <option value="MSD">MSD</option>
       
       </select></div></div></div><p></p>
       <div class="row">
       <div class="col-lg-12">
       <div class="col-lg-3">
 	 <strong>Date:</strong></div>
    <div class="col-lg-9">
       <input type="date" name="date" class="form-control" /></span></div></div></div><p></p>
       <center><button name="printreq" id="printreq" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Print</button></center>
       </form>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
             <div class="col-lg-2" style="margin-bottom:5px;"><a href="#modalPrint2" data-toggle="modal" data-target="#modalPrint2" class=" btn btn-danger pull-left"><span class="glyphicon glyphicon-print"></span> Print/Export data to Excel</a></div>
         	<iframe src="/PCIC/adminCopy/risTable.php" class="form" height="850px;" width="100%" style="border-style:none;"></iframe>
            
           <hr /></div></div>
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
      <strong><div class="col-md-1"><img src="/PCIC/img/icon/inventory.png" width="70px;" class="img-responsive" /></div></strong><strong> Inventory Management System IMS &copy;<?php echo date('Y');?> <a href="#">Philippine Crop Insurance Corporation - Tacloban City</a>.</strong>
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