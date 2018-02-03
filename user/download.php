<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php if (!isset($_GET['id'])) {?>
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
        <span style="font-size:26px; color: #000; font-weight:bold; font-family:'Comic Sans MS', cursive;"><img src="/PCIC/img/icons2/software-update.ico" width="45px"/>Annual Procurement Plan - Uploaded files(AFD - CAD - MSD)</span>
       </div> </div><hr />
      
           <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
      <!------------------------>
      <div class="row" style="font-family:'Comic Sans MS', cursive;">
     <div class="col-lg-4">
      <h4>AFD - Division</h4>
       <?php
      include('includes/dbconn.php');
		$depm = $_SESSION['dep'];
        $query = "SELECT id, name, dep,timestamp FROM upload WHERE dep = '$depm' ";
        $result = mysql_query($query) or die('Error, query failed');
        if (mysql_num_rows($result) == 0) {
            echo "No available files <br>";
        } else {
            while (list($id, $name, $dep, $timestamp) = mysql_fetch_array($result)) {
                ?>
               
                <a href="download.php?id=<?php echo urlencode($id); ?>" class="btn btn-default" data-toggle="tooltip" title="Download File?"><?php echo urlencode($name).'&emsp;'. $timestamp;?></a><br />
                <?php
            }
        }
        mysql_close();
        ?>
        </div>
        <div class="col-lg-4">
         <h4>CAD - Division</h4>
        <?php 
		$con = mysql_connect('localhost', 'root', '') or die(mysql_error());
        $db = mysql_select_db('pcic', $con);
		$depm = $_SESSION['dep'];
        $query = "SELECT id, name, dep,timestamp FROM upload WHERE dep = 'CAD' ";
        $result = mysql_query($query) or die('Error, query failed');
        if (mysql_num_rows($result) == 0) {
            echo "No available Files <br>";
        } else {
            while (list($id, $name, $dep, $timestamp) = mysql_fetch_array($result)) {
                ?>
               
      
                <a href="download.php?id=<?php echo urlencode($id); ?>" class="btn btn-default" data-toggle="tooltip" title="Download File?"><?php echo urlencode($name).'&emsp;'. $timestamp;?></a><br /><br />
                <?php
            }
        }
        mysql_close();?>
 </div>
 <div class="col-lg-4">
  <h4>MSD - Division</h4>
        <?php 
		$con = mysql_connect('localhost', 'root', '') or die(mysql_error());
        $db = mysql_select_db('pcic', $con);
		$depm = $_SESSION['dep'];
        $query = "SELECT id, name, dep,timestamp FROM upload WHERE dep = 'MSD' ";
        $result = mysql_query($query) or die('Error, query failed');
        if (mysql_num_rows($result) == 0) {
            echo "No available Files <br>";
        } else {
            while (list($id, $name, $dep, $timestamp) = mysql_fetch_array($result)) {
                ?>
               
      
                <a href="download.php?id=<?php echo urlencode($id); ?>" class="btn btn-default" data-toggle="tooltip" title="Download File?"><?php echo urlencode($name).'&emsp;'. $timestamp;?></a><br /><br />
                <?php
            }
        }
        mysql_close();?>
 </div></div>
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
<?php }else {
	

           if (isset($_GET['id'])) {
               $con = mysql_connect('localhost', 'root', '') or die(mysql_error());
               $db = mysql_select_db('pcic', $con);
               $id = $_GET['id'];
               $query = "SELECT name, type, size, content " .
                       "FROM upload WHERE id = '$id'";
               $result = mysql_query($query) or die('Error, query failed');
               list($name, $type, $size, $content) = mysql_fetch_array($result);
               header("Content-length: $size");
               header("Content-type: $type");
               header("Content-Disposition: attachment; filename=$name");
               ob_clean();
               flush();
               echo $content;
               mysql_close();
               exit;
           }
         
	}?>