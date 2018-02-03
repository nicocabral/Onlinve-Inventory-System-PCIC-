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
<script type="text/javascript" src="/PCIC/rightclick.js"></script>
    
</head>

  <body class="login-img3-body" style="font-family:'Comic Sans MS', cursive;">
  
    <div class="container">
    
   <div class="row">
                  <div class="col-lg-4">    
                  </div>
                  <div class="col-lg-4" >
                      <section class="panel">
         <form class="form-signin" id="formCheckusername">
        <h2 class="form-signin-heading" style="color:#000;"><center><img src="/PCIC/img/icon/login.png" width="45px;" class="img-responsive">Enter username</center></h2>
        <div id="logMsg"></div>
        <div class="form-group">
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus></div>
        <div class="form-group">
        <button class="btn btn-success btn-block" type="submit" id="submit">Check</button>
        <button class="btn btn-default btn-block" type="reset">Clear</button>
        </div>
      </form>
      <a href="index"><span class="fa fa-sign-in"></span> Login</a>
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
                    
                          <div class="panel-body"><img src="/PCIC/img/icon/inventory.png" width="40px;" class="img-responsive pull-left"><p></p> <h4><strong> &emsp;Inventory Management System</strong><p class="pull-left">Philippine Crop Insurance Corporation IMS &copy<?php echo date('Y');?></p></h4><br>
                          </div>
                     	
                  </div>
                 
                  </div>
              </div>
    
    
    </div>
   
<?php include('includes/footer.php');?>
  </body><?php } else header("location:admin/index1");?>
</html>
