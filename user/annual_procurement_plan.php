<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if ($_SESSION['usertype'] =='admin'){header("location:../adminCopy/");}else{?>
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
         
        
          
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:26px; color: #000; font-weight:bold; font-family:'Comic Sans MS', cursive;"><img src="/PCIC/img/icon/report.png" width="45px"/>ANNUAL PROCUREMENT PLAN</span>
       </div> </div>
        <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
     

      <!------------content----------->
      <div class="content-loader" style="font-family:'Comic Sans MS', cursive;">
  <div class="panel panel-default">
  <div class="panel-body">
   <center><h4 style="color:red"><?php if(isset($event)){echo $event;}?></h4></center>
       <form action="" method="post">
       <div class="col-lg-4"></div>
       <div class="col-lg-4">
       <center> <label>ITEM CATEGORIES</label>
                    <select name="category" class="form-control">
                    <option>----------------SELECT CATEGORY--------------</option>
                    <option></option>
                    <option value="COMMON ELECTRICAL SUPPLIES">COMMON ELECTRICAL SUPPLIES</option>
                    <option value="COMMON COMPUTER SUPPLIES/CONSUMABLES">COMMON COMPUTER SUPPLIES / CONSUMABLES</option>
                    <option value="COMMON OFFICE SUPPLIES">COMMON OFFICE SUPPLIES</option>
                    <option value="COMMON OFFICE DEVICES">COMMON OFFICE DEVICES</option>
                    <option value="COMMON JANITORIAL SUPPLIES">COMMON JANITORIAL SUPPLIES</option>
                    <option value="LEGAL SIZE PAPER">LEGAL SIZE PAPER</option>
                    <option value="COMMON OFFICE EQUIPMENT">COMMON OFFICE EQUIPMENT</option>
                    <option value="HANDBOOKS ON PROCUREMENT">HANDBOOKS ON PROCUREMENT</option>
                    <option value="OFFICE EQUIPMENT AND ACCESSORIES">OFFICE EQUIPMENT AND ACCESSORIES</option>
                    <option value="OFFICE SUPPLIES">OFFICE SUPPLIES</option>
                    <option value="PHOTOGRAPHIC or FILMING or VIDEO EQUIPMENT">PHOTOGRAPHIC or FILMING or VIDEO EQUIPMENT</option>
                    <option value="CLEANING EQUIPMENT AND SUPPLIES">CLEANING AND EQUIPMENT AND SUPPLIES</option>
                    <option value="PAPER MATERIALS AND PRODUCTS">PAPER MATERIALS AND PRODUCTS</option>
                    <option value="LIGHTNING AND FIXTURES AND ACCESSORIES">LIGHTNING ANd FIXTURES AND ACCESSORIES</option>
                    <option value="ELECTRICAL EQUIPMENT AND COMPONENTS AND SUPPLIES">ELECTRICAL EQUIPMENT AND COMPONENTS AND SUPPLIES</option>
                    <option value="COMPUTER SUPPLIES">COMPUTER SUPPLIES</option>
                     <option value="COMPUTER EQUIPMENT AND ACCESSORIES">COMPUTER EQUIPMENT AND ACCESSORIES</option>
                     <option value="OTHER CATEGORY">OTHER CATEGORY</option>
                    
                    </select></center></div>
                    
        <table class="table">
        	<tr>
        		<td>
        			<label>ITEM AND SPECIFICATION</label>
        			<textarea name="item_spec" class="form-control"></textarea>
        		</td>
        		<td>
        			<label>UNIT OF MEASURE</label>
        			<input type="text" name="unitofm" class="form-control">
        		</td>
        	</tr>
            </table>
    <div class="row">
    <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><center><strong>QUANTITY REQUIREMENT</strong></center></div>
    <div class="col-lg-4"></div>
    </div>
    </div>
    <!-------------->
     
    <div class="row">
    <div class="col-lg-12">
    <div class="col-lg-3">
     <div class="panel panel-default">
    <div class="panel-body">
    <center>Q1</center><hr />
    <table>
    <tr>
    <td style="text-align:center; width:auto;">
    <label><center>January</center></label>
    <input type="number" name="jan_qty" class="form-control" /></td>
    <td style="text-align:center; width:auto;"><label>February</label>
    <input type="number" name="jan_qty" class="form-control" /></td>
   <td style="text-align:center; width:auto;"><label>March</label>
    <input type="number" name="jan_qty" class="form-control" /></td></tr></table>
    </div>
   </div></div>
   <!----------------->
    <div class="col-lg-3">
     <div class="panel panel-default">
    <div class="panel-body">
    <center>Q2</center><hr />
    <table>
    <tr>
    <td style="text-align:center; width:auto;">
    <label><center>April</center></label>
    <input type="number" name="jan_qty" class="form-control" /></td>
    <td style="text-align:center; width:auto;"><label>May</label>
    <input type="number" name="jan_qty" class="form-control" /></td>
   <td style="text-align:center; width:auto;"><label>June</label>
    <input type="number" name="jan_qty" class="form-control" /></td></tr></table>
    </div></div></div>
    <!------------------------>
     <div class="col-lg-3">
     <div class="panel panel-default">
    <div class="panel-body">
    <center>Q3</center><hr />
    <table>
    <tr>
    <td style="text-align:center; width:auto;">
    <label><center>July</center></label>
    <input type="number" name="jan_qty" class="form-control" /></td>
    <td style="text-align:center; width:auto;"><label>August</label>
    <input type="number" name="jan_qty" class="form-control" /></td>
   <td style="text-align:center; width:auto;"><label>September</label>
    <input type="number" name="jan_qty" class="form-control" /></td></tr></table>
    </div>
   </div></div>
   <!------------------------>
    <div class="col-lg-3">
     <div class="panel panel-default">
    <div class="panel-body">
    <center>Q4</center><hr />
    <table>
    <tr>
    <td style="text-align:center; width:auto;">
    <label><center>October</center></label>
    <input type="number" name="jan_qty" class="form-control" /></td>
    <td style="text-align:center; width:auto;"><label>November</label>
    <input type="number" name="jan_qty" class="form-control" /></td>
   <td style="text-align:center; width:auto;"><label>December</label>
    <input type="number" name="jan_qty" class="form-control" /></td></tr></table>
    </div>
   </div></div>
   </div></div>
   <!------------------------------->
    <div class="row">
    <div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><center><strong>TOTAL</strong><input type="number" class="form-control" name="totalty" /></center>
    </div>
    <div class="col-lg-4"><br />
    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-send"></span> SUBMIT</button></div>
    </div>
    </div>
    
        	
	</form>
    <iframe src="appTable.php" class="form" height="400px;" width="100%" style="border-style:none;"></iframe>
</div></div></div>
      
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