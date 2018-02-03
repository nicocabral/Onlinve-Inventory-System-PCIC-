<?php date_default_timezone_set('Asia/Manila');?>
<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) { ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs; Modified by : Nico Cabral">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/pcic.gif">

    <title>PCIC - IMS</title>

    <!-- Bootstrap CSS -->    
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="Assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="Assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="Assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="Assets/css/style.css" rel="stylesheet">
    <link href="Assets/css/style-responsive.css" rel="stylesheet" />

    <script language="JavaScript">
var message="You are not authorized to use this!";

function cLick_All() {if (document.all) {alert(message);return false;}}
function clickDis(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickDis;}
else{document.onmouseup=clickDis;document.oncontextmenu=cLick_All;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
</head>

  <body class="login-img3-body" style="font-family:'Comic Sans MS', cursive;">
  
    <div class="container">
    
   <div class="row">
   <center></center>
                  <div class="col-lg-4">    
                  </div>
                  <div class="col-lg-4" >
                      <section class="panel">
                     
         <form class="form-signin" method="post" action="login_process">
        <h2 class="form-signin-heading" style="color:#000; font-family:'Comic Sans MS', cursive;"><center><img src="img/icon/admin.png" width="45px;" class="img-responsive">Login</center></h2>
        <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
        <div class="form-group has-success">
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus></div>
        <div class="form-group has-success">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group has-success">
        <button class="btn btn-success btn-block" type="submit" id="submit">Login</button>
        <button class="btn btn-default btn-block" type="reset">Clear</button>
        </div>
      </form>
      <a href="forgot_password"><span class="fa fa-question-circle"></span> Forgot password</a>
      
                      </section>
                  </div>
                  <div class="col-lg-4">
                      <section class="panel">
                          
                      </section>
                  </div>
              </div>
<div class="row">
                  <div class="col-lg-4">
                      
                  </div>
                  <div class="col-lg-4">
                    
                          <div class="panel-body"><img src="/PCIC/img/icon/inventory.png" width="40px;" class="img-responsive pull-left"><p></p> <h4 style="font-family:'Comic Sans MS', cursive;"><strong> &emsp;Inventory Management System</strong><p class="pull-left" style="font-family:'Comic Sans MS', cursive;">Philippine Crop Insurance Corporation IMS &copy<?php echo date('Y');?></p></h4><br>
                          </div>
                     	
                  </div>
                 
                  </div>
              </div>
    
    
    </div>
   
<?php include('includes/footer.php');?>
  </body><?php } else header("location:adminCopy/index1");?>
</html>
