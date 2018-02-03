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
          
         <div class="content-loader">
  <div class="panel panel-default">
  <div class="panel-body">
   <h3 style="font-family:'Comic Sans MS', cursive;">Database Back up and Restore Settings</h3><hr />
   
  <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
 
 
      <!--------------------------->
      <form method="post" action="backup_process">
   <div class="col-md-3">
    
                <div class="form-group">
                    <select style="width:100%;" id="option" class="form-control">
                        <option>--------Select Database setting --------</option>
                        <option value="all">Backup Database</option>
                        <option value="single">Restore</option>
                      
                    </select>
                </div>
            </div>
  <div id="btn-all" class="form-group input-group">
                        <input type="hidden" name="btn-all" value="completed" class="form-control">
                        <button type="submit" name="backup" id="backup" data-toggle="tooltip" title="Back up Database?" data-placement="bottom" class="btn btn-default"><img src="/PCIC/img/icon/backup.png" width="60px;" /></button> Click me to backup Database
                    </div></form>
                    <!-------------->
                    <form action="restore_process" method="post">
                    <div class="col-lg-6">
                      <div id="single" class="form-group input-group has-success">
                      
                        <input type="file" name="rfile" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="restore"><i class="glyphicon glyphicon-repeat"></i> RESTORE</button>
                        </span>
                  
                    </div>
                    </div>
               </form>
  

  <script src="assets/js/jquery.js"></script>
   <script type="text/javascript">
    $("#range").hide();
    $("#single").hide();
    $("#btn-all").hide();

   $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="range"){
                $("#single").hide();
                $("#range").show(200);
                $("#btn-all").hide();
            }
            else if($(this).attr("value")=="single"){
                 $("#single").show(200);
                $("#range").hide();
                $("#btn-all").hide();
            }
            else if($(this).attr("value")=="all"){
                 $("#btn-all").show(200);
                $("#range").hide();
                $("#single").hide();
            }else{
                $("#single").hide();
                $("#range").hide();
                $("#btn-all").hide();
            }

        });
    }).change();
    });
  </script>
  <script type="text/javascript">
	$("#frmRequest").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'request_process.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});
</script>

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