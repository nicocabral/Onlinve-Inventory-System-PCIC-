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
           <div class="row">
        <div class="col-md-9">
        <span style="font-size:26px; color: #000; font-weight:bold; font-family:'Comic Sans MS', cursive;"><img src="/PCIC/img/icon/report.png" width="45px"/>UPLOAD Annual Procurement Plan</span>
       </div> </div><hr />
       <div class="row">
       <div class="col-lg-12">
       <div class="col-lg-6"></div>
       <div class="col-lg-6">
           <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?></div></div></div>
      <!------------------------>

       <form method="post" enctype="multipart/form-data" style="font-family:'Comic Sans MS', cursive;">
           
                  <div class="col-lg-4">
                  
                  Please select a file
                  <input type="hidden" name="dep" id="dep"  value="<?php echo $_SESSION['dep']?>"/>
                        <input type="hidden" name="MAX_FILE_SIZE"
                               value="16000000">
                        <input name="userfile" type="file"  class="form-control"id="userfile"></div>
                        <div class="col-lg-4">
                   <br />
                   <button name="upload" type="submit" class="btn btn-warning" id="upload"><span class="glyphicon glyphicon-upload"></span> Upload </button></div>
            
        </form>
        <?php
if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0) {
	$dep = $_POST['dep'];
    $fileName = $_FILES['userfile']['name'];
    $tmpName = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
    $fileType = (get_magic_quotes_gpc() == 0 ? mysql_real_escape_string(
                            $_FILES['userfile']['type']) : mysql_real_escape_string(
                            stripslashes($_FILES['userfile'])));
    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
    }
    $con = mysql_connect('localhost', 'root', '') or die(mysql_error());
    $db = mysql_select_db('pcic', $con);
    if ($db) {
        $query = "INSERT INTO upload (name, dep, size, type, content ) " .
                "VALUES ('$fileName','$dep', '$fileSize', '$fileType', '$content')";
        mysql_query($query) or die('Error, query failed');
        mysql_close();
        $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" width="20px;"><strong>'.$filename.' uploaded successfully</strong>';
    header("Location:upload");
	$_SESSION['class'] = 'success';
    } else {
       $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> Sorry unable to process your request!';
    header("Location:upload");
	$_SESSION['class'] = 'danger';
    }
}
?>
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